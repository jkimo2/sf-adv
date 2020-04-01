<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpClientController extends AbstractController
{
    /**
     * @Route("/http", name="httpclient_index")
     */
    public function index(HttpClientInterface $client)
    {
        //dump($client);
        $users = [];

        //HttpClient::create()  //déconseillé
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users');

        if(200 === $response->getStatusCode()){
           // $users = json_decode($response->getContent());
            $users = $response->toArray();
        }
        return $this->render('http_client/index.html.twig', [
            'users' => $users
        ]);
    }
}
