<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Form\Extension;

use RobAir\SyliusCalendarPlugin\Form\Type\BookingProductType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('booking', BookingProductType::class, [
                'label' => true,
                'constraints' => [new Valid()],
            ])
        ;
    }

    public function getExtendedTypes(): array
    {
        return [ProductType::class];
    }
}
