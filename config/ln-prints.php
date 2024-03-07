<?php

return [
    // Business
    'business'    => [
        'coc' => '80357733',
        'vat' => 'NL003428173B82',
    ],

    // Contact
    'contact'     => [
        'mail'  => 'info@ln-prints.nl',
        'phone' => '+31621974611',
    ],

    /**
     * Locales
     */
    'locales'     => [
        'en',
        'nl',
    ],

    /**
     * Permissions
     */
    'permissions' => [
        'all'      => [
            'View horizon',
            'View nova',
            'View backups tool',
            'View packages tool',
            'View permissions tool',
            'View telescope',

            'View users',
            'Create users',
            'Update users',
            'Delete users',
            'Restore users',
            'Force delete users',

            'View roles',
            'Create roles',
            'Update roles',
            'Delete roles',
            'Restore roles',
            'Force delete roles',

            'View permissions',
            'Create permissions',
            'Update permissions',
            'Delete permissions',
            'Restore permissions',
            'Force delete permissions',

            'View activities',
            'Create activities',
            'Update activities',
            'Delete activities',
            'Restore activities',
            'Force delete activities',

            'View fabrics',
            'Create fabrics',
            'Update fabrics',
            'Delete fabrics',
            'Restore fabrics',
            'Force delete fabrics',

            'View projects',
            'Create projects',
            'Update projects',
            'Delete projects',
            'Restore projects',
            'Force delete projects',
        ],
        'roles'    => [
            'Administrators' => [
                'View nova',

                'View users',

                'View activities',

                'View fabrics',
                'Create fabrics',
                'Update fabrics',
                'Delete fabrics',

                'View projects',
                'Create projects',
                'Update projects',
                'Delete projects',
            ],
            'Members'        => [

            ],
        ],
        'packages' => [
            'horizon'                => 'View horizon',
            'nova'                   => 'View nova',
            'nova-backups-tool'      => 'View backups tool',
            'nova-packages-tool'     => 'View packages tool',
            'nova-permissions-tool'  => 'View permissions tool',
            'telescope'              => 'View telescope',
        ],
    ],

    'social_media' => [
        'facebook'  => 'https://facebook.com/LNPrints.nl',
        'instagram' => 'https://www.instagram.com/ln_prints',
        'linkedin'  => 'https://www.linkedin.com/company/ln-prints',
    ],
];
