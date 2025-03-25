<?php

namespace App\Model;

use App\Smarty\AppExtension;
use Smarty\Smarty;
use Symfony\Component\HttpFoundation\Response;

class SmartyRenderer
{
    private function __construct() {}

    public static function getInstance(): self
    {
        return new self();
    }

    public function render(string $template, array $params = []): void
    {
        $smarty = self::createBaseSmarty();

        foreach ($params as $name => $value) {
            $smarty->assign($name, $value);
        }

        $response = new Response($smarty->fetch($template));
        $response->send();
    }

    private static function createBaseSmarty(): Smarty
    {
        $smarty = new Smarty();
        $smarty->setTemplateDir(__DIR__ . '/../../smarty/templates');
        $smarty->setCompileDir(__DIR__ . '/../../smarty/templates_c');
        $smarty->setCacheDir(__DIR__ . '/../../smarty/cache');
        $smarty->setConfigDir(__DIR__ . '/../../smarty/configs');
        $smarty->addExtension(new AppExtension());

        return $smarty;
    }
}