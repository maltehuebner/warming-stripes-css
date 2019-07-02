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

  if ($currentColor == $color) {
    ++$width;
  } else {
    $stripeList[] = new Stripe($color, $width);
    $width = 1;
    $currentColor = null;
  }
}

class Color {
  protected $red;
  protected $green;
  protected $blue;

  public function __construct(int $red, int $green, int $blue)
  {
    $this->red = $red;
    $this->green = $green;
    $this->blue = $blue;
  }

  public function getRed(): int
  {
    return $this->red;
  }

  public function getGreen(): int
  {
    return $this->green;
  }

  public function getBlue(): int
  {
    return $this->blue;
  }
}

class Stripe {
  protected $color;
  protected $width;
  protected $position;

  public function __construct(Color $color, int $width)
  {
    $this->color = $color;
    $this->width = $width;
  }

  public function getWidth(): float
  {
    return $this->width;
  }

  public function setWidth(float $width): Stripe
  {
    $this->width = $width;

    return $this;
  }
  
  public function getPosition(): float
  {
    return $this->position;
  }

  public function setPosition(float $position): Stripe
  {
    $this->position = $position;

    return $this;
  }

  public function __toString(): string
  {
    return sprintf('rgb(%d, %d, %d) %.0f%%', $this->color->getRed(), $this->color->getGreen(), $this->color->getBlue(), $this->position);
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
