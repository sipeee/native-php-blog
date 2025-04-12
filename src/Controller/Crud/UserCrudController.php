<?php

namespace App\Controller\Crud;

use App\Model\Crud\Configuration\UserCrudConfiguration;
use App\Model\Crud\CrudManager;
use App\Model\LoginSession;
use App\Utility\ResponseUtility;

class UserCrudController
{
    public function __invoke()
    {
        $loginSession = LoginSession::getInstance();
        $loggedInUser = $loginSession->authorize();

        if (null === $loggedInUser) {
            ResponseUtility::redirectToAndExit('/login.php');
        }

        $crudManager = new CrudManager(new UserCrudConfiguration());

        $crudManager->generate();
    }
}