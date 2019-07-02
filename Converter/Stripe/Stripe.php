<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter\Stripe;

use Maltehuebner\WarmingStripesCss\Converter\Image\Color;

class Stripe
{
    /** @var Color $color */
    protected $color;

    /** @var float $width */
    protected $width;

    /** @var float $position */
    protected $position;

    public function __construct(Color $color, float $width)
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
