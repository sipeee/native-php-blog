<?php

namespace App\Controller\Crud;

use App\Model\Crud\Configuration\PostCrudConfiguration;
use App\Model\Crud\CrudManager;
use App\Model\LoginSession;
use App\Utility\ResponseUtility;

class PostCrudController
{
    public function __invoke()
    {

        $loginSession = LoginSession::getInstance();
        $loggedInUser = $loginSession->authorize();

        if (null === $loggedInUser) {
            ResponseUtility::redirectToAndExit('/login.php');
        }

        $crudManager = new CrudManager(new PostCrudConfiguration());

        $crudManager->generate();
    }
}