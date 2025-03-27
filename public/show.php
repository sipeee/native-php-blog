<?php

use App\Model\Repository;
use App\Model\RequestStack;
use App\Model\SmartyRenderer;
use App\Utility\ResponseUtility;

require_once "../vendor/autoload.php";

$repository = new Repository();

$request = RequestStack::getInstance()->getRequest();
$id = $request->query->get('id');

if (empty($id) || !is_string($id) || !ctype_digit($id)) {
    ResponseUtility::redirectToAndExit('/');
}

$post = $repository->queryPublishedPostById($id);

if (empty($post)) {
    ResponseUtility::redirectToAndExit('/');
}

SmartyRenderer::getInstance()->render('show.tpl', [
    'post' => $post,
]);
