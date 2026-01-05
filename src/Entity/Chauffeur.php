<?php

namespace App\Entity;

class Chauffeur extends Person
{
    /*
    |--------------------------------------------------------------------------
    | Les propriétés
    |--------------------------------------------------------------------------
    |
    */

    private string $vehicleType;

    private float $pricePerDay;

    private float $rating;

    /*
    |--------------------------------------------------------------------------
    | Les relations
    |--------------------------------------------------------------------------
    |
    */

    private Ville $ville;

    /*
    |--------------------------------------------------------------------------
    | Les getters et setters
    |--------------------------------------------------------------------------
    |
    */

    public function getVehicleType(): string
    {
        return $this->vehicleType;
    }

    public function setVehicleType(string $vehicleType): self
    {
        $this->vehicleType = $vehicleType;
        return $this;
    }

    public function getPricePerDay(): float
    {
        return $this->pricePerDay;
    }

    public function setPricePerDay(float $pricePerDay): self
    {
        $this->pricePerDay = $pricePerDay;
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
