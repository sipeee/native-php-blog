<?php

namespace App\Utility;

class BoolUtility
{
    public static function trueRequestParameters(): array
    {
        return [1, true, 'on', 'true', '1'];
    }

    public static function isTrueRequestParameter($parameterValue): bool
    {
        return in_array($parameterValue, self::trueRequestParameters(), true);
    }
}