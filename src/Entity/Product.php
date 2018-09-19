<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @UniqueEntity( fields={"code"}, message="El codigo ya esta en uso")
 * @UniqueEntity( fields={"name"}, message="El nombre ya esta en uso")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     * @Assert\NotBlank(message="Ingrese un codigo")
     * @Assert\Length(
     *      min = 4,
     *      max = 10,
     *      minMessage = "El codigo debe ser minimo de {{ limit }} caracteres de largo",
     *      maxMessage = "El codigo no debe ser mayor de {{ limit }} caracteres"
     * )
     * @Assert\Regex(
     *     pattern     = "/^[a-z 0-9]+$/i",
     *     htmlPattern = "^[a-zA-Z 0-9]+$",
     *     message="El código no puede contener caracteres especiales ni espacios"
     * )
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank(message="Ingrese un nombre")
     * @Assert\Length(
     *      min = 4,
     *      max = 255,
     *      minMessage = "El nombre debe ser minimo de {{ limit }} caracteres de largo",
     *      maxMessage = "El nombre no debe ser mayor de {{ limit }} caracteres"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ingrese una descripción")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ingrese una marca")
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ingrese una categoría")
     */
    private $category;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Ingrese un precio")
     * 
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
