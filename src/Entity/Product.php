<?php

namespace App\Entity;

use DateTime;

class Product
{
    /*
    |--------------------------------------------------------------------------
    | Les propriéts
    |--------------------------------------------------------------------------
    |
    */
    private ?int $id;

    private string $nameAr;
    private string $nameFr;
    private string $nameEn;
    private string $nameEs;
    private string $namePt;

    private string $descriptionAr;
    private string $descriptionFr;
    private string $descriptionEn;
    private string $descriptionEs;
    private string $descriptionPt;

    private float $price;

    private float $stock;

    private string $image;

    private DateTime $createdAt;

    /*
    |--------------------------------------------------------------------------
    | Les relations
    |--------------------------------------------------------------------------
    |
    */
    private Category $category;

    /*
    |--------------------------------------------------------------------------
    | Les constructeur
    |--------------------------------------------------------------------------
    |
    */
    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

    /*
    |--------------------------------------------------------------------------
    | Les getters et setters
    |--------------------------------------------------------------------------
    |
    */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNameAr(): string
    {
        return $this->nameAr;
    }

    public function setNameAr(string $nameAr): self
    {
        $this->nameAr = $nameAr;
        return $this;
    }

    public function getNameFr(): string
    {
        return $this->nameFr;
    }

    public function setNameFr(string $nameFr): self
    {
        $this->nameFr = $nameFr;
        return $this;
    }

    public function getNameEn(): string
    {
        return $this->nameEn;
    }

    public function setNameEn(string $nameEn): self
    {
        $this->nameEn = $nameEn;
        return $this;
    }

    public function getNameEs(): string
    {
        return $this->nameEs;
    }

    public function setNameEs(string $nameEs): self
    {
        $this->nameEs = $nameEs;
        return $this;
    }

    public function getNamePt(): string
    {
        return $this->namePt;
    }

    public function setNamePt(string $namePt): self
    {
        $this->namePt = $namePt;
        return $this;
    }

    public function getDescriptionAr(): string
    {
        return $this->descriptionAr;
    }

    public function setDescriptionAr(string $descriptionAr): self
    {
        $this->descriptionAr = $descriptionAr;
        return $this;
    }

    public function getDescriptionFr(): string
    {
        return $this->descriptionFr;
    }

    public function setDescriptionFr(string $descriptionFr): self
    {
        $this->descriptionFr = $descriptionFr;
        return $this;
    }

    public function getDescriptionEn(): string
    {
        return $this->descriptionEn;
    }

    public function setDescriptionEn(string $descriptionEn): self
    {
        $this->descriptionEn = $descriptionEn;
        return $this;
    }

    public function getDescriptionEs(): string
    {
        return $this->descriptionEs;
    }

    public function setDescriptionEs(string $descriptionEs): self
    {
        $this->descriptionEs = $descriptionEs;
        return $this;
    }

    public function getDescriptionPt(): string
    {
        return $this->descriptionPt;
    }

    public function setDescriptionPt(string $descriptionPt): self
    {
        $this->descriptionPt = $descriptionPt;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getStock(): float
    {
        return $this->stock;
    }

    public function setStock(float $stock): self
    {
        $this->stock = $stock;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Les relations
    |--------------------------------------------------------------------------
    |
    */
    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;
        return $this;
    }
}
