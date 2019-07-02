<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter;

use Maltehuebner\WarmingStripesCss\Converter\Stripe\Stripe;
use Maltehuebner\WarmingStripesCss\Converter\Stripe\StripeList;

class PositionCalculator
{
    private function __construct()
    {

    }

    public static function calculate(StripeList $stripeList): StripeList
    {
        $position = 0;

        /** @var Stripe $stripe */
        foreach ($stripeList->getList() as $stripe) {
            $width = $stripe->getWidth();

            $stripe->setWidth($width)->setPosition($position);

            $position += $width;
        }

        return $stripeList;
    }
}