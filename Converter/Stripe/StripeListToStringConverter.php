<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter\Stripe;

class StripeListToStringConverter
{
    private function __construct()
    {

    }

    public static function toString(StripeList $stripeList): string
    {
        return join($stripeList->getList(), ', ');
    }
}