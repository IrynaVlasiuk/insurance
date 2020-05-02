<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => env('ORACLE_DB_TNS', ''),
        'host'           => env('ORACLE_DB_HOST', ''),
        'port'           => env('ORACLE_DB_PORT', '1521'),
        'database'       => env('ORACLE_DB_DATABASE', ''),
        'username'       => env('ORACLE_DB_USERNAME', ''),
        'password'       => env('ORACLE_DB_PASSWORD', ''),
        'charset'        => env('ORACLE_DB_CHARSET', ''),
        'prefix'         => env('ORACLE_DB_PREFIX', ''),
        'prefix_schema'  => env('ORACLE_DB_SCHEMA_PREFIX', ''),
        'edition'        => env('ORACLE_DB_EDITION', ''),
        'server_version' => env('ORACLE_DB_SERVER_VERSION', ''),
    ],
];
