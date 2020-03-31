<?php

namespace App\Form;

use App\Entity\Post;
use App\Form\Transformer\TagModelTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    private $tagsTransformer;

    public function __construct(TagModelTransformer $tagModelTransformer)
    {
        $this->tagsTransformer = $tagModelTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('body')
            ->add('tags',TextType::class)
            ->add('file',CustomFileType::class, [
                'attr' => ['class' => ''],
                'placeholder' => 'Choisir une jolie image',
                'directory' => Post::IMAGE_DIRECTORY
            ])
        ;
        $builder->get('tags')->addModelTransformer($this->tagsTransformer);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
            'required' => false,
        ]);
    }
}
