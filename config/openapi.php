<?php

return [

    'collections' => [

        'default' => [

            'info' => [
                'title' => config('app.name'),
                'description' => null,
                'version' => '1.0.0',
                'contact' => [],
            ],

            'servers' => [
                [
                    'url' => env('APP_URL'),
                    'description' => null,
                    'variables' => [],
                ],
            ],

            'tags' => [

                [
                    'name' => 'blog-posts',
                    'description' => 'Blog Posts',
                ],
                [
                    'name' => 'category',
                    'description' => 'Category',
                ],
                [
                    'name' => 'file-upload',
                    'description' => 'File Upload',
                ],
                [
                    'name' => 'job-application',
                    'description' => 'Job Application',
                ],
                [
                    'name' => 'job',
                    'description' => 'Job',
                ],
                [
                    'name' => 'job-saved',
                    'description' => 'JobSaved',
                ],
                [
                    'name' => 'job-type',
                    'description' => 'JobType',
                ],
                [
                    'name' => 'device-notification',
                    'description' => 'NotificationDevice',
                ],
                [
                    'name' => 'notification-settings',
                    'description' => 'NotificationSettings',
                ],
                [
                    'name' => 'package',
                    'description' => 'Package',
                ],
                [
                    'name' => 'post-duration',
                    'description' => 'PostDuration',
                ],
                [
                    'name' => 'resume',
                    'description' => 'Resume',
                ],
                [
                    'name' => 'skill',
                    'description' => 'Skill',
                ],

            ],

            'security' => [
                // GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement::create()->securityScheme('JWT'),
            ],

            // Non standard attributes used by code/doc generation tools can be added here
            'extensions' => [
                // 'x-tagGroups' => [
                //     [
                //         'name' => 'General',
                //         'tags' => [
                //             'user',
                //         ],
                //     ],
                // ],
            ],

            // Route for exposing specification.
            // Leave uri null to disable.
            'route' => [
                'uri' => '/openapi',
                'middleware' => [],
            ],

            // Register custom middlewares for different objects.
            'middlewares' => [
                'paths' => [
                    //
                ],
                'components' => [
                    //
                ],
            ],

        ],

    ],

    // Directories to use for locating OpenAPI object definitions.
    'locations' => [
        'callbacks' => [
            app_path('OpenApi/Callbacks'),
        ],

        'request_bodies' => [
            app_path('OpenApi/RequestBodies'),
        ],

        'responses' => [
            app_path('OpenApi/Responses'),
        ],

        'schemas' => [
            app_path('OpenApi/Schemas'),
        ],

        'security_schemes' => [
            app_path('OpenApi/SecuritySchemes'),
        ],
    ],

];
