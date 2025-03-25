<?php

use App\Model\LoginSession;
use App\Model\RequestStack;
use App\Model\SmartyRenderer;
use App\Utility\ResponseUtility;

require_once "../vendor/autoload.php";

$loginSession = LoginSession::getInstance();
$loginSession->logout();

ResponseUtility::redirectToAndExit('/login.php');
