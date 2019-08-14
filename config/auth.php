<?php

return [


    //     Laravel 中实现登录认证非常简单。实际上，几乎所有东西 Laravel 都已经为你配置好了。
    //     配置文件位于 config/auth.php，其中包含了用于调整认证服务行为的、文档友好的选项配置。

    // 在底层代码中，Laravel 的认证组件由“guards”和“providers”组成，Guard 定义了用户在每个请求中如何实现认证，
    // 例如，Laravel 通过 session guard 来维护 Session 存储的状态和 Cookie。

    // Provider 定义了如何从持久化存储中获取用户信息，Laravel 底层支持通过 Eloquent 和数据库查询构建器两种方式来获取用户，
    // 如果需要的话，你还可以定义额外的 Provider。

    // 如果看到这些名词觉得云里雾里，大可不必太过担心，因为对绝大多数应用而言，只需使用默认认证配置即可，不需要做什么改动。

    // 学院君注：通俗点说，在进行登录认证的时候，要做两件事，一个是从数据库存取用户数据，一个是把用户登录状态保存起来，
    // 在 Laravel 的底层实现中，通过 Provider 存取数据，通过 Guard 存储用户认证信息，前者主要和数据库打交道，后者主要和
    //Session 打交道（API 例外）。

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards(守卫)
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'ordin' => [
            'driver' => 'session',
            'provider' => 'ordins',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' =>App\Model\Auth\Admin::class,
        ],
        'ordins' => [
            'driver' => 'eloquent',
            'model' =>App\Model\Auth\Ordin::class,
        ],
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Model\Auth\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
