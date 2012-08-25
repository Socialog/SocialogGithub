<?php

return array(
	
	/**
	 * View Configuration
	 */
	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),

    /**
     * Router Configuration
     */
    'router' => array(
        'routes' => array(
            'socialog-admin' => array(
                'child_routes' => array(
                    'github' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/github[/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'socialog-github-install'
                            ),
                        ),
                    ),
                ),
            ),
			'socialog-github' => array(
				'type' => 'Segment',
				'options' => array(
					'route'    => '/github[/:action]',
					'constraints' => array(
						'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
					),
					'defaults' => array(
						'controller' => 'socialog-github',
						'action'	=> 'index',
					),
				),
			),
        ),
    ),
	
	'controllers' => array(
		'invokables' => array(
			'socialog-github-install' => 'SocialogGithub\Controller\InstallController',
			'socialog-github' => 'SocialogGithub\Controller\GithubController',
		),
	),

    /**
     * Admin Navigation
     */
    'navigation' => array(
        'socialog-admin' => array(
            'github' => array(
                'label' => 'Github',
                'route' => 'socialog-admin/github',
            ),
        ),
    ),
);
