<?php

return [
    'throttle' => [
        'clients_api' => [
            'authorization' => [
                'key' => 'clients_api_auth_throttle:',
                'attempts' => 5,
                'timeout' => 15,
                'special_characters_allowed' => '!$#%&()*+,-.:;<=>?@_`{}~'
            ]
        ]
    ],
    'menus' => [
        'max_length_company_name' => 25
    ],
    'clients' => [
        'schedule_call_url' => 'https://calendly.com/my-url-in-calendly'
    ],
    'campaigns' => [
        'grid' => [
            'pageSize' => 10
        ],
        'list_upload' => [
            'prefix_custom_field' => 'custom_',
            'file_types' => [
                'xlsx',
                'csv',
                'ods'
            ]
        ],
        'script' => [
            'questions' => [
                'min_options' => 2,
                'max_options' => 10
            ],
            'editor' => [
                'tinymce' => [
                    'plugins' => 'paste',
                    'toolbar1' => 'styleselect | removeformat'
                ]
            ]
        ]
    ],
    'general' => [
        'default_money_symbol' => '$',
        'default_payment_transaction_timeout' => 10, //In minutes
        'default_zip_code' => '10010',
        'default_timezone' => 'America/Los_Angeles',
        'default_dialing_international' => '+'
    ],
    'env' => [
        'tmp_folder' => '/tmp/',
        'lead_uploads_folder' => '/app/leads_upload/',
        'reward_uploads_folder' => '/app/reward_upload/',
        'agent_invitations_folder' => '/app/agent_invitations/',
        'audios' => [
            'campaigns' => [
                'calls' => 'audios/campaigns/:campaign_id/calls/'
            ]
        ],
        'folders' => [
            'campaigns' => [
                'training' => 'campaigns/:campaign_id/training/'
            ],
        ],
        'api' => [
            'agents' => [
                'profile' => [
                    'pictures' => 'images/agents/profile_pictures/',
                ]
            ]
        ],
        'calendar_credentials_path' => 'app/calendar_credentials.json'
    ],
    'emails' => [
        'support' => [
            'mail' => 'support@app.com',
            'name' => 'Support App'
        ]
    ],
    'email_templates' => [
        'editor' => [
            'tinymce' => [
                'menubar' => 'code',
                'plugins' => 'code,link,image,preview',
                'toolbar1' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code preview'
            ]
        ]
    ],
    'utils' => [
        'smart_tags' => [
            'matcher' => '\\\B\\\|\\\|([\\\-+\\\w]*)$',
            'characters' => '||',
            'sections' => [
                'script' => 'script',
                'calendar' => 'calendar'
            ]
        ]
    ],
    'api' => [
        'campaigns' => [
            'metrics' => [
                'max_interval_months' => 6
            ]
        ]
    ],
    'auth' => [
        'csrf_max_length' => 100,
    ],
    'hash_id_length' => 10
];
