<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Type;

use Sonata\Form\Type\DateTimePickerType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\DefaultResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceToIdentifierType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
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
            ->add('calendar', EntityType::class, [
                'label' => 'Calendar',
                'class' => 'RobAir\SyliusCalendarPlugin\Entity\Calendar',
                'choice_label' => 'title',
                'choice_value' => 'id'
            ])

        ;
    }

    public function getBlockPrefix(): string
    {
        return 'rob_air_sylius_calendar_booking';
    }
}
