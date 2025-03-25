<?php

namespace App\Model\Crud;

use App\Model\Crud\Configuration\CrudConfigurationInterface;
use App\Model\RequestStack;
use App\Utility\ResponseUtility;

class CrudManager
{
    public function __construct(
        private CrudConfigurationInterface $configuration,
    )
    {
    }

    public function generate(): void
    {
        $request = RequestStack::getInstance()->getRequest();

        switch ($request->query->get('action', ListManager::ACTION)) {
            case ListManager::ACTION:
                (new ListManager($this->configuration))->renderList();
                break;
            case NewManager::ACTION:
                (new NewManager($this->configuration))->renderNew();
                break;
            case EditManager::ACTION:
                (new EditManager($this->configuration))->renderEdit();
                break;
            case DeleteManager::ACTION:
                (new DeleteManager($this->configuration))->deleteAndRedirect();
                break;
            default:
                $this->redirectToListAndExit();
        }
    }

    private function redirectToListAndExit(): void
    {
        $request = RequestStack::getInstance()->getRequest();

        ResponseUtility::redirectToAndExit($request->getBaseUrl().'?'.http_build_query([
            'action' => ListManager::ACTION,
        ]));
    }
}