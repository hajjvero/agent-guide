<?php

declare(strict_types=1);

namespace Core\Repository;

use Core\Connection\Connection;
use PDO;

/**
 * Class AbstractRepository
 * 
 * Classe de base pour tous les repositories de l'application.
 */
abstract class AbstractRepository
{
    /**
     * @var PDO L'instance de connexion à la base de données.
     */
    protected PDO $pdo;

    /**
     * @var string Le nom de la table associée au repository.
     */
    protected string $tableName;

    /**
     * AbstractRepository constructor.
     * 
     * @param Connection $connection L'instance de connexion à la base de données.
     */
    public function __construct(private readonly Connection $connection)
    {
        $this->pdo = $this->connection->getConnection();
    }

    /**
     * Récupère tous les enregistrements de la table.
     * 
     * @return array
     */
    public function findAll(): array
    {
        return $this->pdo->query("SELECT * FROM {$this->tableName}")->fetchAll();
    }

    /**
     * Récupère un enregistrement par son identifiant.
     * 
     * @param int $id L'identifiant de l'enregistrement.
     * @return array|null
     */
    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch();

        return $result ?: null;
    }

    /**
     * Supprime un enregistrement par son identifiant.
     * 
     * @param int $id L'identifiant de l'enregistrement.
     * @return bool True en cas de succès, false sinon.
     */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->tableName} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        if ($stmt->fetchColumn() === 0) {
            return false;
        }

        $stmt = $this->pdo->prepare("DELETE FROM {$this->tableName} WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
