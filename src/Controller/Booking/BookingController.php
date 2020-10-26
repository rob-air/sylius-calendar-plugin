<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Controller\Booking;

use RobAir\SyliusCalendarPlugin\Entity\Booking\Booking;
//use RobAir\SyliusCalendarPlugin\Form\BookingType;
use RobAir\SyliusCalendarPlugin\Repository\BookingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BookingController extends AbstractController
{

    public function calendar(): Response
    {
        return $this->render('@RobAirSyliusCalendarPlugin/booking/calendar.html.twig');
    }

}
