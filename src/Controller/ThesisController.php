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
            $ecole1->setNom('normandie');
            $ecole1->setLien('http://www.normandie-univ.fr/le-college-des-ecoles-doctorales-ced--541.kjsp');
            $entityManager->persist($ecole1);

            $ecole2 = new Ecole();
            $ecole2->setNom('allphaUniv');
            $ecole2->setLien('https://allpha.univ-tlse2.fr/');
            $entityManager->persist($ecole2);

            $these1 = new these();
            $these1->setTitle('Titre: Origines de Lorem Ipsum');
            $these1->setDescription('"Lorem Ipsum a commencé comme un latin brouillé, absurde dérivé de Cicero du 1er siècle BC texte De Finibus Bonorum et Malorum."');
            $these1->setPhraseAccroche('“Heeeey”, “Ça va ?”, “Quoi de neuf ?” : pourquoi vous ne devriez jamais dire cela');
            $these1->setMail('ipsum@gmail.com');
            $these1->setEcole($ecole1);
            $entityManager->persist($these1);

            $these2 = new these();
            $these2->setTitle('Titre: Lorem Ipsum: usage');
            $these2->setDescription('"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."');
            $these2->setPhraseAccroche('“Parce qu’une phrase d’accroche, c’est un peu comme le début de votre lettre de motivation lorsque vous recherchez un emploi."');
            $these2->setMail('ipsum2@gmail.com');
            $these2->setEcole($ecole2);
            $entityManager->persist($these2);

            $these3 = new these();
            $these3->setTitle('Titre: Lorem Ipsum: common examples');
            $these3->setDescription('"Sed euismod nisi porta lorem mollis aliquam ut. Nulla aliquet enim tortor at auctor urna nunc id. Enim nunc faucibus a pellentesque sit amet. Placerat orci nulla pellentesque dignissim enim. Imperdiet dui accumsan sit amet nulla facilisi morbi. Aliquam ultrices sagittis orci a. A cras semper auctor neque vitae tempus quam. Integer enim neque volutpat ac tincidunt vitae semper. Lorem ipsum dolor sit amet consectetur adipiscing.
 Volutpat diam ut venenatis tellus in. Erat velit scelerisque in dictum non."');
            $these3->setPhraseAccroche('“Arrêtez d’envoyer la même phrase d’accroche à tout le monde"');
            $these3->setMail('ipsum3@gmail.com');
            $these3->setEcole($ecole1);
            $entityManager->persist($these3);

            $these4 = new these();
            $these4->setTitle('Titre: Lorem Ipsum: translation');
            $these4->setDescription('"Lorem Ipsum a commencé comme un latin brouillé, absurde dérivé de Cicero du 1er siècle BC texte De Finibus Bonorum et Malorum."');
            $these4->setPhraseAccroche('“Évitez les phrases d’accroche à rallonge"');
            $these4->setMail('ipsum4@gmail.com');
            $these4->setEcole($ecole2);
            $entityManager->persist($these4);

            $entityManager->flush();
        }

        return $this->render('thesis/thesis.html.twig', [
            'ecoles' => $EcoleRepository->findAll(),
        ]);
    }

}