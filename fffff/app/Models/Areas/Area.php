<?php

    namespace App\Models\Areas;

    use App\Models\Areas\Departments\Department;
    use App\Models\Claims\Claim;
    use App\Models\ParentModel;
    use App\Models\Users\User;

    class Area extends ParentModel
    {
        /**
         * Table
         *
         * @var string
         */
        public $table = 'areas';

        /**
         * Fillable
         *
         * @var array
         */
        protected $fillable = ['name', 'code', 'area_manager_id'];


        /**
         * Departments
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function departments()
        {
            return $this->hasMany(Department::class);
        }

        /**
         * Area Manager
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function areaManager()
        {
            return $this->belongsTo(User::class, 'area_manager_id');
        }

        /**
         * Area Assessors
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function assessors()
        {
            return $this->hasMany(User::class);
        }


        /**
         * Claims
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function claims()
        {
            return $this->hasMany(Claim::class);
        }

    }
