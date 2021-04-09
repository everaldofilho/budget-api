<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

/**
 * @Route("/api", name="client")
 * @OA\Tag(name="Clients")
 */
class ClientController extends AbstractController
{
    /**
     * Create new client
     * @Route("/client", name="_create", methods="POST")
     * @OA\Response(
     *     response=201,
     *     description="ok",
     *     @Model(type=Client::class)
     * )
     */
    public function create(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $client = new Client();
        $client->setName($request->get('name', 'asdasd '));
        $client->setDocument($request->get('document', '0'));

        $entityManager->persist($client);
        $entityManager->flush();
        return new Response('Saved new client with id ' . $client->getId());
    }

    /**
     * Update client
     * @Route("/client", name="_update", methods="PUT")
     * @OA\Response(
     *     response=200,
     *     description="ok",
     *     @Model(type=Client::class)
     * )
     */
    public function update(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $client = new Client();
        $client->setName($request->get('name', 'asdasd '));
        $client->setDocument($request->get('document', '0'));

        $entityManager->persist($client);
        $entityManager->flush();
        return new Response('Saved new client with id ' . $client->getId());
    }

    /**
     * List clients
     * @Route("/client", name="_index", methods="GET")
     * 
     * @OA\Response(
     *     response=200,
     *     description="ok",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Client::class))
     *     )
     * )
     */
    public function index(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        return $this->json([
            'teste' => 'test'
        ]);
    }
}
