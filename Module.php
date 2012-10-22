<?php

namespace SocialogGithub;

use Socialog\Theme\Menuitem;
use Zend\Mvc\MvcEvent;

class Module
{   
    /**
     * @param \Zend\Mvc\MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $app = $e->getApplication();
        $sm = $app->getServiceManager();
        $sharedEventManager = $sm->get('SharedEventManager');

        // Hook into the menu of the theme
        $sharedEventManager->attach('theme', 'menu', function($e) use ($sm) {
			$view = $sm->get('ViewRenderer');
			$url = $view->url('socialog-github');
            return new Menuitem('Github', $url);
        });
    }
    
    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    /**
     * @return array
     */
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

    /**
     * 
     * @return array
     */
	public function getServiceConfig()
	{
		return include __DIR__ . '/config/service.config.php';
	}
}
