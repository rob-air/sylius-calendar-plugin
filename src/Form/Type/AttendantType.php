<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Type;


use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class AttendantType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'sylius.ui.name'
            ])
            ->add('defaultCalendar', EntityType::class, [
                'label' => 'rob_air_sylius_calendar_plugin.ui.default_calendar',
                'class' => 'RobAir\SyliusCalendarPlugin\Entity\Calendar',
                'choice_label' => 'title',
                'choice_value' => 'id'
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'rob_air_sylius_calendar_attendant';
    }

}
