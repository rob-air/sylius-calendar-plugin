<?php

namespace RobAir\SyliusCalendarPlugin\EventSubscriber;

use RobAir\SyliusCalendarPlugin\Repository\BookingRepository;
use CalendarBundle\CalendarEvents;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CalendarSubscriber implements EventSubscriberInterface
{
    private $bookingRepository;
    private $router;

    public function __construct(
        BookingRepository $bookingRepository,
        UrlGeneratorInterface $router
    ) {
        $this->bookingRepository = $bookingRepository;
        $this->router = $router;
    }

    public static function getSubscribedEvents()
    {
        return [
            CalendarEvents::SET_DATA => 'onCalendarSetData',
        ];
    }

    public function onCalendarSetData(CalendarEvent $calendar)
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();

        // Change booking.beginAt by your start date property
        $queryBuilder = $this->bookingRepository
            ->createQueryBuilder('booking')
            ->where('booking.beginAt BETWEEN :start and :end OR booking.endAt BETWEEN :start and :end')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('end', $end->format('Y-m-d H:i:s'));

        if (array_key_exists('calendar', $filters) && $filters['calendar']!='all') {
            $queryBuilder
                ->andWhere('booking.calendar = :calendar_id')
                ->setParameter('calendar_id', intval($filters['calendar']));
        }

        $bookings = $queryBuilder
            ->getQuery()
            ->getResult()
        ;

        foreach ($bookings as $booking) {
            // this create the events with your data (here booking data) to fill calendar
            $bookingEvent = new Event(
                $booking->getTitle(),
                $booking->getBeginAt(),
                $booking->getEndAt() // If the end date is null or not defined, a all day event is created.
            );

            /*
             * Add custom options to events
             *
             * For more information see: https://fullcalendar.io/docs/event-object
             * and: https://github.com/fullcalendar/fullcalendar/blob/master/src/core/options.ts
             */

            $bookingEvent->setOptions([
                'backgroundColor' => $booking->getCalendar()->getColor(),
                'borderColor' => $booking->getCalendar()->getColor(),
                'calendarId' => $booking->getCalendar()->getId(),
                'bookingId' => $booking->getId(),
                'url' => $this->router->generate('rob_air_sylius_calendar_shop_booking_show', [
                    'id' => $booking->getId(),
                ])
            ]);

            // finally, add the event to the CalendarEvent to fill the calendar
            $calendar->addEvent($bookingEvent);
        }
    }
}
