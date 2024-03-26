-- 26-3-2024 --

CREATE TABLE `laravel_web`.`banners` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(200) NOT NULL , `image_path` TEXT NOT NULL , `created_at` DATE NOT NULL , `updated_at` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `banners` ADD `status` TINYINT(1) NOT NULL DEFAULT '1' AFTER `image_path`;
ALTER TABLE `banners` CHANGE `created_at` `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;
