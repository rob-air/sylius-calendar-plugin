<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Extension;

use BitBag\SyliusProductBundlePlugin\Entity\ProductInterface;
use BitBag\SyliusProductBundlePlugin\Form\Type\ProductBundleType;
use RobAir\SyliusCalendarPlugin\Form\Type\BookingType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

final class CalendarTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('bookings', BookingType::class, [
                'label' => false,
                'constraints' => [new Valid()],
            ])
        ;
    }

    public function getExtendedTypes(): array
    {
        return [BookingType::class];
    }
}
