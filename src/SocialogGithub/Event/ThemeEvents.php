<?php

namespace SocialogGithub\Event;

use Socialog\EventManager\EventHandler;
use Socialog\Theme\Menuitem;
use Zend\EventManager\Event;
use Zend\ServiceManager\ServiceManager;

class ThemeEvents extends EventHandler
{
    /**
     * @var ServiceManager
     */
    protected $serviceManager;

    protected $hooks = array(
        'test1'      => 'renderMenu',
        'test2'  => array( 'renderPrePost' => 100 ),
    );

    protected $sharedHooks = array(
        'theme' => array(
            'menu'      => 'renderMenu',
            'post.pre'  => array( 'renderPrePost' => 100 ),
        ),
    );

    public function renderMenu(Event $e)
    {
        return new Menuitem('Github', 'socialog-github');
    }

    public function renderPrePost(Event $e)
    {
        $post = $e->getParam('post');

        return "Github: " . $post->getTitle();
    }
}