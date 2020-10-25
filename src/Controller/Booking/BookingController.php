<?php

namespace RobAir\SyliusCalendarPlugin\Controller\Booking;

use App\Entity\Booking\Booking;
use RobAir\SyliusCalendarPlugin\Form\BookingType;
use App\Repository\BookingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/booking")
 */
class BookingController extends AbstractController
{
    // ...

    /**
     * @Route("/calendar", name="booking_calendar", methods={"GET"})
     */
    public function calendar(): Response
    {
        return $this->render('booking/calendar.html.twig');
    }

}
