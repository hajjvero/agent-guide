<?php

namespace App\Entity;

use DateTime;

abstract class Person
{
    /*
    |--------------------------------------------------------------------------
    | Les propriétés
    |--------------------------------------------------------------------------
    |
    */

    protected ?int $id;
    protected string $fullNameAr;
    protected string $fullNameFr;
    protected string $fullNameEn;
    protected string $fullNameEs;
    protected string $fullNamePt;

    protected ?string $whatsappNumber = null;
    protected string $languages;
    protected ?string $image = null;
    protected DateTime $createdAt;

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
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getFullNameAr(): string
    {
        return $this->fullNameAr;
    }

    public function setFullNameAr(string $fullNameAr): self
    {
        $this->fullNameAr = $fullNameAr;
        return $this;
    }

    public function getFullNameFr(): string
    {
        return $this->fullNameFr;
    }

    public function setFullNameFr(string $fullNameFr): self
    {
        $this->fullNameFr = $fullNameFr;
        return $this;
    }

    public function getFullNameEn(): string
    {
        return $this->fullNameEn;
    }

    public function setFullNameEn(string $fullNameEn): self
    {
        $this->fullNameEn = $fullNameEn;
        return $this;
    }

    public function getFullNameEs(): string
    {
        return $this->fullNameEs;
    }

    public function setFullNameEs(string $fullNameEs): self
    {
        $this->fullNameEs = $fullNameEs;
        return $this;
    }

    public function getFullNamePt(): string
    {
        return $this->fullNamePt;
    }

    public function setFullNamePt(string $fullNamePt): self
    {
        $this->fullNamePt = $fullNamePt;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getWhatsappNumber(): ?string
    {
        return $this->whatsappNumber;
    }

    public function setWhatsappNumber(?string $whatsappNumber): self
    {
        $this->whatsappNumber = $whatsappNumber;
        return $this;
    }

    public function getLanguages(): string
    {
        return $this->languages;
    }

    public function setLanguages(string $languages): self
    {
        $this->languages = $languages;
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
}
