<?php


namespace App\Game\Data;


class Tile
{
    const TYPE_WATER     = 'water';
    const TYPE_GRASSLAND = 'grassland';
    const TYPE_MOUNTAINS = 'mountains';
    const TYPE_FOREST    = 'forest';
    const TYPE_URBAN     = 'urban';

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
     * Tile constructor.
     * @param int $q
     * @param int $r
     * @param string $type
     */
    public function __construct(int $q, int $r, string $type)
    {
        $this->q = $q;
        $this->r = $r;
        $this->type = $type;
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


}