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
    private $guid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array<int,App\Game\Data\Player>
     */
    private $players;

    /**
     * @var
     */
    private $map;

    /**
     * @var
     */
    private $units;

    private $turn;


}