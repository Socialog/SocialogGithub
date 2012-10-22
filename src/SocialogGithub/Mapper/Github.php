<?php

namespace SocialogGithub\Mapper;

use Socialog\Mapper\AbstractMapper;

/**
 * Github Mapper
 */
class Github extends AbstractMapper
{
    /**
     * @var \Github\Client
     */
    protected $client;
    
    /**
     * @return \Github\Client
     */
    public function getClient()
    {
        if (null == $this->client) {
            $this->client = $this->getServiceLocator()->get('socialog_github_client');
        }
        return $this->client;
    }

    /**
     * @return array
     */
    public function getRepositories($username)
    {
        return $this->getClient()->api('user')->repositories($username);
    }
    
    /**
     * @param string $username
     */
    public function getProfile($username)
    {
        return $this->getClient()->api('user')->show($username);
    }
}