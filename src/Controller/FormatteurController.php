<?php

namespace App\Controller;

use App\Entity\Formateur;
use App\Form\FormateurType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FormateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/formatteur')]
class FormatteurController extends AbstractController
{
    #[Route('/', name: 'app_formatteur_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $formatteurs = $entityManager
            ->getRepository(Formateur::class)
            ->findAll();

        return $this->render('formatteur/index.html.twig', [
            'formatteurs' => $formatteurs,
        ]);
    }

    
    #[Route('/stats', name: 'app_stat', methods: ['GET'])]
public function statistics(FormateurRepository $FormateurRepository)
{
    $repository = $this->getDoctrine()->getRepository(Formateur::class);

    $data = $repository->createQueryBuilder('r')
        ->select('r.specialite')
        ->addSelect('COUNT(r.id) as totalSpecialite')
        ->addSelect('SUM(CASE WHEN r.specialite = :montageVideo THEN 1 ELSE 0 END) as montageVideoCount')
        ->addSelect('SUM(CASE WHEN r.specialite = :DevelopementInformatique THEN 1 ELSE 0 END) as DevelopementCount')
        ->addSelect('SUM(CASE WHEN r.specialite = :EconomieGestion THEN 1 ELSE 0 END) as ecoCount')
        ->addSelect('SUM(CASE WHEN r.specialite = :GraphicDesign THEN 1 ELSE 0 END) as designCount')
        // ->addSelect('SUM(CASE WHEN r.specialite = :Mathematique THEN 1 ELSE 0 END) as mathCount')
        ->addSelect('SUM(CASE WHEN r.specialite = :RessorceHumaine THEN 1 ELSE 0 END) as mathCount')
        ->setParameter('montageVideo', 'Montage Video')
        ->setParameter('DevelopementInformatique', 'Developement Informatique')
        ->setParameter('EconomieGestion', 'Economie Gestion')
        ->setParameter('GraphicDesign', 'Graphic Design')
        // ->setParameter('Mathematique', 'Mathematique')
        ->setParameter('RessorceHumaine', 'Ressorce Humaine')
        ->groupBy('r.specialite')
        ->getQuery()
        ->getResult();

    return $this->render('formatteur/chart.html.twig', [
        'data' => $data,
    ]);
}

    

    #[Route('/new', name: 'app_formatteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formatteur = new Formateur();
        $form = $this->createForm(FormateurType::class, $formatteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formatteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_formatteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('formatteur/new.html.twig', [
            'formatteur' => $formatteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_formatteur_show', methods: ['GET'])]
    public function show(Formateur $formatteur): Response
    {
        return $this->render('formatteur/show.html.twig', [
            'formatteur' => $formatteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_formatteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Formateur $formatteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormateurType::class, $formatteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_formatteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('formatteur/edit.html.twig', [
            'formatteur' => $formatteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_formatteur_delete', methods: ['POST'])]
    public function delete(Request $request, Formateur $formatteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formatteur->getIdFormatteur(), $request->request->get('_token'))) {
            $entityManager->remove($formatteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_formatteur_index', [], Response::HTTP_SEE_OTHER);
    }

   
}
