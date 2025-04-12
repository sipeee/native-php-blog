<?php

namespace App\Controller\Crud;

use App\Model\Crud\Configuration\CrudConfigurationInterface;
use App\Model\Crud\Configuration\PostCrudConfiguration;

class PostCrudController extends AbstractCrudController
{
    protected function getCrudConfig(): CrudConfigurationInterface
    {
        return new PostCrudConfiguration();
    }
}