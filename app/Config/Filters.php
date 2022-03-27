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
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'adminfilter' => \App\Filters\AdminFilter::class,
        'kasirfilter' => \App\Filters\KasirFilter::class,
        'managerfilter' => \App\Filters\ManagerFilter::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'adminfilter' => ['except' => [
                'auth', 'auth/*',
                '/'
            ]],
            'kasirfilter' => ['except' => [
                'auth', 'auth/*',
                '/'
            ]],
            'managerfilter' => ['except' => [
                'auth', 'auth/*',
                '/'
            ]],
        ],
        'after' => [
            // 'toolbar',
            // 'honeypot',
            // 'secureheaders',
            'adminfilter' => ['except' => [
                'home', 'home/*',
                'user', 'user/*',
                'level', 'level/*',
                'menu', 'menu/*',
                'order', 'order/*',
                'menu', 'menu/*',
                'transaksi', 'transaksi/*',
            ]],
            'kasirfilter' => ['except' => [
                'home', 'home/*',
                'transaksi', 'transaksi/*',
                'user', 'user/profile',
                'user', 'user/user_edit',
                'user', 'user/user_update',
                'order', 'order/*',
                // 'order', 'order/detail_order_new',
                // 'order', 'order/detail_order_baru',
                // 'order', 'order/detail_order_edit',
                // 'order', 'order/order/detail_order',
                // 'order', 'order/order_new',
                // 'order', 'order/order_bayar_new',
                // 'order', 'order/order/order_tambah',
                // 'order', 'order/order/pesan_detail_order',
                // 'order', 'order/order/detail_order_update',
                // 'order', 'order/order/order_bayar',
                // 'order', 'order/detail_order_hapus',
                // 'order', 'order/order_hapus',
                // 'order', 'order/detaildelet',
                // 'order', 'order/transaksi_hapus',
                // 'order', 'order/transaksi',
                // 'order', 'order/order',
            ]],
            'managerfilter' => ['except' => [
                'home', 'home/*',
                'transaksi', 'transaksi/*',
                'user', 'user/profile',
                'user', 'user/user_edit',
                'user', 'user/user_update',
                'order', 'order/print',
            ]],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
