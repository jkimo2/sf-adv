<?php

namespace App\Controller;

use App\Service\Useless;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/event/{info}", name="event_index", defaults={"info" : "Rien de rien"})
     */
    public function index(Request $request,$info, $default_user, $_method, $_method2, $_reroute)
    {
        dump($request->attributes);

        //dump("_method = ".$_method);
       // dump("_method2 = ". $_method2);

        //$v = (isset($var)) ? $var: 'toto'
        //$v = $var ?? 'toto      //depuis php7
        return $this->render('event/index.html.twig', [
            'user' => $this->getUser() ?? $default_user,
        ]);
    }

    /**
     * @route("/event-own", name="event_own")
     */
    public function myOwnEvent(Useless $useless)
    {
        return $this->render('event/own.html.twig',[
            'value' => $useless->nothing('Lady gaga')
        ]);
    }
}
