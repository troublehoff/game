<?php


namespace App\Game;


use App\Entity\Game;
use App\Game\Data\GameState;
use App\Game\Data\Map;
use App\Game\Data\Player;
use App\Game\Data\Turn;
use App\Game\Data\Unit;

class GameStateFactory
{
    private int $mapRadius = 6;
    private int $initialCreditsPerPlayer = 1000;


    public function createNewFromGameEntity(Game $gameEntity)
    {
        $map = Map::generateRandom($this->mapRadius);

        $playerEntites = $gameEntity->getPlayers();
        $players = [];

        foreach ($playerEntites as $playerEntity)
        {
            $players[$playerEntity->getNumber()] = Player::fromPlayerEntity(
                $playerEntity,
                $this->initialCreditsPerPlayer
            );
        }

        $units = [];

        dump($map);

        foreach ($players as $playerNum => $player)
        {
            // initial tank
//            $id = Unit::getNextId($units);
//            $units[$id] = Unit::create(
//                $id,
//
//            );
        }

        return new GameState(
            $gameEntity->getId(),
            $gameEntity->getName(),
            $players,
            $map,
            $units,
            Turn::createInitial()
        );

    }

}