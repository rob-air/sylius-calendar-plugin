<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Entity;

trait BookingProductAwareTrait
{
    /**
     * @var BookingProductInterface;
     */
    protected $booking;

    /**
     * @var bool
     */
    protected $isBookingProduct = false;

    public function setBooking(BookingProductInterface $booking): void
    {
        $this->booking = $booking;
        $this->setIsBookingProduct(true);
    }

    public function getBooking(): BookingProductInterface
    {
        return $this->booking;
    }

    public function isBookingProduct(): bool
    {
        return $this->isBookingProduct;
    }

    public function setIsBookingProduct(bool $isBookingProduct): void
    {
        $this->isBookingProduct = $isBookingProduct;
    }

}
