<?php

return [
    'enabled' => true,

    // v0.2: created/updated/deleted
    'events' => ['created', 'updated', 'deleted'],

    // diff calculation
    'null_equals_empty_string' => true,
    'skip_if_only_timestamps_changed' => true,

    // storage strategy
    'store_full_snapshot' => false,

    // security
    'mask_keys' => [
        'password',
        'token',
        'secret',
        'api_key',
        'authorization',
    ],

    // NEW: exclude keys from auditing (diff/before/after)
    'exclude_keys' => [
        // Laravel default examples
        'remember_token',
    ],

    // actor resolution (optional)
    // Closure: fn () => ['id' => '...', 'type' => '...']
    'actor_resolver' => fn () => [
        'id' => 'demo-user-1',
        'type' => 'demo',
    ],

];
