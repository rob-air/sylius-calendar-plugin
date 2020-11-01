<?php

namespace RobAir\SyliusCalendarPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="RobAir\SyliusCalendarPlugin\Repository\BookingRepository")
 * @ORM\Table (name="robair_calendar_booking")
 * @ORM\HasLifecycleCallbacks()
 */
class Booking implements BookingProductInterface
{

    use TimestampableTrait;

    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    protected $id;

    /** @var ProductInterface
     * @ORM\OneToOne (targetEntity="Sylius\Component\Product\Model\ProductInterface", inversedBy="booking")
     * @ORM\JoinColumn (name="product_id", referencedColumnName="id")
     */
    protected $product;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $beginAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $endAt = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $title;

    /**
     * @var bool
     */
    protected $isBookingProduct = false;

    /**
     * @var Calendar
     * @ORM\ManyToOne (targetEntity="RobAir\SyliusCalendarPlugin\Entity\Calendar", inversedBy="bookings")
     * @ORM\JoinColumn (name="calendar_id", referencedColumnName="id")
     */
    protected $calendar;

    /**
     * @var Attendant[]|ArrayCollection
     * @ORM\ManyToMany (targetEntity="RobAir\SyliusCalendarPlugin\Entity\Attendant", inversedBy="bookings")
     * @ORM\JoinTable (name="robair_calendar__bookings_attendants",
     *      joinColumns={@ORM\JoinColumn(name="booking_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="attendant_id", referencedColumnName="id")}
     * )
     */
    protected $attendants;

    /**
     * @var integer
     * @ORM\Column (type="smallint", nullable=false, options={"default"="10"})
     */
    protected $maxAttendees;

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

    public function getProduct(): ?ProductInterface
    {
        return $this->product;
    }

    public function setProduct(?ProductInterface $product): void
    {
        $this->product = $product;
    }

    public function isBookingProduct(): bool
    {
        return $this->isBookingProduct;
    }

    public function setIsBookingProduct(bool $isBookingProduct): void
    {
        $this->isBookingProduct = $isBookingProduct;
    }

    /**
     * @return int
     */
    public function getMaxAttendees(): int
    {
        return $this->maxAttendees;
    }

    /**
     * @param int $maxAttendees
     */
    public function setMaxAttendees(int $maxAttendees): void
    {
        $this->maxAttendees = $maxAttendees;
    }

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
