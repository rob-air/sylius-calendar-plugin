<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Extension;

use RobAir\SyliusCalendarPlugin\Entity\BookingProductInterface;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        /** @var BookingProductInterface $product */
        $product = $builder->getData();

        if (!$product->hasBooking()) {
            return;
        }

        $builder
            ->add('booking', EntityType::class, [
                'label' => 'rob_air_sylius_calendar_plugin.ui.booking',
                'class' => 'RobAir\SyliusCalendarPlugin\Entity\Booking',
                'choice_label' => 'title',
                'choice_value' => 'id'
            ])
        ;
    }

    public function getExtendedTypes(): array
    {
        return [ProductType::class];
    }
}
