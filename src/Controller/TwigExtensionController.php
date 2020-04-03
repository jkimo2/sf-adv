<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TwigExtensionController extends AbstractController
{
    /**
     * @Route("/twigextension", name="twigextension_index")
     */
    public function index()
    {
        return $this->render('twig_extension/index.html.twig', [
        ]);
    }
}
