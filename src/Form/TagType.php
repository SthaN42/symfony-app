<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Tag;
use App\Entity\Video;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('videos', EntityType::class, [
                'class' => Video::class,
                'choice_label' => 'title',
                'multiple' => true,
            ])
            ->add('articles', EntityType::class, [
                'class' => Article::class,
                'choice_label' => 'title',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tag::class,
        ]);
    }
}
