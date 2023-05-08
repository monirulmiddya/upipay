### DB Schema

```bash

CREATE TABLE `tbl_users`(
    `id` BIGINT(22) NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(14) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `otp` VARCHAR(10) NULL,
    `password` LONGTEXT NOT NULL,
    `status` ENUM("inactive", "active", "blocked") NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;


ALTER TABLE `tbl_users` ADD `upi_id` VARCHAR(50) NOT NULL AFTER `email`, ADD `ip` VARCHAR(20) NOT NULL AFTER `upi_id`;

```
