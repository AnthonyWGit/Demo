<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/entreprise/new', name: 'new_entreprise')]
    public function new(Request $request) : Response 
    {
        $entreprise = new Entreprise();

        $form = $this->createForm(EntrepriseType::class, $entreprise);
        return $this->render('entreprise/new.html.twig', [
            'formAddEntreprise' => $form
        ]);
    }

    #[Route('/entreprise/{id}', name: 'display_app_entreprise')]
    public function display(Entreprise $entreprise) : Response 
    {
        return $this->render('entreprise/display.html.twig', [
            'entreprise' => $entreprise
        ]);
    }

}
