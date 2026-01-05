<?php

declare(strict_types=1);

namespace Core\Connection;

use PDO;
use PDOException;

/**
 * Class Connection
 * 
 * Gère la connexion à la base de données MySQL via PDO.
 */
class Connection
{
    /**
     * @var PDO|null L'instance unique de PDO.
     */
    private static ?PDO $instance = null;

    /**
     * Retourne une instance de PDO pour la connexion à la base de données.
     *
     * @param string $host L'hôte de la base de données.
     * @param string $db Le nom de la base de données.
     * @param string $user L'utilisateur.
     * @param string $pass Le mot de passe.
     * @param string $charset L'encodage (par défaut utf8mb4).
     * @return PDO
     * @throws PDOException Si la connexion échoue.
     */
    public static function getPDO(
        string $host = 'localhost',
        string $db = 'agent_guide',
        string $user = 'root',
        string $pass = '',
        string $charset = 'utf8mb4'
    ): PDO {
        if (self::$instance === null) {
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int) $e->getCode());
            }
        }

        return self::$instance;
    }

    /**
     * Empêche l'instanciation de la classe.
     */
    private function __construct()
    {
    }

    /**
     * Empêche le clonage de l'instance.
     */
    private function __clone()
    {
    }
}
