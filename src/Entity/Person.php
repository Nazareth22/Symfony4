<?php
/**
 * Created by PhpStorm.
 * User: MVYaroslavcev
 * Date: 20/02/19
 * Time: 8:24
 */

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Person
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var ArrayCollection
     */
    private $car;

    public function __construct()
    {
        $this->car = new ArrayCollection();
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
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return Collection
     */
    public function getCar(): Collection
    {
        return $this->car;
    }

    /**
     * @param ArrayCollection $car
     */
    public function setCar(ArrayCollection $car): void
    {
        $this->car = $car;
    }



}