<?php

namespace RobAir\SyliusCalendarPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @ORM\Entity(repositoryClass="RobAir\SyliusCalendarPlugin\Repository\CalendarRepository")
 * @ORM\Table (name="robair_calendar_calendar")
 */
class Calendar implements ResourceInterface
{

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->color = '#FFFFFF';
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @var Booking[]|ArrayCollection
     * @ORM\OneToMany (targetEntity="RobAir\SyliusCalendarPlugin\Entity\Booking", mappedBy="calendar")
     * @ORM\OrderBy ({"beginAt":"ASC"})
     */
    private $bookings;

    /**
     * @var string
     * @ORM\Column (type="string", length=7, options={"default":"#FFFFFF"})
     */
    private $color;

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return ArrayCollection|Booking[]
     */
    public function getBookings()
    {
        return $this->bookings;
    }

    /**
     * @param ArrayCollection|Booking[] $bookings
     */
    public function setBookings($bookings): void
    {
        $this->bookings = $bookings;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function __toString()
    {

        return $this->getTitle();
    }
}
