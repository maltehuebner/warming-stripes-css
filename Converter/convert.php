<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter;

require_once '../vendor/autoload.php';

$stripeList = [];

$im = imagecreatefrompng('./stripes.png');

$im = imagescale($im, 100);

$imageWidth = imagesx($im);

$currentColor = null;
$width = 1;

for ($x = 0; $x < $imageWidth; ++$x) {
  $rgb = imagecolorat($im, $x, 0);

  $color = new Color(
    ($rgb >> 16) & 0xFF,
    ($rgb >> 8) & 0xFF,
    $rgb & 0xFF
  );

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

$factor = 100 / $imageWidth;

$position = 0;

foreach ($stripeList as $key => $stripe) {
  $width = $stripe->getWidth() * $factor;

  $stripe->setWidth($width)->setPosition($position);

  $position += $width;
}

echo join($stripeList, ', ');
