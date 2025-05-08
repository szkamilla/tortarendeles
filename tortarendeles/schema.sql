DROP DATABASE IF EXISTS tortarendeles;
CREATE DATABASE tortarendeles;
USE tortarendeles;

-- Felhasználók
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    is_admin BOOLEAN DEFAULT FALSE
);

-- Rendelési opciók (például piskóta ízek, krémek stb.)
CREATE TABLE options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category ENUM('slice', 'shape', 'flavor', 'cream', 'icing', 'decor') NOT NULL,
    value VARCHAR(100) NOT NULL
);

-- Rendelések
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    slice VARCHAR(50),
    shape VARCHAR(50),
    flavor VARCHAR(50),
    cream VARCHAR(50),
    icing VARCHAR(50),
    decor VARCHAR(50),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

INSERT INTO `users`(`username`, `password`, `is_admin`) VALUES ('minta_klara','123',false);
INSERT INTO `users`(`username`, `password`, `is_admin`) VALUES ('kiss_maria','444',true);

INSERT INTO `orders`(`user_id`, `slice`, `shape`, `flavor`, `cream`, `icing`, `decor`, `order_date`) VALUES (1,'16','circle','vanilla','vanillac','fondant','fruit','2025-01-06');
INSERT INTO `orders`(`user_id`, `slice`, `shape`, `flavor`, `cream`, `icing`, `decor`, `order_date`) VALUES (1,'20','circle','strawberry','vanillac','fondant','fruit','2025-03-11');

INSERT INTO `options`(`category`, `value`) VALUES ('slice', '12');
INSERT INTO `options`(`category`, `value`) VALUES ('slice', '16');
INSERT INTO `options`(`category`, `value`) VALUES ('slice', '20');
INSERT INTO `options`(`category`, `value`) VALUES ('slice', '24');
INSERT INTO `options`(`category`, `value`) VALUES ('slice', '28');
INSERT INTO `options`(`category`, `value`) VALUES ('flavor', 'Vanília');
INSERT INTO `options`(`category`, `value`) VALUES ('flavor', 'Eper');
INSERT INTO `options`(`category`, `value`) VALUES ('flavor', 'Citrom');
INSERT INTO `options`(`category`, `value`) VALUES ('shape', 'Kör');
INSERT INTO `options`(`category`, `value`) VALUES ('shape', 'Kocka');
INSERT INTO `options`(`category`, `value`) VALUES ('shape', 'Téglatest');
INSERT INTO `options`(`category`, `value`) VALUES ('shape', 'Szív');
INSERT INTO `options`(`category`, `value`) VALUES ('icing', 'Vajkrém');
INSERT INTO `options`(`category`, `value`) VALUES ('icing', 'Fondant');
INSERT INTO `options`(`category`, `value`) VALUES ('icing', 'Semmi');
INSERT INTO `options`(`category`, `value`) VALUES ('decor', 'Gyümölcs');
INSERT INTO `options`(`category`, `value`) VALUES ('decor', 'Virág');
INSERT INTO `options`(`category`, `value`) VALUES ('decor', 'Vajkrém');
INSERT INTO `options`(`category`, `value`) VALUES ('decor', 'Habcsók');
INSERT INTO `options`(`category`, `value`) VALUES ('decor', 'Semmi');