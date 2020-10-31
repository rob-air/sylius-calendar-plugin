<?php

namespace RobAir\SyliusCalendarPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="RobAir\SyliusCalendarPlugin\Repository\BookingRepository")
 * @ORM\Table (name="robair_calendar_booking")
 * @ORM\HasLifecycleCallbacks()
 */
class Booking implements ResourceInterface, TimestampableInterface
{

    use TimestampableTrait;

    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $beginAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endAt = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @var Calendar
     * @ORM\ManyToOne (targetEntity="RobAir\SyliusCalendarPlugin\Entity\Calendar", inversedBy="bookings")
     * @ORM\JoinColumn (name="calendar_id", referencedColumnName="id")
     */
    private $calendar;

    /**
     * @var Attendant[]|ArrayCollection
     * @ORM\ManyToMany (targetEntity="RobAir\SyliusCalendarPlugin\Entity\Attendant", inversedBy="bookings")
     * @ORM\JoinTable (name="robair_calendar__bookings_attendants",
     *      joinColumns={@ORM\JoinColumn(name="booking_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="attendant_id", referencedColumnName="id")}
     * )
     */
    private $attendants;

    /**
     * @return ArrayCollection|Attendant[]
     */
    public function getAttendants()
    {
        return $this->attendants;
    }

    /**
     * @param ArrayCollection|Attendant[] $attendants
     */
    public function setAttendants($attendants): void
    {
        $this->attendants = $attendants;
    }

    /** @var \DateTimeInterface|null
     *  @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    /** @var \DateTimeInterface|null
     *  @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime('now'));
    }

    /**
     * @return Calendar
     */
    public function getCalendar(): ?Calendar
    {
        return $this->calendar;
    }

    /**
     * @param Calendar $calendar
     */
    public function setCalendar(Calendar $calendar): void
    {
        $this->calendar = $calendar;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->beginAt;
    }

    public function setBeginAt(\DateTimeInterface $beginAt): self
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt = null): self
    {
        $this->endAt = $endAt;

        return $this;
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
