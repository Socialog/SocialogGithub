<?php

namespace SocialogGithub\Controller;

use Socialog\Controller\AbstractController;
use Zend\View\Model\ViewModel;

/**
 * Github Controller
 */
class GithubController extends AbstractController
{
	/**
	 * Overview
	 */
	public function indexAction()
	{
		$sm = $this->getServiceLocator();
		
		$viewModel = new ViewModel;
		$viewModel->setTemplate('@theme/github/repositories.twig');

        /* @var $githubMapper \SocialogGithub\Mapper\Github */
		$githubMapper = $sm->get('socialog_github_mapper');
		$viewModel->repositories = $githubMapper->getRepositories('rovak');
		$viewModel->user = $githubMapper->getProfile('rovak');

		return $viewModel;
	}
}
