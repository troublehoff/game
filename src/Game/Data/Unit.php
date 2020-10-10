<?php


namespace App\Game\Data;


class Unit implements \JsonSerializable
{
    const TYPE_TANK = 'tank';
    const TYPE_HELI = 'heli';

    /**
     * @var int
     */
    private int $id;

    /**
     * @var int
     */
    private int $q;

    /**
     * @var int
     */
    private int $r;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var int
     */
    private int $playerNumber;

    /**
     * Unit constructor.
     * @param int $id
     * @param int $q
     * @param int $r
     * @param string $type
     * @param int $playerNumber
     */
    public function __construct(int $id, int $q, int $r, string $type, int $playerNumber)
    {
        $this->id = $id;
        $this->q = $q;
        $this->r = $r;
        $this->type = $type;
        $this->playerNumber = $playerNumber;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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

    /**
     * @param int $id
     * @param int $q
     * @param int $r
     * @param string $type
     * @param int $playerNumber
     * @return Unit
     */
    public static function create(int $id, int $q, int $r, string $type, int $playerNumber)
    {
        return new Unit($id, $q, $r, $type, $playerNumber);
    }

    /**
     * @param array $units
     * @return int
     */
    public static function getNextId(array $units): int
    {
        return count($units) + 1;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'q' => $this->q,
            'r' => $this->r,
            'type' => $this->type,
            'playerNumber' => $this->playerNumber
        ];
    }
}