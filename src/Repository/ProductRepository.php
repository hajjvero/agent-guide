<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Product;
use App\Entity\Category;
use Core\Repository\AbstractRepository;
use DateTime;

/**
 * Class ProductRepository
 * 
 * Handles CRUD operations for Product entity.
 */
class ProductRepository extends AbstractRepository
{
    protected string $tableName = 'product';

    /**
     * Saves a product (create if no ID, update if ID exists).
     * 
     * @param Product $product
     * @return bool
     */
    public function save(Product $product): bool
    {
        if (!empty($product->getId())) {
            return $this->update($product);
        }

        return $this->create($product);
    }

    /**
     * Creates a new product in the database.
     * 
     * @param Product $product
     * @return bool
     */
    public function create(Product $product): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO {$this->tableName} 
            (name_ar, name_fr, name_en, name_es, name_pt, description_ar, description_fr, description_en, description_es, description_pt, price, stock, image, category_id) 
            VALUES (:name_ar, :name_fr, :name_en, :name_es, :name_pt, :description_ar, :description_fr, :description_en, :description_es, :description_pt, :price, :stock, :image, :category_id)
        ");

        $success = $stmt->execute([
            ':name_ar' => $product->getNameAr(),
            ':name_fr' => $product->getNameFr(),
            ':name_en' => $product->getNameEn(),
            ':name_es' => $product->getNameEs(),
            ':name_pt' => $product->getNamePt(),
            ':description_ar' => $product->getDescriptionAr(),
            ':description_fr' => $product->getDescriptionFr(),
            ':description_en' => $product->getDescriptionEn(),
            ':description_es' => $product->getDescriptionEs(),
            ':description_pt' => $product->getDescriptionPt(),
            ':price' => $product->getPrice(),
            ':stock' => $product->getStock(),
            ':image' => $product->getImage(),
            ':category_id' => $product->getCategory() ? $product->getCategory()->getId() : null,
        ]);

        if ($success) {
            $product->setId((int) $this->pdo->lastInsertId());
        }

        return $success;
    }

    /**
     * Updates an existing product in the database.
     * 
     * @param Product $product
     * @return bool
     */
    public function update(Product $product): bool
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
            price = :price,
            stock = :stock,
            image = :image,
            category_id = :category_id
            WHERE id = :id
        ");

        return $stmt->execute([
            ':name_ar' => $product->getNameAr(),
            ':name_fr' => $product->getNameFr(),
            ':name_en' => $product->getNameEn(),
            ':name_es' => $product->getNameEs(),
            ':name_pt' => $product->getNamePt(),
            ':description_ar' => $product->getDescriptionAr(),
            ':description_fr' => $product->getDescriptionFr(),
            ':description_en' => $product->getDescriptionEn(),
            ':description_es' => $product->getDescriptionEs(),
            ':description_pt' => $product->getDescriptionPt(),
            ':price' => $product->getPrice(),
            ':stock' => $product->getStock(),
            ':image' => $product->getImage(),
            ':category_id' => $product->getCategory() ? $product->getCategory()->getId() : null,
            ':id' => $product->getId(),
        ]);
    }

    /**
     * Fetches all products as Product objects.
     * 
     * @return Product[]
     */
    public function findAllAsObjects(): array
    {
        $data = $this->findAll();
        $products = [];

        foreach ($data as $row) {
            $products[] = $this->mapToObject($row);
        }

        return $products;
    }

    /**
     * Fetches a product by ID as a Product object.
     * 
     * @param int $id
     * @return Product|null
     */
    public function findAsObject(int $id): ?Product
    {
        $data = $this->find($id);

        if (!$data) {
            return null;
        }

        return $this->mapToObject($data);
    }

    /**
     * Maps a database row to a Product object.
     * 
     * @param array $data
     * @return Product
     */
    public function mapToObject(array $data): Product
    {
        $product = new Product();
        $product->setId($data['id'] ? (int) $data['id'] : null);
        $product->setNameAr($data['name_ar']);
        $product->setNameFr($data['name_fr']);
        $product->setNameEn($data['name_en']);
        $product->setNameEs($data['name_es']);
        $product->setNamePt($data['name_pt']);
        $product->setDescriptionAr($data['description_ar'] ?? '');
        $product->setDescriptionFr($data['description_fr'] ?? '');
        $product->setDescriptionEn($data['description_en'] ?? '');
        $product->setDescriptionEs($data['description_es'] ?? '');
        $product->setDescriptionPt($data['description_pt'] ?? '');
        $product->setPrice((float) $data['price']);
        $product->setStock((float) $data['stock']);
        $product->setImage($data['image'] ?? '');

        if (isset($data['created_at'])) {
            $product->setCreatedAt(new DateTime($data['created_at']));
        }

        if (isset($data['category_id'])) {
            $category = new Category();
            $category->setId((int) $data['category_id']);
            $product->setCategory($category);
        }

        return $product;
    }
}
