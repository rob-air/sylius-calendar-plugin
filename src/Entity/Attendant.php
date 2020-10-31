<?php

namespace RobAir\SyliusCalendarPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="RobAir\SyliusCalendarPlugin\Repository\AttendantRepository")
 * @ORM\Table (name="robair_calendar_attendant")
 * @ORM\HasLifecycleCallbacks()
 */
class Attendant implements ResourceInterface, TimestampableInterface
{

    use TimestampableTrait;

    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /** @var \DateTimeInterface|null
     *  @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    /** @var \DateTimeInterface|null
     *  @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var Calendar
     * @ORM\ManyToOne (targetEntity="RobAir\SyliusCalendarPlugin\Entity\Calendar", inversedBy="assignedAttendants")
     * @ORM\JoinColumn (name="default_calendar_id", referencedColumnName="id", nullable=false)
     */
    private $defaultCalendar;

    /**
     * @var Booking[]|ArrayCollection
     * @ORM\ManyToMany (targetEntity="RobAir\SyliusCalendarPlugin\Entity\Booking", mappedBy="attendants")
     */
    private $bookings;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime('now'));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Calendar
     */
    public function getDefaultCalendar(): ?Calendar
    {
        return $this->defaultCalendar;
    }

    /**
     * @param Calendar $calendar
     */
    public function setDefaultCalendar(Calendar $calendar): void
    {
        $this->defaultCalendar = $calendar;
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

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void
    {
        $dateTimeNow = new \DateTime('now');

        $this->setUpdatedAt($dateTimeNow);

        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }
    }
}
