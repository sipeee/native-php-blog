<?php

use App\Model\Repository;
use App\Model\SmartyRenderer;

require_once "../vendor/autoload.php";

$repository = new Repository();

SmartyRenderer::getInstance()->render('index.tpl', [
    'posts' => $repository->queryPublishedPosts(),
]);