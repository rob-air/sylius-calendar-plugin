<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Factory;

use RobAir\SyliusCalendarPlugin\Entity\ProductInterface;
use RobAir\SyliusCalendarPlugin\Entity\BookingProductInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface as DecoratedProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface as BaseProductInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductFactory implements ProductFactoryInterface
{
    /** @var DecoratedProductFactoryInterface */
    private $decoratedFactory;

    /** @var FactoryInterface */
    private $bookingFactory;

    public function __construct(DecoratedProductFactoryInterface $decoratedFactory, FactoryInterface $bookingFactory)
    {
        $this->decoratedFactory = $decoratedFactory;
        $this->bookingFactory = $bookingFactory;
    }

    public function createWithVariantAndBooking(): BaseProductInterface
    {
        /** @var BookingProductInterface $booking */
        $booking = $this->bookingFactory->createNew();

        /** @var ProductInterface $product */
        $product = $this->createWithVariant();

        $booking->setProduct($product);

        $product->setBooking($booking);

//        dd($product);
        return $product;
    }

    public function createNew(): BaseProductInterface
    {
        /** @var BaseProductInterface $product */
        $product = $this->decoratedFactory->createNew();

        return $product;
    }

    public function createWithVariant(): BaseProductInterface
    {
        return $this->decoratedFactory->createWithVariant();
    }
}
