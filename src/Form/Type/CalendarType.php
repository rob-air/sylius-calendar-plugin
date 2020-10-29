<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

final class CalendarType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
//        $builder
//            ->add('booking', ResourceAutocompleteChoiceType::class, [
//                'label' => false,
//                'choice_name' => 'descriptor',
//                'choice_value' => 'id',
//                'resource' => 'rob_air_sylius_calendar.booking',
//            ])
//        ;
    }

    public function getBlockPrefix(): string
    {
        return 'rob_air_sylius_calendar.calendar';
    }
}
