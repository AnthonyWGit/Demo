<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    public function index(EntrepriseRepository $entrepriseRepository): Response
    {
        $name = "admin";
        $entreprises = $entrepriseRepository->findBy([], ["raisonSociale" => "DESC"]);
        return $this->render('entreprise/index.html.twig', [
            'name' => $name,
            'entreprises' => $entreprises
        ]);
    }
}
