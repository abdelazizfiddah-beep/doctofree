<?php

namespace App\Controller\Admin;

use App\Entity\Patient;
use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/patient')]
#[IsGranted('ROLE_ADMIN')]
class PatientController extends AbstractController
{
    #[Route('', name: 'app_admin_patient_index', methods: ['GET'])]
    public function index(PatientRepository $repo): Response
    {
        return $this->render('admin/patient/index.html.twig', [
            'patients' => $repo->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_admin_patient_show', methods: ['GET'])]
    public function show(Patient $patient): Response
    {
        return $this->render('admin/patient/show.html.twig', [
            'patient' => $patient,
        ]);
    }
}
