<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WebpackController extends AbstractController
{
    /**
     * @Route("/webpack", name="webpack_index")
     */
    public function index()
    {
        return $this->render('webpack/index.html.twig', [
            'controller_name' => 'WebpackController',
        ]);
    }
}
