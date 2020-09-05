<?php


namespace App\Game\Data;


class Player
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $number;

    /**
     * @var string
     */
    private $username;

    /**
     * @var integer
     */
    private $credits;

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
}