<?php

namespace App\Model\Crud;

use App\Model\ConnectionProvider;
use App\Model\Crud\Configuration\CrudConfigurationInterface;
use App\Model\RequestStack;
use App\Model\SmartyRenderer;

class ListManager
{
    public const string ACTION = 'list';

    public function __construct(
        private CrudConfigurationInterface $configuration,
    )
    {
    }

    public function renderList(): void
    {
        $rows = $this->queryRowsOfList();

        SmartyRenderer::getInstance()->render('crud/list.tpl', [
            'configuration' => $this->configuration,
            'rows' => $rows,
            'request' => RequestStack::getInstance()->getRequest(),
        ]);
    }

    private function queryRowsOfList(): array
    {
        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare($this->configuration->getListQuery());

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}