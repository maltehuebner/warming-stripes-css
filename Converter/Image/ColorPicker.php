<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter\Image;

use Maltehuebner\WarmingStripesCss\Converter\Color;

class ColorPicker
{
    private function __construct()
    {

    }

    public static function color(Image $image, int $x): Color
    {
        $rgb = imagecolorat($image->getImage(), $x, 0);

        return new Color(
            ($rgb >> 16) & 0xFF,
            ($rgb >> 8) & 0xFF,
            $rgb & 0xFF
        );
    }
}