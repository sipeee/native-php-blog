<?php

use App\Model\Crud\Configuration\PostCrudConfiguration;
use App\Model\Crud\CrudManager;
use App\Model\LoginSession;
use App\Utility\ResponseUtility;

require_once "../../vendor/autoload.php";

$loginSession = LoginSession::getInstance();
$loggedInUser = $loginSession->authorize();

if (null === $loggedInUser) {
    ResponseUtility::redirectToAndExit('/login.php');
}

$crudManager = new CrudManager(new PostCrudConfiguration());

$crudManager->generate();
