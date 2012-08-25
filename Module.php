<?php

namespace SocialogGithub;

use Github\Client;
use Socialog\Theme\Menuitem;

class Module
{
    public function onBootstrap($e)
    {
        $app = $e->getApplication();
        $sm = $app->getServiceManager();
        $sharedEventManager = $sm->get('SharedEventManager');

        // Inhaken in menu
        $sharedEventManager->attach('theme', 'menu', function($e) use ($sm) {
			$view = $sm->get('ViewRenderer');
			$url = $view->url('socialog-github');
            return new Menuitem('Github', $url);
        });

        // Voor een post
        $sharedEventManager->attach('theme', 'post.pre', function($e){
            $post = $e->getParam('post');

            return "Github: " . $post->getTitle();
        });
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
