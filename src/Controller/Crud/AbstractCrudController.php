<?php

namespace App\Controller\Crud;

use App\Model\Crud\Configuration\CrudConfigurationInterface;
use App\Model\Crud\Configuration\PostCrudConfiguration;
use App\Model\Crud\CrudManager;
use App\Model\LoginSession;
use App\Utility\ResponseUtility;

abstract class AbstractCrudController
{
    public function __invoke()
    {

        $loginSession = LoginSession::getInstance();
        $loggedInUser = $loginSession->authorize();

        if (null === $loggedInUser) {
            ResponseUtility::redirectToAndExit('/login.php');
        }

        $crudManager = new CrudManager($this->getCrudConfig());

        $crudManager->generate();
    }

    abstract protected function getCrudConfig(): CrudConfigurationInterface;
}