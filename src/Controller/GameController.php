<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\NewGameFormType;
use App\Game\GameService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, GameService $gameService)
    {

        $newGame = new Game();
        $form = $this->createForm(NewGameFormType::class, $newGame);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $gameService->createNewGame($newGame);
            $this->redirectToRoute('game', []);
        }


        return $this->render('game/index.html.twig', []);
    }

    /**
     * @Route("/game/list", name="game_list")
     */
    public function gameList()
    {
        $repo = $this->getDoctrine()->getRepository(Game::class);

        return new JsonResponse([
            ['name' => 'server game', 'created' => new \DateTime('now')]
        ]);

    }

    /**
     * @Route("/game", name="game")
     */
    public function game()
    {
        return $this->render('game/game.html.twig', []);
    }



}
