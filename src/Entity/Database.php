<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DatabaseRepository")
 */
class Database
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    *   @ORM\Column(type="text")
    */
    private $title;
    
    /**
    *   @ORM\Column(type="text")
    */
    private $body;
}

