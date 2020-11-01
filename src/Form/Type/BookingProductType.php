<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Type;

use RobAir\SyliusCalendarPlugin\Entity\Booking;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

final class BookingProductType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', EntityType::class, [
                'label' => 'rob_air_sylius_calendar_plugin.ui.booking',
                'class' => 'RobAir\SyliusCalendarPlugin\Entity\Booking',
                'choice_label' => 'title',
                'choice_value' => 'id'
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'rob_air_sylius_calendar_plugin.booking';
    }
}
