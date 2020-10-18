<?php


namespace App\Game;


use App\Entity\Game;
use App\Entity\Player;
use App\Game\Data\NewGame;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;

class GameService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    /**
     * @var GameStateFactory
     */
    private GameStateFactory $gameStateFactory;

    /**
     * GameService constructor.
     * @param EntityManagerInterface $em
     * @param GameStateFactory $gameStateFactory
     */
    public function __construct(EntityManagerInterface $em, GameStateFactory $gameStateFactory)
    {
        $this->em = $em;
        $this->gameStateFactory = $gameStateFactory;
    }


    /**
     * create a game record, and player one in a single operation
     * maybe separate this later but quick and dirty for now...
     *
     * @param NewGame $newGameData
     * @return Game
     */
    public function createNewGame(NewGame $newGameData) : Game
    {
        $game = new Game();
        $game->setActive(true);
        $game->setStatus(Game::STATUS_WAITING_FOR_PLAYERS);
        $game->setName($newGameData->getName());
        $game->setPassword($newGameData->getPassword());
        $game->setCreated(new \DateTime('now'));

        $player1 = new Player();
        $player1->setNumber(1);
        $player1->setUsername($newGameData->getPlayerOneName());
        $player1->setGuid(Uuid::uuid4()->toString());

        $game->addPlayer($player1);

        $this->em->persist($game);
        $this->em->persist($player1);
        $this->em->flush();

        return $game;
    }
}