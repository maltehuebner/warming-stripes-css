<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter;

class Color
{
    /** @var int $red */
    protected $red;

    /** @var int $green */
    protected $green;

    /** @var int $blue */
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