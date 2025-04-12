<?php

namespace App\Controller;

use App\Model\Repository;
use App\Model\SmartyRenderer;

class IndexController
{
    public function __invoke()
    {
        $repository = new Repository();

        SmartyRenderer::getInstance()->render('index.tpl', [
            'posts' => $repository->queryPublishedPosts(),
        ]);
    }
}