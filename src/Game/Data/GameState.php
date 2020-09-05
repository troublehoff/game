<?php


namespace App\Game\Data;


class GameState
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array<int,App\Game\Data\Player>
     */
    private $players;

    /**
     * @var Map
     */
    private $map;

    /**
     * @var array<Unit>
     */
    private $units;

    /**
     * @var Turn
     */
    private $turn;

    /**
     * GameState constructor.
     * @param int $id
     * @param string $name
     * @param array $players
     * @param Map $map
     * @param array $units
     * @param Turn $turn
     */
    public function __construct(int $id, string $name, array $players, Map $map, array $units, Turn $turn)
    {
        $this->id = $id;
        $this->name = $name;
        $this->players = $players;
        $this->map = $map;
        $this->units = $units;
        $this->turn = $turn;
    }
}