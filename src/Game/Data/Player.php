<?php


namespace App\Game\Data;


class Player implements \JsonSerializable
{
    /**
     * @var integer
     */
    private int $id;

    /**
     * @var integer
     */
    private int $number;

    /**
     * @var string
     */
    private string $username;

    /**
     * @var integer
     */
    private int $credits;

    /**
     * Player constructor.
     * @param int $id
     * @param int $number
     * @param string $username
     * @param int $credits
     */
    public function __construct(int $id, int $number, string $username, int $credits)
    {
        $this->id = $id;
        $this->number = $number;
        $this->username = $username;
        $this->credits = $credits;
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
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getCredits(): int
    {
        return $this->credits;
    }

    /**
     * @param \App\Entity\Player $playerEntity
     * @param int $credits
     * @return Player
     */
    public static function fromPlayerEntity(\App\Entity\Player $playerEntity, int $credits)
    {
        return new Player(
            $playerEntity->getId(),
            $playerEntity->getId(),
            $playerEntity->getUsername(),
            $credits
        );
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'username' => $this->username,
            'credits' => $this->credits
        ];
    }
}