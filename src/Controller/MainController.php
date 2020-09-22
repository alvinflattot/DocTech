<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ListerFichiers;
use App\Service\RandomMD5Hash;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(RandomMD5Hash $random, ListerFichiers $listerFichiers)
    {

        $arbo = $listerFichiers->lister('C:\wamp64\www\InterstisExemple');
        
        // C:\wamp64\www\InterstisExemple
        
        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
            'arbo' => $arbo,
        ]);
    }

    /**
     * @Route("/parse", name="parse")
     */
    public function parseDossier(ListerFichiers $listerFichiers)
    {

        dump($listerFichiers->MultiplierPar3(3));
            
        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
        ]);

        
    }
}
