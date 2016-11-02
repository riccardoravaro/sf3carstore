<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\CarRepository")
 */
class Car
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\ManytoOne(targetEntity="\CarBundle\Entity\Make", inversedBy="cars")
     */
    private $make;

    /**
     * @var model
     * @ORM\ManyToOne(targetEntity="\CarBundle\Entity\Model", inversedBy="cars")
     *
     */
     private $model;


    /**
     * @ORM\Column(name="$description", type="text", nullable=true)
     */
     private $description;

    /**
     * @ORM\Column(name="price", type="float")
     */
     private $price;


     /**
      * @ORM\Column(name="year", type="date")
      */
      private $year;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Car
     */
    public function setNAME($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getNAME()
    {
        return $this->name;
    }

    /**
     * Set make
     *
     * @param string $make
     *
     * @return Car
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Gets the value of description.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Gets the value of year.
     *
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Car
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set year
     *
     * @param \DateTime $year
     *
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @var boolean
     * @ORM\Column(name="promote", type="boolean")
     */
     private $promote;

    /**
     * Set model
     *
     * @param \CarBundle\Model $model
     *
     * @return Car
     */
    public function setModel(\CarBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \CarBundle\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Gets the value of promote.
     *
     * @return boolean
     */
    public function isPromote()
    {
        return $this->promote;
    }


    /**
     * Gets the value of promote.
     *
     * @return boolean
     */
    public function getPromote()
    {
        return $this->promote;
    }

    /**
     * Sets the value of promote.
     *
     * @param boolean $promote the promote
     *
     * @return self
     */
     public function setPromote($promote)
    {
        $this->promote = $promote;

        return $this;
    }
}
