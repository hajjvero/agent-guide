<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Chauffeur;
use App\Entity\Ville;
use Core\Repository\AbstractRepository;
use DateTime;

/**
 * Class ChauffeurRepository
 * 
 * Handles CRUD operations for Chauffeur entity.
 */
class ChauffeurRepository extends AbstractRepository
{
    protected string $tableName = 'chauffeur';

    /**
     * Saves a chauffeur (create if no ID, update if ID exists).
     * 
     * @param Chauffeur $chauffeur
     * @return bool
     */
    public function save(Chauffeur $chauffeur): bool
    {
        if (!empty($chauffeur->getId())) {
            return $this->update($chauffeur);
        }

        return $this->create($chauffeur);
    }

    /**
     * Creates a new chauffeur in the database.
     * 
     * @param Chauffeur $chauffeur
     * @return bool
     */
    public function create(Chauffeur $chauffeur): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO {$this->tableName} 
            (full_name_ar, full_name_fr, full_name_en, full_name_es, full_name_pt, whatsapp_number, languages, image, vehicle_type, price_per_day, rating, ville_id) 
            VALUES (:full_name_ar, :full_name_fr, :full_name_en, :full_name_es, :full_name_pt, :whatsapp_number, :languages, :image, :vehicle_type, :price_per_day, :rating, :ville_id)
        ");

        $success = $stmt->execute([
            ':full_name_ar' => $chauffeur->getFullNameAr(),
            ':full_name_fr' => $chauffeur->getFullNameFr(),
            ':full_name_en' => $chauffeur->getFullNameEn(),
            ':full_name_es' => $chauffeur->getFullNameEs(),
            ':full_name_pt' => $chauffeur->getFullNamePt(),
            ':whatsapp_number' => $chauffeur->getWhatsappNumber(),
            ':languages' => $chauffeur->getLanguages(),
            ':image' => $chauffeur->getImage(),
            ':vehicle_type' => $chauffeur->getVehicleType(),
            ':price_per_day' => $chauffeur->getPricePerDay(),
            ':rating' => $chauffeur->getRating(),
            ':ville_id' => $chauffeur->getVille()?->getId(),
        ]);

        if ($success) {
            $chauffeur->setId((int) $this->pdo->lastInsertId());
        }

        return $success;
    }

    /**
     * Updates an existing chauffeur in the database.
     * 
     * @param Chauffeur $chauffeur
     * @return bool
     */
    public function update(Chauffeur $chauffeur): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE {$this->tableName} SET 
            full_name_ar = :full_name_ar, 
            full_name_fr = :full_name_fr, 
            full_name_en = :full_name_en, 
            full_name_es = :full_name_es, 
            full_name_pt = :full_name_pt, 
            whatsapp_number = :whatsapp_number, 
            languages = :languages, 
            image = :image,
            vehicle_type = :vehicle_type, 
            price_per_day = :price_per_day, 
            rating = :rating, 
            ville_id = :ville_id
            WHERE id = :id
        ");

        return $stmt->execute([
            ':full_name_ar' => $chauffeur->getFullNameAr(),
            ':full_name_fr' => $chauffeur->getFullNameFr(),
            ':full_name_en' => $chauffeur->getFullNameEn(),
            ':full_name_es' => $chauffeur->getFullNameEs(),
            ':full_name_pt' => $chauffeur->getFullNamePt(),
            ':whatsapp_number' => $chauffeur->getWhatsappNumber(),
            ':languages' => $chauffeur->getLanguages(),
            ':image' => $chauffeur->getImage(),
            ':vehicle_type' => $chauffeur->getVehicleType(),
            ':price_per_day' => $chauffeur->getPricePerDay(),
            ':rating' => $chauffeur->getRating(),
            ':ville_id' => $chauffeur->getVille()?->getId(),
            ':id' => $chauffeur->getId(),
        ]);
    }

    /**
     * Fetches all chauffeurs as Chauffeur objects.
     * 
     * @return Chauffeur[]
     */
    public function findAllAsObjects(): array
    {
        $data = $this->findAll();
        $chauffeurs = [];

        foreach ($data as $row) {
            $chauffeurs[] = $this->mapToObject($row);
        }

        return $chauffeurs;
    }

    /**
     * Fetches a chauffeur by ID as a Chauffeur object.
     * 
     * @param int $id
     * @return Chauffeur|null
     */
    public function findAsObject(int $id): ?Chauffeur
    {
        $data = $this->find($id);

        if (!$data) {
            return null;
        }

        return $this->mapToObject($data);
    }

    /**
     * Maps a database row to a Chauffeur object.
     * 
     * @param array $data
     * @return Chauffeur
     */
    public function mapToObject(array $data): Chauffeur
    {
        $chauffeur = new Chauffeur();
        $chauffeur->setId($data['id'] ? (int) $data['id'] : null);
        $chauffeur->setFullNameAr($data['full_name_ar']);
        $chauffeur->setFullNameFr($data['full_name_fr']);
        $chauffeur->setFullNameEn($data['full_name_en']);
        $chauffeur->setFullNameEs($data['full_name_es']);
        $chauffeur->setFullNamePt($data['full_name_pt']);
        $chauffeur->setWhatsappNumber($data['whatsapp_number'] ?? null);
        $chauffeur->setLanguages($data['languages'] ?? '');
        $chauffeur->setImage($data['image'] ?? null);

        if (isset($data['created_at'])) {
            $chauffeur->setCreatedAt(new DateTime($data['created_at']));
        }

        $chauffeur->setVehicleType($data['vehicle_type'] ?? '');
        $chauffeur->setPricePerDay((float) ($data['price_per_day'] ?? 0));
        $chauffeur->setRating((float) ($data['rating'] ?? 0));

        if (isset($data['ville_id'])) {
            $ville = new Ville();
            $ville->setId((int) $data['ville_id']);
            $chauffeur->setVille($ville);
        }

        return $chauffeur;
    }
}
