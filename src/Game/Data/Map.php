<?php


namespace App\Game\Data;


use Astatroth\HexGrid\Grid;

class Map
{
    /**
     * @var integer
     */
    private $radius;

    /**
     * Tile[q][r]
     * @var array<int,array<int, Tile>>
     */
    private $tiles;

    /**
     * Map constructor.
     * @param int $radius
     * @param array $tiles
     */
    private function __construct(int $radius, array $tiles)
    {
        $this->radius = $radius;
        $this->tiles = $tiles;
    }

    public static function generateRandom(int $radius) : self
    {
        $grid = new Grid();

        $tileCoords = $grid->hexagon(0,0, $radius, true);

        $tiles = [];

        foreach ($tileCoords as $tileCoord)
        {
            $tile = new Tile($tileCoord['q'], $tileCoord['r'], Tile::TYPE_GRASSLAND);
            $tiles[$tile->getQ()][$tile->getR()] = $tile;
        }

        return new Map($radius, $tiles);
    }
}