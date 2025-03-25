<?php

namespace App\Smarty;

use Smarty\Extension\Base;

class AppExtension extends Base
{
    public function getModifierCallback(string $modifierName) {
        switch ($modifierName) {
            case 'query': return [$this, 'smarty_modifier_query'];
        }

        return null;
    }

    public function smarty_modifier_query(array $parameters): string
    {
        return http_build_query($parameters);
    }
}