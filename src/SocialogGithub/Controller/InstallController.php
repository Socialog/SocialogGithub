<?php

namespace SocialogGithub\Controller;

use Github\Client;
use SocialogAdmin\Controller\AbstractController;

/**
 * Install
 */
class InstallController extends AbstractController
{
	/**
	 * Overview
	 */
	public function indexAction()
	{
		$sm = $this->getServiceLocator();
		$client = $sm->get('socialog_github_client');
		$repos = $client->api('user')->show('Rovak');

		return array(
			'repos' => $repos
		);
	}
}
