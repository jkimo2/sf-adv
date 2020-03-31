<?php


namespace App\Form;


use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomFileType extends AbstractType
{
    //Défini les options et leur valeur qui seront transmises à la vue.
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['show_image'] = $options['show_image'];
        $view->vars['image_target'] = $options['image_target'];
        $view->vars['placeholder'] = $options['placeholder'];
        $view->vars['directory'] = $options['directory'];
    }

    public function getParent(){
        return FileType::class;
    }

    //Défini les options de notre Custom form
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(['placeholder','show_image', 'image_target']);  //on ajoute les nom options custom que l'on souhaite
        $resolver->setRequired('directory'); //si on ne met pas directory on aura une erreur

        $resolver->setAllowedTypes('placeholder', 'string');
        $resolver->setAllowedTypes('show_image', 'bool');
        $resolver->setAllowedTypes('image_target', 'bool');
        $resolver->setAllowedTypes('directory', 'string');

        $resolver->setDefaults([
            'placeholder' => 'Choisir un fichier',
            'show_image' => true,
            'image_target' => true,
        ]);
    }

}