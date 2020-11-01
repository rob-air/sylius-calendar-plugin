<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Type;

use RobAir\SyliusCalendarPlugin\Entity\Booking;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

final class BookingProductType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isBookingProduct', CheckboxType::class, [
                'label' => 'rob_air_sylius_calendar_plugin.ui.booking',
            ])
            ->add('Booking', BookingType::class, [
//                'entry_type' => ProductBundleItemType::class,
//                'entry_options' => ['label' => false],
//                'allow_add' => true,
//                'allow_delete' => true,
//                'by_reference' => false,
//                'label' => false,
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'rob_air_sylius_calendar_plugin.booking';
    }
}
