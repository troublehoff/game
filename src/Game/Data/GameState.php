<?php


namespace App\Game\Data;


class GameState implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var array<int,Player>
     */
    private array $players;

    /**
     * @var Map
     */
    private Map $map;

    /**
     * @var array<int,Unit>
     */
    private array $units;

    /**
     * @var Turn
     */
    private Turn $turn;

    /**
     * GameState constructor.
     * @param int $id
     * @param string $name
     * @param array<int,Player> $players
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * @return Map
     */
    public function getMap(): Map
    {
        return $this->map;
    }

    /**
     * @return array
     */
    public function getUnits(): array
    {
        return $this->units;
    }

    /**
     * @return Turn
     */
    public function getTurn(): Turn
    {
        return $this->turn;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'players' => $this->players,
            'units' => $this->units,
            'turn' => $this->turn
        ];
    }
}