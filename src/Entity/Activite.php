<?php

namespace App\Entity;

use DateTime;

class Activite
{
    /*
    |--------------------------------------------------------------------------
    | Les propriétes
    |--------------------------------------------------------------------------
    |
    */
    private int $id;
    private string $titleAr;
    private string $titleFr;
    private string $titleEn;
    private string $titleEs;
    private string $titlePt;

    private string $descriptionAr;
    private string $descriptionFr;
    private string $descriptionEn;
    private string $descriptionEs;
    private string $descriptionPt;

    private float $price;
    private string $duration;
    private float $rating;
    private string $image;
    private DateTime $createdAt;

    /*
    |--------------------------------------------------------------------------
    | Les relations
    |--------------------------------------------------------------------------
    |
    */
    private Ville $ville;

    /*
    |--------------------------------------------------------------------------
    | Constructeur
    |--------------------------------------------------------------------------
    |
    */
    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

    /*
    |--------------------------------------------------------------------------
    | Getters et Setters
    |--------------------------------------------------------------------------
    |
    */
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitleAr(): string
    {
        return $this->titleAr;
    }

    public function setTitleAr(string $titleAr): self
    {
        $this->titleAr = $titleAr;
        return $this;
    }

    public function getTitleFr(): string
    {
        return $this->titleFr;
    }

    public function setTitleFr(string $titleFr): self
    {
        $this->titleFr = $titleFr;
        return $this;
    }

    public function getTitleEn(): string
    {
        return $this->titleEn;
    }

    public function setTitleEn(string $titleEn): self
    {
        $this->titleEn = $titleEn;
        return $this;
    }

    public function getTitleEs(): string
    {
        return $this->titleEs;
    }

    public function setTitleEs(string $titleEs): self
    {
        $this->titleEs = $titleEs;
        return $this;
    }

    public function getTitlePt(): string
    {
        return $this->titlePt;
    }

    public function setTitlePt(string $titlePt): self
    {
        $this->titlePt = $titlePt;
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

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;
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
    public function getVille(): Ville
    {
        return $this->ville;
    }

    public function setVille(Ville $ville): self
    {
        $this->ville = $ville;
        return $this;
    }
}
