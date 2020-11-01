<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Entity;

use Sylius\Component\Core\Model\ProductInterface as BaseProductInterface;

interface ProductInterface extends BookingProductAwareInterface, BaseProductInterface
{
}
