<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Ville;
use Core\Repository\AbstractRepository;
use DateTime;

/**
 * Class VilleRepository
 * 
 * Handles CRUD operations for Ville entity.
 */
class VilleRepository extends AbstractRepository
{
    protected string $tableName = 'ville';

    /**
     * Saves a ville (create if no ID, update if ID exists).
     * 
     * @param Ville $ville
     * @return bool
     */
    public function save(Ville $ville): bool
    {
        if (!empty($ville->getId())) {
            return $this->update($ville);
        }

        return $this->create($ville);
    }

    /**
     * Creates a new ville in the database.
     * 
     * @param Ville $ville
     * @return bool
     */
    public function create(Ville $ville): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO {$this->tableName} 
            (name_ar, name_fr, name_en, name_es, name_pt, description_ar, description_fr, description_en, description_es, description_pt, image) 
            VALUES (:name_ar, :name_fr, :name_en, :name_es, :name_pt, :description_ar, :description_fr, :description_en, :description_es, :description_pt, :image)
        ");

        $success = $stmt->execute([
            ':name_ar' => $ville->getNameAr(),
            ':name_fr' => $ville->getNameFr(),
            ':name_en' => $ville->getNameEn(),
            ':name_es' => $ville->getNameEs(),
            ':name_pt' => $ville->getNamePt(),
            ':description_ar' => $ville->getDescriptionAr(),
            ':description_fr' => $ville->getDescriptionFr(),
            ':description_en' => $ville->getDescriptionEn(),
            ':description_es' => $ville->getDescriptionEs(),
            ':description_pt' => $ville->getDescriptionPt(),
            ':image' => $ville->getImage()
        ]);

        if ($success) {
            $ville->setId((int) $this->pdo->lastInsertId());
        }

        return $success;
    }

    /**
     * Updates an existing ville in the database.
     * 
     * @param Ville $ville
     * @return bool
     */
    public function update(Ville $ville): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE {$this->tableName} SET 
            name_ar = :name_ar, 
            name_fr = :name_fr, 
            name_en = :name_en, 
            name_es = :name_es, 
            name_pt = :name_pt, 
            description_ar = :description_ar, 
            description_fr = :description_fr, 
            description_en = :description_en, 
            description_es = :description_es, 
            description_pt = :description_pt,
            image = :image
            WHERE id = :id
        ");

        return $stmt->execute([
            ':name_ar' => $ville->getNameAr(),
            ':name_fr' => $ville->getNameFr(),
            ':name_en' => $ville->getNameEn(),
            ':name_es' => $ville->getNameEs(),
            ':name_pt' => $ville->getNamePt(),
            ':description_ar' => $ville->getDescriptionAr(),
            ':description_fr' => $ville->getDescriptionFr(),
            ':description_en' => $ville->getDescriptionEn(),
            ':description_es' => $ville->getDescriptionEs(),
            ':description_pt' => $ville->getDescriptionPt(),
            ':image' => $ville->getImage(),
            ':id' => $ville->getId(),
        ]);
    }

    /**
     * Fetches all villes as Ville objects.
     * 
     * @return Ville[]
     */
    public function findAllAsObjects(): array
    {
        $data = $this->findAll();
        $villes = [];

        foreach ($data as $row) {
            $villes[] = $this->mapToObject($row);
        }

        return $villes;
    }

    /**
     * Fetches a ville by ID as a Ville object.
     * 
     * @param int $id
     * @return Ville|null
     */
    public function findAsObject(int $id): ?Ville
    {
        $data = $this->find($id);

        if (!$data) {
            return null;
        }

        return $this->mapToObject($data);
    }

    /**
     * Maps a database row to a Ville object.
     * 
     * @param array $data
     * @return Ville
     */
    public function mapToObject(array $data): Ville
    {
        $ville = new Ville();
        $ville->setId(isset($data['id']) ? (int) $data['id'] : null);
        $ville->setNameAr($data['name_ar']);
        $ville->setNameFr($data['name_fr']);
        $ville->setNameEn($data['name_en']);
        $ville->setNameEs($data['name_es']);
        $ville->setNamePt($data['name_pt']);
        $ville->setDescriptionAr($data['description_ar'] ?? '');
        $ville->setDescriptionFr($data['description_fr'] ?? '');
        $ville->setDescriptionEn($data['description_en'] ?? '');
        $ville->setDescriptionEs($data['description_es'] ?? '');
        $ville->setDescriptionPt($data['description_pt'] ?? '');
        $ville->setImage($data['image'] ?? '');

        if (isset($data['created_at'])) {
            $ville->setCreatedAt(new DateTime($data['created_at']));
        }

        return $ville;
    }
}
