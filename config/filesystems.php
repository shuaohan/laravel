<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',             
            'root' => storage_path('app'),  //  storage/app
        ],
        //public磁盘
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),  //  storage/app/public
            'url' => env('APP_URL').'/storage',    //   /storage
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],
        //自定义驱动 
        'mylocal' => [
            'driver' => 'local',            
            'root' =>  'resource',  //存储路径 public/resource
           
        ],
        'mytxt' => [
            'driver' => 'local',            
            'root' =>  storage_path('app/txt'),  //存储路径 storage/app/txt
           
        ],

    ],
    /**
     * FTP 驱动配置
     */
    // 'ftp' => [
    //     'driver'   => 'ftp',
    //     'host'     => 'ftp.example.com',
    //     'username' => 'your-username',
    //     'password' => 'your-password',
    
    //     // 可选的 FTP 配置项...
    //     // 'port'     => 21,
    //     // 'root'     => '',
    //     // 'passive'  => true,
    //     // 'ssl'      => true,
    //     // 'timeout'  => 30,
    // ],

];
