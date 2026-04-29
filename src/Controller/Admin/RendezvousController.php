<?php

namespace App\Controller\Admin;

use App\Entity\Rendezvous;
use App\Repository\RendezvousRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/rendezvous')]
#[IsGranted('ROLE_ADMIN')]
class RendezvousController extends AbstractController
{
    #[Route('', name: 'app_admin_rendezvous_index', methods: ['GET'])]
    public function index(RendezvousRepository $repo): Response
    {
        return $this->render('admin/rendezvous/index.html.twig', [
            'rendezvous' => $repo->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_admin_rendezvous_show', methods: ['GET'])]
    public function show(Rendezvous $rendezvous): Response
    {
        return $this->render('admin/rendezvous/show.html.twig', [
            'rendezvous' => $rendezvous,
        ]);
    }
}
