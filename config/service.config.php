<?php

namespace SocialogGithub;

use Github\Client;

return array(
    
    'invokables' => array(
        'socialog_github_mapper' => 'SocialogGithub\Mapper\Github',
    ),
    
    'factories' => array(
        'socialog_github_client' => function($sm) {
            return new Client();
        },
    ),
);