<?php

    if (!function_exists('user')) {
        /**
         * Retrieve current Authenticated User for both Web and Api interfaces
         *
         * @return \App\Models\Users\User|\Illuminate\Contracts\Auth\Authenticatable|null
         */
        function user()
        {
            return request()->user();
        }
    }

    if (!function_exists('assessor')) {
        /**
         * Retrieve current Authenticated User for both Web and Api interfaces
         *
         * @return \App\Models\Users\User|\Illuminate\Contracts\Auth\Authenticatable|null
         */
        function assessor()
        {
            return request()->user();
        }
    }


    use Spatie\Fractal\Fractal;

    if (!function_exists('fractal')) {
        /**
         * @param null|mixed $data
         * @param null|callable|\League\Fractal\TransformerAbstract $transformer
         * @param null|\League\Fractal\Serializer\SerializerAbstract $serializer
         *
         * @return \Spatie\Fractal\Fractal
         */
        function fractal($data = null, $transformer = null, $serializer = null)
        {
            $fractalClass = config('fractal.fractal_class') ?? Fractal::class;

            return $fractalClass::create($data, $transformer, $serializer);
        }
    }
