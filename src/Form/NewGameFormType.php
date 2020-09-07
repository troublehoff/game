<?php

namespace App\Form;

use App\Entity\Game;
use App\Game\Data\NewGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewGameFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Game Name?',
                'attr' => ['placeholder' => 'A name for your game here...']
            ])
            ->add('passwordProtected', CheckboxType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Password Protected?'
            ])
            ->add('password', TextType::class, ['required' => false])
            ->add('playerOneName', TextType::class, [
                'label' => 'Your Player\'s name?'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewGame::class,
        ]);
    }
}
