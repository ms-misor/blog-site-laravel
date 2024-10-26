-- 26-3-2024 --

CREATE TABLE `banners` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(200) NOT NULL , `image_path` TEXT NOT NULL , `created_at` DATE NOT NULL , `updated_at` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `banners` ADD `status` TINYINT(1) NOT NULL DEFAULT '1' AFTER `image_path`;
ALTER TABLE `banners` CHANGE `created_at` `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;


-- 29-3-2024 --

CREATE TABLE `banners_contents` ( `id` INT NOT NULL AUTO_INCREMENT , `image` TEXT NOT NULL , `contents` TEXT NOT NULL , `position` VARCHAR(20) NOT NULL COMMENT 'left or right' , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `about_us` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(200) NOT NULL , `contents` TEXT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `online_contents` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(200) NOT NULL , `link` TEXT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `online_contents` ADD `type` VARCHAR(50) NOT NULL COMMENT 'fee, result rxam info' AFTER `link`;
ALTER TABLE `online_contents` CHANGE `type` `type` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'fee, result, exam';
CREATE TABLE `home_page_arcive` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(200) NOT NULL , `image_path` TEXT NOT NULL , `status` TINYINT(1) NOT NULL DEFAULT '1' , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `all_events` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(200) NOT NULL , `link` TEXT NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `web_settings` ( `id` INT NOT NULL AUTO_INCREMENT , `school_name` VARCHAR(200) NULL DEFAULT NULL , `address` VARCHAR(200) NULL DEFAULT NULL , `school_code` VARCHAR(100) NULL DEFAULT NULL , `logo` TEXT NULL DEFAULT NULL , `phone` VARCHAR(100) NULL DEFAULT NULL , `email` VARCHAR(50) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- Till above , uoloaded to Cpaenl done --

-- 30-9-2024 --

CREATE TABLE `teachers` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(200) NULL DEFAULT NULL , `religion` VARCHAR(50) NULL DEFAULT NULL , `nationality` VARCHAR(50) NULL DEFAULT NULL , `photo` TEXT NULL DEFAULT NULL , `institute_name` VARCHAR(100) NULL DEFAULT NULL , `present_post` VARCHAR(100) NULL DEFAULT NULL , `date_of_birth` DATE NULL DEFAULT NULL , `mobile_number` VARCHAR(20) NULL DEFAULT NULL , `institution_serial_number` VARCHAR(100) NULL DEFAULT NULL , `index_number` VARCHAR(50) NULL DEFAULT NULL , `subject_teacher` VARCHAR(100) NULL DEFAULT NULL , `joining_date` DATE NULL DEFAULT NULL , `blood_group` VARCHAR(20) NULL DEFAULT NULL , `father_name` VARCHAR(100) NULL DEFAULT NULL , `mother_name` VARCHAR(100) NULL DEFAULT NULL , `mailling_address` TEXT NULL DEFAULT NULL , `permanent_address` TEXT NULL DEFAULT NULL , `email` VARCHAR(100) NULL DEFAULT NULL , `sms_mobile` VARCHAR(100) NULL DEFAULT NULL , `create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `create_by` INT(11) NOT NULL , `update_date` DATE NULL DEFAULT NULL , `update_by` INT(11) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `teacher_educations` ( `id` INT NOT NULL AUTO_INCREMENT , `teacher_id` INT NULL DEFAULT NULL COMMENT 'id of teachers table' , `institution_name` VARCHAR(200) NULL DEFAULT NULL , `exam_name` VARCHAR(100) NULL DEFAULT NULL , `passing_year` VARCHAR(20) NULL DEFAULT NULL , `cgpa` DECIMAL(11,2) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- 09-10-2024 --
CREATE TABLE `cms_pages` ( `id` INT NOT NULL AUTO_INCREMENT , `parent_menu` VARCHAR(200) NOT NULL , `menu` VARCHAR(200) NOT NULL , `details` LONGTEXT NULL DEFAULT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` DATETIME NULL DEFAULT NULL , `action_by` INT(11) NULL DEFAULT NULL COMMENT 'who create/update' , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `cms_pages` ADD `page_name` VARCHAR(200) NOT NULL AFTER `id`;
ALTER TABLE `cms_pages` ADD UNIQUE(`menu`);


-- Till above , uoloaded to Cpaenl done --

-- 27-10-2024 --

ALTER TABLE `cms_pages` ADD `attachment_title` VARCHAR(200) NULL DEFAULT NULL COMMENT 'pdf' AFTER `details`, ADD `attachment_path` TEXT NULL DEFAULT NULL COMMENT 'pdf' AFTER `attachment_title`;
