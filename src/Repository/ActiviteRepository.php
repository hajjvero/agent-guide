<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Activite;
use App\Entity\Ville;
use Core\Repository\AbstractRepository;
use DateTime;

/**
 * Class ActiviteRepository
 * 
 * Handles CRUD operations for Activite entity.
 */
class ActiviteRepository extends AbstractRepository
{
    protected string $tableName = 'activite';

    /**
     * Saves an activite (create if no ID, update if ID exists).
     * 
     * @param Activite $activite
     * @return bool
     */
    public function save(Activite $activite): bool
    {
        if (!empty($activite->getId())) {
            return $this->update($activite);
        }

        return $this->create($activite);
    }

    /**
     * Creates a new activite in the database.
     * 
     * @param Activite $activite
     * @return bool
     */
    public function create(Activite $activite): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO {$this->tableName} 
            (title_ar, title_fr, title_en, title_es, title_pt, description_ar, description_fr, description_en, description_es, description_pt, price, duration, rating, image, ville_id) 
            VALUES (:title_ar, :title_fr, :title_en, :title_es, :title_pt, :description_ar, :description_fr, :description_en, :description_es, :description_pt, :price, :duration, :rating, :image, :ville_id)
        ");

        $success = $stmt->execute([
            ':title_ar' => $activite->getTitleAr(),
            ':title_fr' => $activite->getTitleFr(),
            ':title_en' => $activite->getTitleEn(),
            ':title_es' => $activite->getTitleEs(),
            ':title_pt' => $activite->getTitlePt(),
            ':description_ar' => $activite->getDescriptionAr(),
            ':description_fr' => $activite->getDescriptionFr(),
            ':description_en' => $activite->getDescriptionEn(),
            ':description_es' => $activite->getDescriptionEs(),
            ':description_pt' => $activite->getDescriptionPt(),
            ':price' => $activite->getPrice(),
            ':duration' => $activite->getDuration(),
            ':rating' => $activite->getRating(),
            ':image' => $activite->getImage(),
            ':ville_id' => $activite->getVille()?->getId(),
        ]);

        if ($success) {
            $activite->setId((int) $this->pdo->lastInsertId());
        }

        return $success;
    }

    /**
     * Updates an existing activite in the database.
     * 
     * @param Activite $activite
     * @return bool
     */
    public function update(Activite $activite): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE {$this->tableName} SET 
            title_ar = :title_ar, 
            title_fr = :title_fr, 
            title_en = :title_en, 
            title_es = :title_es, 
            title_pt = :title_pt, 
            description_ar = :description_ar, 
            description_fr = :description_fr, 
            description_en = :description_en, 
            description_es = :description_es, 
            description_pt = :description_pt,
            price = :price,
            duration = :duration,
            rating = :rating,
            image = :image
            ville_id = :ville_id
            WHERE id = :id
        ");

        return $stmt->execute([
            ':title_ar' => $activite->getTitleAr(),
            ':title_fr' => $activite->getTitleFr(),
            ':title_en' => $activite->getTitleEn(),
            ':title_es' => $activite->getTitleEs(),
            ':title_pt' => $activite->getTitlePt(),
            ':description_ar' => $activite->getDescriptionAr(),
            ':description_fr' => $activite->getDescriptionFr(),
            ':description_en' => $activite->getDescriptionEn(),
            ':description_es' => $activite->getDescriptionEs(),
            ':description_pt' => $activite->getDescriptionPt(),
            ':price' => $activite->getPrice(),
            ':duration' => $activite->getDuration(),
            ':rating' => $activite->getRating(),
            ':image' => $activite->getImage(),
            ':ville_id' => $activite->getVille()?->getId(),
            ':id' => $activite->getId(),
        ]);
    }

    /**
     * Fetches all activites as Activite objects.
     * 
     * @return Activite[]
     */
    public function findAllAsObjects(): array
    {
        $data = $this->findAll();
        $activites = [];

        foreach ($data as $row) {
            $activites[] = $this->mapToObject($row);
        }

        return $activites;
    }

    /**
     * Fetches an activite by ID as an Activite object.
     * 
     * @param int $id
     * @return Activite|null
     */
    public function findAsObject(int $id): ?Activite
    {
        $data = $this->find($id);

        if (!$data) {
            return null;
        }

        return $this->mapToObject($data);
    }

    /**
     * Maps a database row to an Activite object.
     * 
     * @param array $data
     * @return Activite
     */
    public function mapToObject(array $data): Activite
    {
        $activite = new Activite();
        $activite->setId(isset($data['id']) ? (int) $data['id'] : null);
        $activite->setTitleAr($data['title_ar']);
        $activite->setTitleFr($data['title_fr']);
        $activite->setTitleEn($data['title_en']);
        $activite->setTitleEs($data['title_es']);
        $activite->setTitlePt($data['title_pt']);
        $activite->setDescriptionAr($data['description_ar'] ?? '');
        $activite->setDescriptionFr($data['description_fr'] ?? '');
        $activite->setDescriptionEn($data['description_en'] ?? '');
        $activite->setDescriptionEs($data['description_es'] ?? '');
        $activite->setDescriptionPt($data['description_pt'] ?? '');
        $activite->setPrice((float) $data['price']);
        $activite->setDuration($data['duration'] ?? '');
        $activite->setRating((float) $data['rating']);
        $activite->setImage($data['image'] ?? '');

        if (isset($data['created_at'])) {
            $activite->setCreatedAt(new DateTime($data['created_at']));
        }

        if (isset($data['ville_id'])) {
            $ville = new Ville();
            $ville->setId((int) $data['ville_id']);
            $activite->setVille($ville);
        }

        return $activite;
    }
}
