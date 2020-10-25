<?php

namespace RobAir\SyliusCalendarPlugin\Repository;

use RobAir\SyliusCalendarPlugin\Entity\Booking\Booking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booking::class);
    }
}
