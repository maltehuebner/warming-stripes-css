<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter\Stripe;

class StripeList
{
    /** @var array $list */
    protected $list = [];

    public function add(Stripe $stripe): StripeList
    {
        $this->list[] = $stripe;

        return $this;
    }

    public function getList(): array
    {
        return $this->list;
    }
}