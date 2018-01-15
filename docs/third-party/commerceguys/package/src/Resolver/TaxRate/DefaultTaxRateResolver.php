<?php

namespace CommerceGuys\Tax\Resolver\TaxRate;

use CommerceGuys\Tax\Resolver\Context;
use CommerceGuys\Tax\TaxableInterface;
use CommerceGuys\Tax\Model\TaxTypeInterface;

/**
 * Default tax rate resolver.
 *
 * Returns the first found default rate.
 */
class DefaultTaxRateResolver implements TaxRateResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function resolve(TaxTypeInterface $taxType, TaxableInterface $taxable, Context $context)
    {
        foreach ($taxType->getRates() as $rate) {
            if ($rate->isDefault()) {
                return $rate;
            }
        }
    }
}
