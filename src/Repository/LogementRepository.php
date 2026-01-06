<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Logement;
use App\Entity\Ville;
use Core\Repository\AbstractRepository;
use DateTime;

/**
 * Class LogementRepository
 * 
 * Handles CRUD operations for Logement entity.
 */
class LogementRepository extends AbstractRepository
{
    protected string $tableName = 'logement';

    /**
     * Saves a logement (create if no ID, update if ID exists).
     * 
     * @param Logement $logement
     * @return bool
     */
    public function save(Logement $logement): bool
    {
        if (!empty($logement->getId())) {
            return $this->update($logement);
        }

        return $this->create($logement);
    }

    /**
     * Creates a new logement in the database.
     * 
     * @param Logement $logement
     * @return bool
     */
    public function create(Logement $logement): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO {$this->tableName} 
            (name_ar, name_fr, name_en, name_es, name_pt, type, price_per_night, description_ar, description_fr, description_en, description_es, description_pt, rating, whatsapp_number, image, ville_id) 
            VALUES (:name_ar, :name_fr, :name_en, :name_es, :name_pt, :type, :price_per_night, :description_ar, :description_fr, :description_en, :description_es, :description_pt, :rating, :whatsapp_number, :image, :ville_id)
        ");

        $success = $stmt->execute([
            ':name_ar' => $logement->getNameAr(),
            ':name_fr' => $logement->getNameFr(),
            ':name_en' => $logement->getNameEn(),
            ':name_es' => $logement->getNameEs(),
            ':name_pt' => $logement->getNamePt(),
            ':type' => $logement->getType(),
            ':price_per_night' => $logement->getPricePerNight(),
            ':description_ar' => $logement->getDescriptionAr(),
            ':description_fr' => $logement->getDescriptionFr(),
            ':description_en' => $logement->getDescriptionEn(),
            ':description_es' => $logement->getDescriptionEs(),
            ':description_pt' => $logement->getDescriptionPt(),
            ':rating' => $logement->getRating(),
            ':whatsapp_number' => $logement->getWhatsappNumber(),
            ':image' => $logement->getImage(),
            ':ville_id' => $logement->getVille() ? $logement->getVille()->getId() : null,
        ]);

        if ($success) {
            $logement->setId((int) $this->pdo->lastInsertId());
        }

        return $success;
    }

    /**
     * Updates an existing logement in the database.
     * 
     * @param Logement $logement
     * @return bool
     */
    public function update(Logement $logement): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE {$this->tableName} SET 
            name_ar = :name_ar, 
            name_fr = :name_fr, 
            name_en = :name_en, 
            name_es = :name_es, 
            name_pt = :name_pt, 
            type = :type,
            price_per_night = :price_per_night,
            description_ar = :description_ar, 
            description_fr = :description_fr, 
            description_en = :description_en, 
            description_es = :description_es, 
            description_pt = :description_pt,
            rating = :rating,
            whatsapp_number = :whatsapp_number,
            image = :image,
            ville_id = :ville_id
            WHERE id = :id
        ");

        return $stmt->execute([
            ':name_ar' => $logement->getNameAr(),
            ':name_fr' => $logement->getNameFr(),
            ':name_en' => $logement->getNameEn(),
            ':name_es' => $logement->getNameEs(),
            ':name_pt' => $logement->getNamePt(),
            ':type' => $logement->getType(),
            ':price_per_night' => $logement->getPricePerNight(),
            ':description_ar' => $logement->getDescriptionAr(),
            ':description_fr' => $logement->getDescriptionFr(),
            ':description_en' => $logement->getDescriptionEn(),
            ':description_es' => $logement->getDescriptionEs(),
            ':description_pt' => $logement->getDescriptionPt(),
            ':rating' => $logement->getRating(),
            ':whatsapp_number' => $logement->getWhatsappNumber(),
            ':image' => $logement->getImage(),
            ':ville_id' => $logement->getVille() ? $logement->getVille()->getId() : null,
            ':id' => $logement->getId(),
        ]);
    }

    /**
     * Fetches all logements as Logement objects.
     * 
     * @return Logement[]
     */
    public function findAllAsObjects(): array
    {
        $data = $this->findAll();
        $logements = [];

        foreach ($data as $row) {
            $logements[] = $this->mapToObject($row);
        }

        return $logements;
    }

    /**
     * Fetches a logement by ID as a Logement object.
     * 
     * @param int $id
     * @return Logement|null
     */
    public function findAsObject(int $id): ?Logement
    {
        $data = $this->find($id);

        if (!$data) {
            return null;
        }

        return $this->mapToObject($data);
    }

    /**
     * Maps a database row to a Logement object.
     * 
     * @param array $data
     * @return Logement
     */
    public function mapToObject(array $data): Logement
    {
        $logement = new Logement();
        $logement->setId(isset($data['id']) ? (int) $data['id'] : null);
        $logement->setNameAr($data['name_ar']);
        $logement->setNameFr($data['name_fr']);
        $logement->setNameEn($data['name_en']);
        $logement->setNameEs($data['name_es']);
        $logement->setNamePt($data['name_pt']);
        $logement->setType($data['type'] ?? '');
        $logement->setPricePerNight((float) ($data['price_per_night'] ?? 0));
        $logement->setDescriptionAr($data['description_ar'] ?? '');
        $logement->setDescriptionFr($data['description_fr'] ?? '');
        $logement->setDescriptionEn($data['description_en'] ?? '');
        $logement->setDescriptionEs($data['description_es'] ?? '');
        $logement->setDescriptionPt($data['description_pt'] ?? '');
        $logement->setRating((float) ($data['rating'] ?? 0));
        $logement->setWhatsappNumber($data['whatsapp_number'] ?? '');
        $logement->setImage($data['image'] ?? '');

        if (isset($data['created_at'])) {
            $logement->setCreatedAt(new DateTime($data['created_at']));
        }

        if (isset($data['ville_id'])) {
            $ville = new Ville();
            $ville->setId((int) $data['ville_id']);
            $logement->setVille($ville);
        }

        return $logement;
    }
}
