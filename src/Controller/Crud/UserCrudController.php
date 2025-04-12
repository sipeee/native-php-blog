<?php

namespace App\Controller\Crud;

use App\Model\Crud\Configuration\CrudConfigurationInterface;
use App\Model\Crud\Configuration\UserCrudConfiguration;

class UserCrudController extends AbstractCrudController
{
    protected function getCrudConfig(): CrudConfigurationInterface
    {
        return new UserCrudConfiguration();
    }
}