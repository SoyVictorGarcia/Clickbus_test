<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CoinExchangeType;
use App\Entity\Operation;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DBALException;
use App\Repository\OperationRepository;
use Knp\Component\Pager\PaginatorInterface;

class ApiController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function coins(): Response
    {
        $form = $this->createForm(CoinExchangeType::class,null);

        return $this->render("exchange.html.twig",[
            "formulario" => $form->createView(),
            "coins" => ["MXN","ERN","DZD","CDF","MAD","SYP"]
        ]);
    }

    /**
     * @Route("/operation", name="registerOperation", methods={"POST"})
     */
    public function registerOperation(Request $request, EntityManagerInterface $em): Response
    {
        $data = json_decode($request->getContent(), true);

        $operation = new Operation();
        $operation->setAmount($data["amount"]);
        $operation->setFromCurrency($data["from_currency"]);
        $operation->setToCurrency($data["to_currency"]);
        $operation->setConvertedValue($data["converted_value"]);
        $operation->setCreatedAt(new \DateTime());
        $operation->setUpdatedAt(new \DateTime());
        $operation->setOperationUuid($data["uuid"]);

        $message = ["message" => "save sucessfully"];
        $code = 200;

        try {
            $em->persist($operation);
            $em->flush();
        } catch (DBALException $e) {
            $message = ["message" => $e->getMessage()];
            $code = 400;
        }

        $response = new Response();
        $response->setContent(json_encode($message));
        $response->setStatusCode($code);

        return $response;
    }

    /**
     * @Route("/operations", name="operations", methods={"GET"})
     */
    public function getOperations(Request $request, PaginatorInterface $paginator) {
        $operations = $this->getDoctrine()->getRepository(Operation::class)->findAllQuery();
        $pagination = $paginator->paginate(
            $operations, 
            $request->query->getInt('page', 1),
            6
        );

        return $this->render("operations.html.twig",[
            "pagination" => $pagination
        ]);  
    }
}
