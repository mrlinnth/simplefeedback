<?php

return [
    /**
     * Save into database
     */
    'database' => true,

    /**
     * Create GitHub issue
     */
    'github' => [
        'enable' => true,
        'owner' => env('GITHUB_OWNER', 'mrlinnth'),
        'repo' => env('GITHUB_REPO', 'simplefeedback'),
    ],

    /**
     * Send Telegram notification
     */
    'telegram_noti' => false,
];
