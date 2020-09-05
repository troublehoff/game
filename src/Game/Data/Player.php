<?php


namespace App\Game\Data;


class Player
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $guid;

    /**
     * @var string
     */
    private $username;

    /**
     * Player constructor.
     * @param int $id
     * @param string $guid
     * @param string $username
     */
    public function __construct($id, $guid, $username)
    {
        $this->id = $id;
        $this->guid = $guid;
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }



}