<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Category;
use Core\Repository\AbstractRepository;

/**
 * Class CategoryRepository
 * 
 * Handles CRUD operations for Category entity.
 */
class CategoryRepository extends AbstractRepository
{
    protected string $tableName = 'category';

    /**
     * Saves a category (create if no ID, update if ID exists).
     * 
     * @param Category $category
     * @return bool
     */
    public function save(Category $category): bool
    {
        if (!empty($category->getId())) {
            return $this->update($category);
        }

        return $this->create($category);
    }

    /**
     * Creates a new category in the database.
     * 
     * @param Category $category
     * @return bool
     */
    public function create(Category $category): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO {$this->tableName} 
            (name_ar, name_fr, name_en, name_es, name_pt, description_ar, description_fr, description_en, description_es, description_pt) 
            VALUES (:name_ar, :name_fr, :name_en, :name_es, :name_pt, :description_ar, :description_fr, :description_en, :description_es, :description_pt)
        ");

        $success = $stmt->execute([
            ':name_ar' => $category->getNameAr(),
            ':name_fr' => $category->getNameFr(),
            ':name_en' => $category->getNameEn(),
            ':name_es' => $category->getNameEs(),
            ':name_pt' => $category->getNamePt(),
            ':description_ar' => $category->getDescriptionAr(),
            ':description_fr' => $category->getDescriptionFr(),
            ':description_en' => $category->getDescriptionEn(),
            ':description_es' => $category->getDescriptionEs(),
            ':description_pt' => $category->getDescriptionPt(),
        ]);

        if ($success) {
            $category->setId((int) $this->pdo->lastInsertId());
        }

        return $success;
    }

    /**
     * Updates an existing category in the database.
     * 
     * @param Category $category
     * @return bool
     */
    public function update(Category $category): bool
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
            description_pt = :description_pt
            WHERE id = :id
        ");

        return $stmt->execute([
            ':name_ar' => $category->getNameAr(),
            ':name_fr' => $category->getNameFr(),
            ':name_en' => $category->getNameEn(),
            ':name_es' => $category->getNameEs(),
            ':name_pt' => $category->getNamePt(),
            ':description_ar' => $category->getDescriptionAr(),
            ':description_fr' => $category->getDescriptionFr(),
            ':description_en' => $category->getDescriptionEn(),
            ':description_es' => $category->getDescriptionEs(),
            ':description_pt' => $category->getDescriptionPt(),
            ':id' => $category->getId(),
        ]);
    }

    /**
     * Fetches all categories as Category objects.
     * 
     * @return Category[]
     */
    public function findAllAsObjects(): array
    {
        $data = $this->findAll();
        $categories = [];

        foreach ($data as $row) {
            $categories[] = $this->mapToObject($row);
        }

        return $categories;
    }

    /**
     * Fetches a category by ID as a Category object.
     * 
     * @param int $id
     * @return Category|null
     */
    public function findAsObject(int $id): ?Category
    {
        $data = $this->find($id);

        if (!$data) {
            return null;
        }

        return $this->mapToObject($data);
    }

    /**
     * Maps a database row to a Category object.
     * 
     * @param array $data
     * @return Category
     */
    public function mapToObject(array $data): Category
    {
        $category = new Category();
        $category->setId($data['id'] ? (int) $data['id'] : null);
        $category->setNameAr($data['name_ar']);
        $category->setNameFr($data['name_fr']);
        $category->setNameEn($data['name_en']);
        $category->setNameEs($data['name_es']);
        $category->setNamePt($data['name_pt']);
        $category->setDescriptionAr($data['description_ar'] ?? '');
        $category->setDescriptionFr($data['description_fr'] ?? '');
        $category->setDescriptionEn($data['description_en'] ?? '');
        $category->setDescriptionEs($data['description_es'] ?? '');
        $category->setDescriptionPt($data['description_pt'] ?? '');

        return $category;
    }
}
