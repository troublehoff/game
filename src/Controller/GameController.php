<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Player;
use App\Form\NewGameFormType;
use App\Game\Data\NewGame;
use App\Game\GameService;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Serializer\SerializerInterface;

class GameController extends AbstractController
{
    // make a change
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, GameService $gameService)
    {

        $newGameData = new NewGame();
        $newGameData->setPlayerOneName('Player One');

        $form = $this->createForm(NewGameFormType::class, $newGameData);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $newGame = $gameService->createNewGame($newGameData);

            return $this->redirectToRoute('game', [
                'guid' => $newGame->getPlayers()[0]->getGuid()
            ]);
        }

        return $this->render('game/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/game/list", name="game_list")
     */
    public function gameList(GameRepository $gameRepository, SerializerInterface $serializer)
    {
        $activeGames = $gameRepository->findBy(
            ['active' => true],
            ['created' => 'DESC']
        );

        return new JsonResponse(
            $serializer->serialize($activeGames, 'json',  ['groups' => 'games_list']),
            200,
            [],
            true);
    }

    /**
     * @Route("/game/{guid}", name="game")
     */
    public function game(Player $player)
    {
        $game = $player->getGame();

        return $this->render('game/game.html.twig', [
            'game' => $game,
            'player' => $player
        ]);
    }



}
