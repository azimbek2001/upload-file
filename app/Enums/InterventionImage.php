<?php

namespace App\Enums;

use App\Http\Controllers\InterventionController;
use BenSampo\Enum\Enum;

/**
 * @method static static LG()
 * @method static static MD()
 * @method static static SM()
 * @method static static XS()
 **/
class InterventionImage extends Enum
{
    private const LG = 50;
    private const MD = 150;
    private const SM = 250;
    private const XS = 1000;

    public static function toIdArray(): array
    {
        return [
            1 => self::LG,
            2 => self::MD,
            3 => self::SM,
            4 => self::XS,
        ];
    }
    public  function getWidth($id)
    {
        $widths = self::toIdArray();
        return $widths[$id] ?? '';
    }


    public static function getTitlesArray(){
        return [
            1 => "lg",
            2 => 'md',
            3 => 'sm',
            4 => 'xs',
        ];
    }

    public  function getTitle($id)
    {
        $title = self::getTitlesArray();
        return $title[$id] ?? '';
    }

}
