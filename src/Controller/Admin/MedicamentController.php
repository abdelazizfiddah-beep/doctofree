<?php

namespace App\Controller\Admin;

use App\Entity\Medicament;
use App\Repository\MedicamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/medicament')]
#[IsGranted('ROLE_ADMIN')]
class MedicamentController extends AbstractController
{
    #[Route('', name: 'app_admin_medicament_index', methods: ['GET'])]
    public function index(MedicamentRepository $repo): Response
    {
        return $this->render('admin/medicament/index.html.twig', [
            'medicaments' => $repo->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_admin_medicament_show', methods: ['GET'])]
    public function show(Medicament $medicament): Response
    {
        return $this->render('admin/medicament/show.html.twig', [
            'medicament' => $medicament,
        ]);
    }
}
