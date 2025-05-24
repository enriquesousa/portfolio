<?php

return [

    'site_name' => 'TJWeb',
    'site_description' => 'Your one-stop solution for web development.',
    'admin_email' => 'admin@tjweb.com',
    'support_email' => 'support@tjweb.com',
    'phone' => '+1 234 567 890',
    'address' => '123 Main St, Anytown, USA',
    'social_links' => [
        'facebook' => 'https://www.facebook.com/tjweb',
        'twitter' => 'https://twitter.com/tjweb',
        'linkedin' => 'https://www.linkedin.com/company/tjweb',
        'instagram' => 'https://www.instagram.com/tjweb',
    ],
    'google_analytics' => env('GOOGLE_ANALYTICS_ID', 'UA-XXXXXXXXX-X'),
    'google_recaptcha' => [
        'site_key' => env('GOOGLE_RECAPTCHA_SITE_KEY', 'your-site-key'),
        'secret_key' => env('GOOGLE_RECAPTCHA_SECRET_KEY', 'your-secret-key'),
    ],

    'locale' => env('APP_LOCALE', 'en'),

];
