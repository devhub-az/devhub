<?php

return [

    // Mail Notification
    'mail_notification' => env('MAIL_NOTIFICATION') ?: false,

    // Super Admin
    'super_admin' => env('APP_SUPER_ADMIN') ?: 1,

    // Admin Credentials
    'admin_name' => env('ADMIN_NAME') ?: 'admin',
    'admin_email' => env('ADMIN_EMAIL') ?: 'admin@admin.com',
    'admin_password' => env('ADMIN_PASSWORD') ?: 'admin12345',

    // Default Avatar
    'default_avatar' => env('DEFAULT_AVATAR') ?: '/upload/avatars/default.png',

    // Default Icon
    'default_icon' => env('DEFAULT_ICON') ?: '/images/favicon.ico',

    //Check status page link
    'status_url' => env('STATUS_URL'),

    // Meta
    'meta' => [
        'keywords' => 'PJ Blog,blog,pigjian,laravel,vuejs',
        'description' => 'Nothing is impossible in PJ Blog',
    ],

    // Social Share
    'social_share' => [
        'article_share' => env('ARTICLE_SHARE') ?: true,
        'discussion_share' => env('DISCUSSION_SHARE') ?: true,
        'sites' => env('SOCIAL_SHARE_SITES') ?: 'google,twitter,weibo',
        'mobile_sites' => env('SOCIAL_SHARE_MOBILE_SITES') ?: 'google,twitter,weibo,qq,wechat',
    ],

    // Google Analytics
    'google' => [
        'id' => env('GOOGLE_ANALYTICS_ID', 'Google-Analytics-ID'),
        'open' => env('GOOGLE_OPEN') ?: false,
    ],
];
