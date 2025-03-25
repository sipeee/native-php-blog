<?php

use App\Model\LoginSession;
use App\Model\RequestStack;
use App\Model\SmartyRenderer;
use App\Utility\ResponseUtility;

require_once "../vendor/autoload.php";

$loginSession = LoginSession::getInstance();
$loggedInUser = $loginSession->authorize();

if (null !== $loggedInUser) {
    ResponseUtility::redirectToAndExit('/crud/users.php');
}

$request = RequestStack::getInstance()->getRequest();

$wrongLogin = false;
if ($request->isMethod('POST') && $request->request->has('login')) {
    $loginData = $request->request->all('login');
    $wrongLogin = !$loginSession->authenticate($loginData['email'], $loginData['password']);
    if (!$wrongLogin) {
        ResponseUtility::redirectToAndExit('/crud/users.php');
    }
}

SmartyRenderer::getInstance()->render('login.tpl', [
    'wrongLogin' => $wrongLogin,
]);