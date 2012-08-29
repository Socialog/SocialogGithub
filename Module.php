<?php

namespace SocialogGithub;

use Github\Client;
use Socialog\Theme\Menuitem;

class Module
{
    public function onBootstrap($e)
    {
        $app = $e->getApplication();
        $app->getEventManager()->attach(new Event\ThemeEvents);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__	=> __DIR__ . '/src/' . __NAMESPACE__,
					'Github'		=> __DIR__ . '/vendor/Github',
					'Buzz'		=> __DIR__ . '/vendor/Buzz',
                ),
            ),
        );
    }
	
	public function getServiceConfig()
	{
		return array(
			'factories' => array(
				'socialog_github_client' => function($sm) {
					return new Client();
				}
			),
		);
	}
}
