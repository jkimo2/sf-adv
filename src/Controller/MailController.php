<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


class MailController extends AbstractController
{
    /**
     * @Route("/mail", name="mail_index")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createFormBuilder(null,['attr'=>['novalidate' => 'novalidate']])
            ->add('name', TextType::class,['attr'=>['class' => 'form-control my-3']] )
            ->add('email', TextType::class,['attr'=>['class' => 'form-control my-3']] )
            ->add('message', TextareaType::class,['attr'=>['class' => 'form-control my-3']] )
            ->add('submit', SubmitType::class,['attr'=>['class' => 'btn btn-outline-primary']] )
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $data = $form->getData();

            //$txt = $this->renderView('mail\contact.txt.twig',$data);

            $message = (new \Swift_Message('Example d\'email'))
                ->setFrom('alesluye@gmail.com', 'alesluye@dawan.fr')
                ->setTo('lesluye@hotmail.com')
                ->setReplyTo('alesluye@dawan.fr')
                ->setBody($this->renderView('mail\contact.txt.twig',$data))
            ;


            $mailer->send($message);

            return $this->redirectToRoute('mail_index');
        }

        return $this->render('mail/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/mailer", name="mail_mailer")
     */
    public function mailer(Request $request, MailerInterface $mailer)
    {
        $data= ['name' => 'jojo', 'e_mail'=> 'jojo@truc.com','message' => 'coucou contacter moi rapidement'];

        $form = $this->createFormBuilder($data,['attr'=>['novalidate' => 'novalidate']])
            ->add('name', TextType::class,['attr'=>['class' => 'form-control my-3']] )
            ->add('e_mail', TextType::class,['attr'=>['class' => 'form-control my-3']] )
            ->add('message', TextareaType::class,['attr'=>['class' => 'form-control my-3']] )
            ->add('submit', SubmitType::class,['attr'=>['class' => 'btn btn-outline-primary']] )
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $data = $form->getData();

            //$txt = $this->renderView('mail\contact.txt.twig',$data);

          /*  $message = (new Email())
                ->From('lesluye@gmail.com')
                ->To('alesluye@dawan.fr')
                ->ReplyTo('lesluye@gmail.com')
                ->Subject('Objet de Mailer')
                ->html("<p>Coucou component</p>")
            ;*/
            $message = (new TemplatedEmail())
                ->From('lesluye@gmail.com')
                ->To('alesluye@dawan.fr')
                ->ReplyTo('lesluye@gmail.com')
                ->Subject('Objet de Mailer')
                ->htmlTemplate('mail/contact.html.twig')
                ->attachFromPath($this->getParameter('kernel.project_dir').'/public/document/ajax1.pdf')
               // ->embedFromPath($this->getParameter('kernel.project_dir').'/public/images/hk.jpg','hk-img')
                ->context($data);

            $mailer->send($message);

            return $this->redirectToRoute('mail_mailer');
        }

        return $this->render('mail/mailer.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
