<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter;

use Maltehuebner\WarmingStripesCss\Converter\Image\ColorPicker;
use Maltehuebner\WarmingStripesCss\Converter\Image\Image;
use Maltehuebner\WarmingStripesCss\Converter\Stripe\Stripe;
use Maltehuebner\WarmingStripesCss\Converter\Stripe\StripeList;

class ImageAnalyzer
{
    private function __construct()
    {

    }

    public static function analyze(Image $image): StripeList
    {
        $stripeList = new StripeList();
        $currentColor = null;
        $width = 1;

        for ($x = 0; $x < 100; ++$x) {
            $color = ColorPicker::color($image, $x);

            if (!$currentColor) {
                $currentColor = $color;
            }

            if ($currentColor === $color) {
                ++$width;
            } else {
                $stripeList->add(new Stripe($color, $width));
                $width = 1;
                $currentColor = null;
            }
        }

        return $stripeList;
    }
}