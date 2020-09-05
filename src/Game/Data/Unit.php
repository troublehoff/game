<?php


namespace App\Game\Data;


class Unit
{
    const TYPE_TANK = 'tank';
    const TYPE_HELI = 'heli';

    /**
     * @var int
     */
    private $q;

    /**
     * @var int
     */
    private $r;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $playerNumber;

    /**
     * Unit constructor.
     * @param int $q
     * @param int $r
     * @param string $type
     * @param int $playerNumber
     */
    public function __construct(int $q, int $r, string $type, int $playerNumber)
    {
        $this->q = $q;
        $this->r = $r;
        $this->type = $type;
        $this->playerNumber = $playerNumber;
    }

    /**
     * @return int
     */
    public function getQ(): int
    {
        return $this->q;
    }

    /**
     * @return int
     */
    public function getR(): int
    {
        return $this->r;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getPlayerNumber(): int
    {
        return $this->playerNumber;
    }




}