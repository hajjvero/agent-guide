<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Restaurant;
use App\Entity\Ville;
use Core\Repository\AbstractRepository;
use DateTime;

/**
 * Class RestaurantRepository
 * 
 * Handles CRUD operations for Restaurant entity.
 */
class RestaurantRepository extends AbstractRepository
{
    protected string $tableName = 'restaurant';

    /**
     * Saves a restaurant (create if no ID, update if ID exists).
     * 
     * @param Restaurant $restaurant
     * @return bool
     */
    public function save(Restaurant $restaurant): bool
    {
        if (!empty($restaurant->getId())) {
            return $this->update($restaurant);
        }

        return $this->create($restaurant);
    }

    /**
     * Creates a new restaurant in the database.
     * 
     * @param Restaurant $restaurant
     * @return bool
     */
    public function create(Restaurant $restaurant): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO {$this->tableName} 
            (name_ar, name_fr, name_en, name_es, name_pt, cuisine_type, description_ar, description_fr, description_en, description_es, description_pt, price_range, rating, image, ville_id) 
            VALUES (:name_ar, :name_fr, :name_en, :name_es, :name_pt, :cuisine_type, :description_ar, :description_fr, :description_en, :description_es, :description_pt, :price_range, :rating, :image, :ville_id)
        ");

        $success = $stmt->execute([
            ':name_ar' => $restaurant->getNameAr(),
            ':name_fr' => $restaurant->getNameFr(),
            ':name_en' => $restaurant->getNameEn(),
            ':name_es' => $restaurant->getNameEs(),
            ':name_pt' => $restaurant->getNamePt(),
            ':cuisine_type' => $restaurant->getCuisineType(),
            ':description_ar' => $restaurant->getDescriptionAr(),
            ':description_fr' => $restaurant->getDescriptionFr(),
            ':description_en' => $restaurant->getDescriptionEn(),
            ':description_es' => $restaurant->getDescriptionEs(),
            ':description_pt' => $restaurant->getDescriptionPt(),
            ':price_range' => $restaurant->getPriceRange(),
            ':rating' => $restaurant->getRating(),
            ':image' => $restaurant->getImage(),
            ':ville_id' => $restaurant->getVille() ? $restaurant->getVille()->getId() : null,
        ]);

        if ($success) {
            $restaurant->setId((int) $this->pdo->lastInsertId());
        }

        return $success;
    }

    /**
     * Updates an existing restaurant in the database.
     * 
     * @param Restaurant $restaurant
     * @return bool
     */
    public function update(Restaurant $restaurant): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE {$this->tableName} SET 
            name_ar = :name_ar, 
            name_fr = :name_fr, 
            name_en = :name_en, 
            name_es = :name_es, 
            name_pt = :name_pt, 
            cuisine_type = :cuisine_type,
            description_ar = :description_ar, 
            description_fr = :description_fr, 
            description_en = :description_en, 
            description_es = :description_es, 
            description_pt = :description_pt,
            price_range = :price_range,
            rating = :rating,
            image = :image,
            ville_id = :ville_id
            WHERE id = :id
        ");

        return $stmt->execute([
            ':name_ar' => $restaurant->getNameAr(),
            ':name_fr' => $restaurant->getNameFr(),
            ':name_en' => $restaurant->getNameEn(),
            ':name_es' => $restaurant->getNameEs(),
            ':name_pt' => $restaurant->getNamePt(),
            ':cuisine_type' => $restaurant->getCuisineType(),
            ':description_ar' => $restaurant->getDescriptionAr(),
            ':description_fr' => $restaurant->getDescriptionFr(),
            ':description_en' => $restaurant->getDescriptionEn(),
            ':description_es' => $restaurant->getDescriptionEs(),
            ':description_pt' => $restaurant->getDescriptionPt(),
            ':price_range' => $restaurant->getPriceRange(),
            ':rating' => $restaurant->getRating(),
            ':image' => $restaurant->getImage(),
            ':ville_id' => $restaurant->getVille() ? $restaurant->getVille()->getId() : null,
            ':id' => $restaurant->getId(),
        ]);
    }

    /**
     * Fetches all restaurants as Restaurant objects.
     * 
     * @return Restaurant[]
     */
    public function findAllAsObjects(): array
    {
        $data = $this->findAll();
        $restaurants = [];

        foreach ($data as $row) {
            $restaurants[] = $this->mapToObject($row);
        }

        return $restaurants;
    }

    /**
     * Fetches a restaurant by ID as a Restaurant object.
     * 
     * @param int $id
     * @return Restaurant|null
     */
    public function findAsObject(int $id): ?Restaurant
    {
        $data = $this->find($id);

        if (!$data) {
            return null;
        }

        return $this->mapToObject($data);
    }

    /**
     * Maps a database row to a Restaurant object.
     * 
     * @param array $data
     * @return Restaurant
     */
    public function mapToObject(array $data): Restaurant
    {
        $restaurant = new Restaurant();
        $restaurant->setId(isset($data['id']) ? (int) $data['id'] : null);
        $restaurant->setNameAr($data['name_ar']);
        $restaurant->setNameFr($data['name_fr']);
        $restaurant->setNameEn($data['name_en']);
        $restaurant->setNameEs($data['name_es']);
        $restaurant->setNamePt($data['name_pt']);
        $restaurant->setCuisineType($data['cuisine_type'] ?? '');
        $restaurant->setDescriptionAr($data['description_ar'] ?? '');
        $restaurant->setDescriptionFr($data['description_fr'] ?? '');
        $restaurant->setDescriptionEn($data['description_en'] ?? '');
        $restaurant->setDescriptionEs($data['description_es'] ?? '');
        $restaurant->setDescriptionPt($data['description_pt'] ?? '');
        $restaurant->setPriceRange($data['price_range'] ?? '');
        $restaurant->setRating($data['rating'] ?? '');
        $restaurant->setImage($data['image'] ?? '');

        if (isset($data['created_at'])) {
            $restaurant->setCreatedAt(new DateTime($data['created_at']));
        }

        if (isset($data['ville_id'])) {
            $ville = new Ville();
            $ville->setId((int) $data['ville_id']);
            $restaurant->setVille($ville);
        }

        return $restaurant;
    }
}
