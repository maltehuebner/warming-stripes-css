<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter\Image;

class ImageFactory
{
    private function __construct()
    {

    }

    public static function createFromFile(string $filename): Image
    {
        $image = imagecreatefrompng($filename);

        $image = imagescale($image, 100);

        return new Image($image);
    }

    public static function destroy(Image $image): void
    {
        imagedestroy($image->getImage());
    }
}