<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, array<int, string>|string> [filter_name => classname]
     *                                               or [filter_name => [classname1, classname2, ...]]
     * @phpstan-var array<string, class-string|list<class-string>>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'authadminfilter' => \App\Filters\AuthAdminFilter::class,
        'authalumnifilter' => \App\Filters\AuthAlumniFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, array<string>>
     * @phpstan-var array<string, list<string>>|array<string, array<string, array<string, string>>>
     */
    public array $globals = [
        'before' => [
            'authadminfilter' => ['except' => [
                '/login-alumni', '/login-alumni/*', '/check-login-alumni',
                '/login-admin', '/login-admin/*',
                '/check-login-admin', '/register',
                '/', '/web', '/web/*', '/pengumuman', '/pengumuman/*',
                '/about', '/about/*',
            ]],
            // 'authalumnifilter' => ['except' => [
            //     '/login-alumni', '/login-alumni/*', '/check-login-alumni',
            //     '/login-admin', '/login-admin/*',
            //     '/check-login-admin', '/register',
            //     '/', '/web', '/web/*', '/pengumuman', '/pengumuman/*',
            //     '/about', '/about/*',
            // ]]
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'authadminfilter' => ['except' => [
                '/activation', '/activation/*', '/activate', '/activate/*',
                '/logout-alumni',
                '/home-alumni', '/home-alumni/*',
                '/kuesioner-alumni', '/kuesioner-alumni/*',
                '/profil-alumni', '/profil-alumni/*',
                '/changepassword-alumni', '/changepassword-alumni/*',
                '/logout-admin',
                '/home-admin', '/home-admin/*',
                '/pengumuman-admin', '/pengumuman-admin/*',
                '/kuesioner-admin', '/kuesioner-admin/*',
                '/alumni-admin', '/alumni-admin/*',
                '/admin', '/admin/*',
                '/profil-admin', '/profil-admin/*',
                '/changepassword-admin', '/changepassword-admin/*',
                '/', '/web', '/web/*', '/pengumuman', '/pengumuman/*',
                '/about', '/about/*',
            ]],
            // 'authalumnifilter' => ['except' => [
            //     '/activation', '/activation/*', '/activate', '/activate/*',
            //     '/logout-alumni',
            //     '/home-alumni', '/home-alumni/*',
            //     '/kuesioner-alumni', '/kuesioner-alumni/*',
            //     '/profil-alumni', '/profil-alumni/*',
            //     '/changepassword-alumni', '/changepassword-alumni/*',
            //     '/logout-admin',
            //     '/home-admin', '/home-admin/*',
            //     '/pengumuman-admin', '/pengumuman-admin/*',
            //     '/kuesioner-admin', '/kuesioner-admin/*',
            //     '/alumni-admin', '/alumni-admin/*',
            //     '/admin', '/admin/*',
            //     '/profil-admin', '/profil-admin/*',
            //     '/changepassword-admin', '/changepassword-admin/*',
            //     '/', '/web', '/web/*', '/pengumuman', '/pengumuman/*',
            //     '/about', '/about/*',
            // ]],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
