<?php


namespace App\Game\Data;


class Turn
{
    /**
     * @var integer
     */
    private int $turnNumber;

    /**
     * @var integer
     */
    private int $playerNumber;

    /**
     * Turn constructor.
     * @param int $turnNumber
     * @param int $playerNumber
     */
    private function __construct(int $turnNumber, int $playerNumber)
    {
        $this->turnNumber = $turnNumber;
        $this->playerNumber = $playerNumber;
    }

    /**
     * @return int
     */
    public function getTurnNumber(): int
    {
        return $this->turnNumber;
    }

    /**
     * @return int
     */
    public function getPlayerNumber(): int
    {
        return $this->playerNumber;
    }

    /**
     * generate the next turn...
     *
     * @return Turn
     */
    public function advance(): Turn
    {
        if($this->playerNumber === 1)
        {
            return new Turn($this->turnNumber, 2);
        }

        return new Turn($this->turnNumber++, 1);
    }

    /**
     * generate first turn of the game...
     *
     * @return Turn
     */
    public static function createInitial() : Turn
    {
        return new Turn(1,1);
    }
}