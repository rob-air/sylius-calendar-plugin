<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Factory;

use Sylius\Component\Product\Factory\ProductFactoryInterface as BaseProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

interface ProductFactoryInterface extends BaseProductFactoryInterface
{
    public function createWithVariantAndBooking(): ProductInterface;
}
