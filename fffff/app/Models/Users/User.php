<?php

    namespace App\Models\Users;

    use App\Models\Areas\Area;
    use App\Models\Claims\Claim;
    use App\Models\Users\Scopes\UserScope;
    use App\Models\Users\Types\UserType;
    use App\Traits\Model\HasFullName;
    use DB;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Laravel\Passport\HasApiTokens;
    use App\Models\GoogleCalendar\GoogleAccount;
    use App\Notifications\PasswordReset;


    /**
     * App\Models\Users\User
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property string $password
     * @property string|null $remember_token
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\User whereUpdatedAt($value)
     * @mixin \Eloquent
     */
    class User extends Authenticatable
    {
        use Notifiable, HasApiTokens, HasFullName, SoftDeletes;

        /**
         * Custom Model Event
         *
         * @var array
         */
        protected $observables = ['verified'];


        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'login',
            'firstname',
            'lastname',
            'address1',
            'address2',
            'zipcode',
            'city',
            'phone',
            'email',
            'type_id',
            'scope_id',
            'area_id',
            'last_activity'
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token', 'pivot',
        ];

        protected $with = ['scope', 'type'];

        /** @var array Appends */
        protected $appends = ['full_name', 'isAreaManager', 'isChiefAssessor', 'isManagerAssessor'];

        /**
         * Type
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function type()
        {
            return $this->belongsTo(UserType::class);
        }

        /**
         * Scope
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function scope()
        {
            return $this->belongsTo(UserScope::class);
        }

        /**
         * Area
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function area()
        {
            return $this->belongsTo(Area::class);
        }

        /**
         * Area Managed By User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function managedArea()
        {
            return $this->hasOne(Area::class, 'area_manager_id');
        }


        public function allClaims()
        {
            if ($this->managedArea) {
                return $this->managedArea->claims();
            }
            $claimIds = $this->chiefClaims()->union($this->managerClaims()->toBase())->union($this->assistantClaims()->toBase())->pluck('id');
            return Claim::whereNull('deleted_at')->select(Claim::$fields)->addSelect(DB::raw("'bo' as user_role"));
        }

        /*
        // TODO : fix or remove
        public function awaitingProcessingClaims()
        {
            $claims = Claim::where('status_id', 5)->get();
            $claims_not_final_damaged_claim_plots = $claims->hasMany(ClaimPlot::class)->where('damaged', 1)
                ->where('plot_number', '!=', 0)
                ->notFinal();
            $claims_not_final_global_claim_plot = Claim::hasMany(ClaimPlot::class)->where('plot_number', 0)
                ->notFinal();
            return MEERGE;
        }


        /**
         * HasMany ChiefClaims
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function chiefClaims()
        {
            return $this->hasMany(Claim::class, 'chief_assessor_id')->select(Claim::$fields)->addSelect(DB::raw("'chief_assessor' as user_role"));
        }

        /**
         * HasMany ManagerClaims
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function managerClaims()
        {
            return $this->hasMany(Claim::class, 'manager_assessor_id')->select(Claim::$fields)->addSelect(DB::raw("'manager_assessor' as user_role"));
        }

        /**
         * Assistant claims
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function assistantClaims()
        {
            return $this->belongsToMany(Claim::class, 'assistant_to_claim', 'assistant_assessor_id', 'claim_id')->select(Claim::$fields)->addSelect(DB::raw("'assistant_assessor' as user_role"));
        }

        public function areaOrChiefClaims()
        {
            if ($this->managedArea) {
                return $this->managedArea->claims();
            }
            $claimIds = $this->chiefClaims()->pluck('id');

            return Claim::whereIn('id', $claimIds);
        }

        public function areaOrChiefOrManagerClaims()
        {
            if ($this->managedArea) {
                return $this->managedArea->claims();
            }

            $claimIds = $this->chiefClaims()->union($this->managerClaims()->toBase())->pluck('id');

            return Claim::whereIn('id', $claimIds);
        }

        /**
         * Claims
         *
         */
        public function claims()
        {
            if ($this->managedArea) {
                return $this->managedArea->claims();
            }

            $claimIds = $this->chiefClaims()->union($this->managerClaims()->toBase())->union($this->assistantClaims()->toBase())->pluck('id');

            return Claim::whereIn('id', $claimIds);
            // CP personal note : WHY ?
            //return Claim::where('status_id', 9);

        }

        public function getIsChiefAssessorAttribute()
        {
            return !!$this->chiefClaims()->count();
        }

        public function getIsAreaManagerAttribute()
        {
            return !!$this->managedArea()->count();
        }

        public function getIsManagerAssessorAttribute()
        {
            return !!$this->managerClaims()->count();
        }

        public function googleAccounts()
        {
            return $this->hasMany(GoogleAccount::class);
        }


        public function sendPasswordResetNotification($token)
        {
            $this->notify(new PasswordReset($token));
        }
    }
