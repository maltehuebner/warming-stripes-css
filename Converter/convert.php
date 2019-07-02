<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter;

use Maltehuebner\WarmingStripesCss\Converter\Image\ColorPicker;
use Maltehuebner\WarmingStripesCss\Converter\Image\ImageFactory;

require_once '../vendor/autoload.php';

$filename = $argv[1];

$stripeList = [];

$image = ImageFactory::createFromFile($filename);

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
        $stripeList[] = new Stripe($color, $width);
        $width = 1;
        $currentColor = null;
    }
}

ImageFactory::destroy($image);

$position = 0;

foreach ($stripeList as $key => $stripe) {
    $width = $stripe->getWidth();

    $stripe->setWidth($width)->setPosition($position);

    $position += $width;
}

echo join($stripeList, ', ');
