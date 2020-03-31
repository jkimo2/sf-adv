<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Service\FileManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/post", name="form_index")
     */
    public function index(PostRepository $rep)
    {
        $posts = $rep->findAll();

        return $this->render('form/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @route("/post/add",name="form_add")
     */
    public function add(Request $request, FileManager $fm)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($post->getFile() instanceof  UploadedFile){
                $name=$fm->setDirectory(Post::IMAGE_DIRECTORY)->uploadFile($post->getFile());

                $post->setImage($name);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('form_index');
        }

        return $this->render('form/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     *
     * @route("/post/edit/{id}", name="form_edit")
     */
    public function edit(Request $request, Post $post, FileManager $fm)
    {
        if (null !== $post->getImage()){
            $post->setFile(new File(Post::IMAGE_DIRECTORY.$post->getImage()));
        }
        dump($post);

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if($post->getFile() instanceof  UploadedFile){
                $name=$fm->setDirectory(Post::IMAGE_DIRECTORY)
                    ->setOldImageName($post->getImage())
                    ->uploadFile($post->getFile());

                $post->setImage($name);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('form_edit',['id' => $post->getId()]);
        }

        return $this->render('form/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
