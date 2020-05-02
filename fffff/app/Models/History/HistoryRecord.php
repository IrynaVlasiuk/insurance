<?php

    namespace App\Models\History;

    use App\Models\ParentModel;
    use App\Models\Users\User;
    use Illuminate\Database\Eloquent\Model;

    /**
     * Class HistoryRecord
     *
     * @package App\Models
     */
    class HistoryRecord extends ParentModel
    {
        /**
         * Table
         *
         * @var string
         */
        public $table = 'history_records';

        /**
         * Fillable
         *
         * @var array
         */
        protected $fillable = [
            'user_id',
            'module_name',
            'event_name',
            'source_entity_name',
            'source_entity_id',
            'destination_entity_name',
            'destination_entity_id',
            'details',
            'success',
            'is_system',
            'error_details',
        ];

        protected $with = ['user', 'source', 'destination'];

        protected $types = [
            'claim_statuses' => 'App\Models\Claims\Statuses\ClaimStatus',
            'claims' => 'App\Models\Claims\Claim',
            'surveys' => 'App\Models\Survey',
            'users' => 'App\Models\Users\User',
            'tiers' => 'App\Models\Tiers\Tier',
        ];

        /**
         * HistoryRecord constructor.
         *
         * @param mixed ...$args
         */
        public function __construct(...$args)
        {
            parent::__construct();

            if (func_num_args() > 1) {
                $this->populateInitialData(...$args);
            }
        }


        /**
         *
         * @param string $event
         * @param Model|null $source
         * @param Model|null $destination
         * @param User|null $user
         */
        private function populateInitialData(string $event, Model $source = null, Model $destination = null, $user = null)
        {

            $this->fill([
                'module_name' => explode(".", $event, 2)[0] ?? 'error',
                'event_name'  => $event,
            ]);

            if ($source) {
                $this->fill([
                    'source_entity_name' => $source->getTable(),
                    'source_entity_id'   => $source->id,
                ]);
            }

            if ($destination) {
                $this->fill([
                    'destination_entity_name' => $destination->getTable(),
                    'destination_entity_id'   => $destination->id
                ]);
            }

            if ($user && $user instanceof User) {
                $this->fill([
                    'user_id' => $user->id,
                ]);
            }
        }

        /**
         *
         */
        public function setRequestUser()
        {
            if(request()->user()) {
            $this->user_id = request()->user()->id;
            } else {
                $this->user_id = 1;
            }
            return $this;
        }

        /**
         * @param string|null $details
         */
        public function recordSuccessEvent(string $details = null)
        {
            $this->fill(['details' => $details, 'success' => true, 'error_details' => null])->save();
        }

        /**
         * @param string|null $details
         * @param string|null $errorDetails
         */
        public function recordErrorEvent(string $details = null, string $errorDetails = null)
        {
            $this->fill(['details' => $details, 'success' => false, 'error_details' => $errorDetails])->save();
        }


        /**
         *  User
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user()
        {
            return $this->belongsTo(User::class);
        }

        /**
         * Source
         *
         * @return \Illuminate\Database\Eloquent\Relations\MorphTo
         */
        public function source($entity = null)
        {
            if ($entity) {
                return $this->morphTo('source', 'source_entity_name', 'source_entity_id')->where('source_entity_name', $entity);
            }

            return $this->morphTo('source', 'source_entity_name', 'source_entity_id');
        }

        /**
         * Destination
         *
         * @param null $entity
         * @return \Illuminate\Database\Eloquent\Relations\MorphTo
         */
        public function destination($entity = null)
        {
            if ($entity) {
                return $this->morphTo('source', 'source_entity_name', 'source_entity_id')->where('source_entity_name', $entity);
            }

            return $this->morphTo('destination', 'destination_entity_name_temp', 'destination_entity_id');
        }

        public function getDestinationEntityNameTempAttribute($type) {
            // Illuminate/Database/Eloquent/Model::morphTo checks for null in order
            // to handle eager-loading relationships
            if(!$type) {
                return null;
            }

            // transform to lower case
            $type = strtolower($type);

            // to make sure this returns value from the array
            return array_get($this->types, $type, $type);

            // which is always safe, because new 'class'
            // will work just the same as new 'Class'
        }
    }

