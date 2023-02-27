CREATE DATABASE IF NOT EXISTS `ecommerce`;

USE `ecommerce`;

CREATE TABLE IF NOT EXISTS products(
    id  INT(100) AUTO_INCREMENT NOT NULL,
    name    VARCHAR(75) NOT NULL,
    description TEXT,
    price DECIMAL(20,2),
    created_at DATETIME DEFAULT NULL,
    updated_at  DATETIME DEFAULT NULL,
    CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Adidas Yeezy Boost 700', 'Tenis Adidas Yeezy 700 con boost', '3500.20', '2023-02-27 02:44:51', '2023-02-27 02:44:51'),
(2, 'Adidas Pulsera', 'Pulsera de la marca adidas', '94.50', '2023-02-27 02:45:22', '2023-02-27 02:45:22'),
(3, 'Under Armour Reloj', 'Reloj de la marca under armour', '1500.54', '2023-02-27 02:46:14', '2023-02-27 02:46:14'),
(4, 'Audifonos Sony', 'Audífonos recomendados de la marca Sony', '240.00', '2023-02-27 02:46:41', '2023-02-27 02:46:41'),
(5, 'Audifonos inalambricos JBL', 'Buenos audifonos de la marca JBL', '810.00', '2023-02-27 02:47:06', '2023-02-27 02:47:06');
COMMIT;