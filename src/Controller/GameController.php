<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('game/index.html.twig', []);
    }

    /**
     * @Route("/game", name="game")
     */
    public function game()
    {
        return $this->render('game/game.html.twig', []);
    }

}
