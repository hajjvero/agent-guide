-- Database Selection (Optional, uncomment if needed)
CREATE DATABASE IF NOT EXISTS agent_guide;
USE agent_guide;

-- Table: ville
CREATE TABLE IF NOT EXISTS `ville` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name_ar` VARCHAR(255) NOT NULL,
    `name_fr` VARCHAR(255) NOT NULL,
    `name_en` VARCHAR(255) NOT NULL,
    `name_es` VARCHAR(255) NOT NULL,
    `name_pt` VARCHAR(255) NOT NULL,
    `description_ar` TEXT NOT NULL,
    `description_fr` TEXT NOT NULL,
    `description_en` TEXT NOT NULL,
    `description_es` TEXT NOT NULL,
    `description_pt` TEXT NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: category
CREATE TABLE IF NOT EXISTS `category` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name_ar` VARCHAR(255) NOT NULL,
    `name_fr` VARCHAR(255) NOT NULL,
    `name_en` VARCHAR(255) NOT NULL,
    `name_es` VARCHAR(255) NOT NULL,
    `name_pt` VARCHAR(255) NOT NULL,
    `description_ar` TEXT NULL,
    `description_fr` TEXT NULL,
    `description_en` TEXT NULL,
    `description_es` TEXT NULL,
    `description_pt` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: activite
CREATE TABLE IF NOT EXISTS `activite` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title_ar` VARCHAR(255) NOT NULL,
    `title_fr` VARCHAR(255) NOT NULL,
    `title_en` VARCHAR(255) NOT NULL,
    `title_es` VARCHAR(255) NOT NULL,
    `title_pt` VARCHAR(255) NOT NULL,
    `description_ar` TEXT NOT NULL,
    `description_fr` TEXT NOT NULL,
    `description_en` TEXT NOT NULL,
    `description_es` TEXT NOT NULL,
    `description_pt` TEXT NOT NULL,
    `price` FLOAT NOT NULL,
    `duration` VARCHAR(255) NOT NULL,
    `rating` FLOAT NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `ville_id` INT NOT NULL,
    CONSTRAINT `fk_activite_ville` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: logement
CREATE TABLE IF NOT EXISTS `logement` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name_ar` VARCHAR(255) NOT NULL,
    `name_fr` VARCHAR(255) NOT NULL,
    `name_en` VARCHAR(255) NOT NULL,
    `name_es` VARCHAR(255) NOT NULL,
    `name_pt` VARCHAR(255) NOT NULL,
    `type` VARCHAR(50) NOT NULL, -- LogementTypeEnum
    `price_per_night` FLOAT NOT NULL,
    `description_ar` TEXT NOT NULL,
    `description_fr` TEXT NOT NULL,
    `description_en` TEXT NOT NULL,
    `description_es` TEXT NOT NULL,
    `description_pt` TEXT NOT NULL,
    `rating` FLOAT NOT NULL,
    `whatsapp_number` VARCHAR(50) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `ville_id` INT NOT NULL,
    CONSTRAINT `fk_logement_ville` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: chauffeur
-- Inherits from Person (flattened table for simplicity as it extends abstract Person)
CREATE TABLE IF NOT EXISTS `chauffeur` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `full_name_ar` VARCHAR(255) NOT NULL,
    `full_name_fr` VARCHAR(255) NOT NULL,
    `full_name_en` VARCHAR(255) NOT NULL,
    `full_name_es` VARCHAR(255) NOT NULL,
    `full_name_pt` VARCHAR(255) NOT NULL,
    `whatsapp_number` VARCHAR(50) DEFAULT NULL,
    `languages` VARCHAR(255) NOT NULL,
    `vehicle_type` VARCHAR(255) NOT NULL,
    `price_per_day` FLOAT NOT NULL,
    `rating` FLOAT NOT NULL,
    `image` VARCHAR(255) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `ville_id` INT NOT NULL,
    CONSTRAINT `fk_chauffeur_ville` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: restaurant
CREATE TABLE IF NOT EXISTS `restaurant` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name_ar` VARCHAR(255) NOT NULL,
    `name_fr` VARCHAR(255) NOT NULL,
    `name_en` VARCHAR(255) NOT NULL,
    `name_es` VARCHAR(255) NOT NULL,
    `name_pt` VARCHAR(255) NOT NULL,
    `cuisine_type` VARCHAR(255) NOT NULL,
    `description_ar` TEXT NOT NULL,
    `description_fr` TEXT NOT NULL,
    `description_en` TEXT NOT NULL,
    `description_es` TEXT NOT NULL,
    `description_pt` TEXT NOT NULL,
    `price_range` VARCHAR(50) NOT NULL,
    `rating` FLOAT NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `ville_id` INT NOT NULL,
    CONSTRAINT `fk_restaurant_ville` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: product
CREATE TABLE IF NOT EXISTS `product` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name_ar` VARCHAR(255) NOT NULL,
    `name_fr` VARCHAR(255) NOT NULL,
    `name_en` VARCHAR(255) NOT NULL,
    `name_es` VARCHAR(255) NOT NULL,
    `name_pt` VARCHAR(255) NOT NULL,
    `description_ar` TEXT NOT NULL,
    `description_fr` TEXT NOT NULL,
    `description_en` TEXT NOT NULL,
    `description_es` TEXT NOT NULL,
    `description_pt` TEXT NOT NULL,
    `price` FLOAT NOT NULL,
    `stock` FLOAT NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `category_id` INT NOT NULL,
    CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table: user
-- Inherits from Person (flattened table)
CREATE TABLE IF NOT EXISTS `user` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `full_name_ar` VARCHAR(255) NOT NULL,
    `full_name_fr` VARCHAR(255) NOT NULL,
    `full_name_en` VARCHAR(255) NOT NULL,
    `full_name_es` VARCHAR(255) NOT NULL,
    `full_name_pt` VARCHAR(255) NOT NULL,
    `whatsapp_number` VARCHAR(50) DEFAULT NULL,
    `languages` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL UNIQUE,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('admin', 'customer') NOT NULL DEFAULT 'customer',
    `image` VARCHAR(255) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
