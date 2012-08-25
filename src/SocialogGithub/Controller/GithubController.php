<?php

namespace SocialogGithub\Controller;

use Socialog\Controller\AbstractController;
use Zend\View\Model\ViewModel;

/**
 * Github
 */
class GithubController extends AbstractController
{
	protected $client;

	public function getClient()
	{
		if (null == $this->client) {
			$this->client = $this->getServiceLocator()->get('socialog_github_client');
		}
		return $this->client;
	}
	
	/**
	 * Overview
	 */
	public function indexAction()
	{
		$sm = $this->getServiceLocator();
		
		$viewModel = new ViewModel;
		$viewModel->setTemplate('github/repositories');
		
		$client = $sm->get('socialog_github_client');
		$viewModel->repositories = $client->api('user')->repositories('Rovak');
		$viewModel->user = $client->api('user')->show('Rovak');
			
		return $viewModel;
	}
}
