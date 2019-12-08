<?php

namespace App\Controller;
use App\Entity\These;
use App\Entity\Ecole;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ThesisController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $entityManager = $this -> getDoctrine()->getManager();
        $EcoleRepository = $entityManager->getRepository(Ecole::class);
        $ecoles = $EcoleRepository->findAll();


        if(empty($ecoles)) {
            $ecole1 = new Ecole();
            $ecole1->setNom('Montpellier');
            $ecole1->setLien('https://www.umontpellier.fr/');
            $entityManager->persist($ecole1);

            $ecole2 = new Ecole();
            $ecole2->setNom('Paris saclay');
            $ecole2->setLien('https://www.universite-paris-saclay.fr/fr');
            $entityManager->persist($ecole2);

            $these1 = new these();
            $these1->setTitle('Titre: Sujet1');
            $these1->setDescription('"Desription"');
            $these1->setPhraseAccroche('Phrase d accroche');
            $these1->setMail('aaaa@gmail.com');
            $these1->setEcole($ecole1);
            $entityManager->persist($these1);

            $these2 = new these();
            $these2->setTitle('Titre: Sujet 2');
            $these2->setDescription('"Desciption "');
            $these2->setPhraseAccroche('“Phrase d accroche"');
            $these2->setMail('aaaaa2@gmail.com');
            $these2->setEcole($ecole2);
            $entityManager->persist($these2);

            $these3 = new these();
            $these3->setTitle('Titre: Sujet3');
            $these3->setDescription('"Description"');
            $these3->setPhraseAccroche('" Phrase d accroche"');
            $these3->setMail('aaaaa3@gmail.com');
            $these3->setEcole($ecole1);
            $entityManager->persist($these3);

            $these4 = new these();
            $these4->setTitle('Titre: Sujet 4');
            $these4->setDescription('" Description "');
            $these4->setPhraseAccroche('" Phrase d accroche "');
            $these4->setMail('aaaa4@gmail.com');
            $these4->setEcole($ecole2);
            $entityManager->persist($these4);

            $entityManager->flush();
        }

        return $this->render('thesis/thesis.html.twig', [
            'ecoles' => $EcoleRepository->findAll(),
        ]);
    }

}