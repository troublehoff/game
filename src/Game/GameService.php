<?php


namespace App\Game;


use App\Entity\Game;
use Doctrine\ORM\EntityManagerInterface;

class GameService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * GameService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Game $game
     */
    public function createNewGame(Game $game)
    {
        $game->setActive(true);
        $game->setState();

        $this->em->persist($game);
        $this->em->flush();
    }
}