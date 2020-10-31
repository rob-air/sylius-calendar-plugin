<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class CalendarType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'sylius.ui.title'
            ])
            ->add('color', ColorType::class, [
                'label' => 'sylius.ui.color'
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'rob_air_sylius_calendar.calendar';
    }
}
