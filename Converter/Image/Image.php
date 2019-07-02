<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter\Image;

class Image
{
    protected $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }
}