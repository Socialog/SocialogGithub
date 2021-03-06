<?php

namespace Github\Api\Issue;

use Github\Api\AbstractApi;

/**
 * @link   http://developer.github.com/v3/issues/events/
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class Events extends AbstractApi
{
    public function all($username, $repository, $issue = null, $page = 1)
    {
        if (null !== $issue) {
            return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/issues/'.urlencode($issue).'/events', array(
                'page' => $page
            ));
        }

        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/issues/events', array(
            'page' => $page
        ));
    }

    public function show($username, $repository, $event)
    {
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/issues/events/'.urlencode($event));
    }
}
