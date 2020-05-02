<?php

    namespace App\Models\Areas\Departments;

    use App\Models\Areas\Area;
    use App\Models\ParentModel;

    class Department extends ParentModel
    {
        /**
         * Table
         * @var string
         */
        public $table = 'departments';

        /**
         * Fillable
         * @var array
         */
        protected $fillable = ['code', 'name', 'area_id'];

        /**
         * Area
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function area()
        {
            return $this->belongsTo(Area::class);
        }
    }
