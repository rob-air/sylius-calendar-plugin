<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Extension;

use RobAir\SyliusCalendarPlugin\Form\Type\CalendarType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

final class BookingTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('calendar', CalendarType::class, [
                'label' => false,
                'constraints' => [new Valid()],
            ])
        ;
    }

    public function getExtendedTypes(): array
    {
        return [CalendarType::class];
    }
}
