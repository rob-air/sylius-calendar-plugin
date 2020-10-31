<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Type;


use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class BookingType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('beginAt', DateTimeType::class, [
                'label' => 'sylius.ui.begins_at',
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
            ])
            ->add('endAt', DateTimeType::class, [
                'label' => 'sylius.ui.ends_at',
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
            ])
            ->add('title', TextType::class, [
                'label' => 'sylius.ui.title'
            ])
            ->add('maxAttendees', IntegerType::class, [
                'label' => 'rob_air_sylius_calendar_plugin.ui.max_attendees'
            ])
            ->add('calendar', EntityType::class, [
                'label' => 'rob_air_sylius_calendar_plugin.ui.calendar',
                'class' => 'RobAir\SyliusCalendarPlugin\Entity\Calendar',
                'choice_label' => 'title',
                'choice_value' => 'id'
            ])
            ->add('attendants', EntityType::class, [
                'label' => 'Attendants',
                'class' => 'RobAir\SyliusCalendarPlugin\Entity\Attendant',
                'choice_label' => 'name',
                'choice_value' => 'id',
                'multiple' => 'true'
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'rob_air_sylius_calendar_booking';
    }

}
