<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Entity;

use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface BookingProductInterface extends ResourceInterface, TimestampableInterface
{
    public function setProduct(?ProductInterface $product): void;

    public function getProduct(): ?ProductInterface;

}
