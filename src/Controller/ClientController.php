<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="client")
 */
class ClientController extends AbstractController
{
    /**
     * Create new client
     * @Route("/client", name="_create", methods="POST")
     */
    public function create(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $client = new Client();
        $client->setName($request->get('name', 'asdasd '));
        $client->setDocument($request->get('document', '0'));

        $entityManager->persist($client);
        $entityManager->flush();
        return new Response('Saved new client with id '.$client->getId());
    }

     /**
     * Update client
     * @Route("/client", name="_update", methods="PUT")
     */
    public function update(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $client = new Client();
        $client->setName($request->get('name', 'asdasd '));
        $client->setDocument($request->get('document', '0'));

        $entityManager->persist($client);
        $entityManager->flush();
        return new Response('Saved new client with id '.$client->getId());
    }

    /**
     * List clients
     * @Route("/client", name="_index", methods="GET")
     */
    public function index(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        return $this->json([
            'teste' => 'test'
        ]);
    }
}
