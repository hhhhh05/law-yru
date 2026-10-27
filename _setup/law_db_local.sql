-- ------------------------------------------------------------
-- law-web : โครงสร้างฐานข้อมูลสำหรับรันบนเครื่อง local
-- สร้างจากโค้ดใน app/ และ resources/views (ตรงกับ production มากกว่า migrations เดิม)
-- ถ้ามีไฟล์ dump จริงจากเซิร์ฟเวอร์ law.yru.ac.th ให้ import ไฟล์นั้นแทนไฟล์นี้
-- ------------------------------------------------------------

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ผู้ใช้ ----------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1 = นิติกร, 2 = นักกฎหมาย, NULL = ผู้ใช้ทั่วไป',
  `prefix` varchar(255) DEFAULT NULL,
  `prefix_edu` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `job_position` varchar(255) DEFAULT NULL,
  `academic_position` varchar(255) DEFAULT NULL,
  `board_position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `board_department` varchar(255) DEFAULT NULL,
  `address_present` text DEFAULT NULL,
  `address_permanent` text DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ผู้ใช้ทดสอบสำหรับ local (เข้าใช้ผ่าน /dev-login/1 และ /dev-login/2)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `username`, `status`, `fname`, `lname`, `department`, `created_at`, `updated_at`) VALUES
(1, 'นิติกร ทดสอบ', 'lawofficer@local.test', 'passport_auth', 'local_lawofficer', 1, 'นิติกร', 'ทดสอบ', 'งานนิติการ', NOW(), NOW()),
(2, 'นักกฎหมาย ทดสอบ', 'lawyer@local.test', 'passport_auth', 'local_lawyer', 2, 'นักกฎหมาย', 'ทดสอบ', 'งานนิติการ', NOW(), NOW());

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ประเภทกฎหมาย (t_id ตรงกับที่ FRontendController ใช้) ---------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `t_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `types` (`t_id`, `name_type`, `created_at`, `updated_at`) VALUES
(1, 'คำสั่ง', NOW(), NOW()),
(2, 'รัฐธรรมนูญ', NOW(), NOW()),
(3, 'พระราชบัญญัติ', NOW(), NOW()),
(4, 'พระราชกำหนด', NOW(), NOW()),
(5, 'พระราชกฤษฎีกา', NOW(), NOW()),
(6, 'กฎกระทรวง', NOW(), NOW()),
(7, 'ระเบียบ', NOW(), NOW()),
(8, 'ข้อบังคับ', NOW(), NOW()),
(9, 'ประกาศ', NOW(), NOW()),
(10, 'ประกาศกระทรวง', NOW(), NOW()),
(11, 'แนวปฏิบัติ', NOW(), NOW()),
(12, 'อื่นๆ', NOW(), NOW());

DROP TABLE IF EXISTS `names`;
CREATE TABLE `names` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- กฎหมาย -----------------------------------------------------------
-- stutas: 0 = รอตรวจ, 1/2 = เผยแพร่แล้ว (หน้าเว็บแสดงเฉพาะ 1-2)
DROP TABLE IF EXISTS `laws`;
CREATE TABLE `laws` (
  `law_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id_check` bigint(20) UNSIGNED DEFAULT NULL,
  `offer` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `name_id` text DEFAULT NULL COMMENT 'เรื่อง',
  `law_name` text DEFAULT NULL COMMENT 'ชื่อ',
  `year` varchar(10) DEFAULT NULL,
  `file_law` text DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `date_announce` date DEFAULT NULL,
  `stutas` int(11) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`law_id`),
  KEY `laws_type_index` (`type`),
  KEY `laws_stutas_index` (`stutas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ตัวอย่างข้อมูล 1 รายการ (ลบทิ้งได้)
INSERT INTO `laws` (`user_id`, `offer`, `type`, `name_id`, `law_name`, `year`, `file_law`, `date_out`, `date_announce`, `stutas`, `created_at`, `updated_at`) VALUES
(1, 'เสนอมหาวิทยาลัย', '9', 'ตัวอย่างเรื่อง (ข้อมูลทดสอบ local)', 'ประกาศตัวอย่างสำหรับทดสอบระบบ', '2569', '', CURDATE(), CURDATE(), 1, NOW(), NOW());

-- สถานะเอกสาร (ใช้ join ใน LawyerController) ---------------------------
DROP TABLE IF EXISTS `stutas`;
CREATE TABLE `stutas` (
  `id` int(11) NOT NULL,
  `stutas_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `stutas` (`id`, `stutas_name`) VALUES
(1, 'เผยแพร่ / ตรวจแล้ว'),
(2, 'ยกเลิก'),
(3, 'รอตรวจ'),
(4, 'ส่งกลับแก้ไข');

-- บันทึกว่า migrations เดิมถูกรันแล้ว จะได้ไม่สร้างตารางซ้ำ ----------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2019_08_19_000000_create_failed_jobs_table', 1),
('2021_06_07_073731_create_laws_table', 1),
('2021_06_21_032520_create_names_table', 1),
('2021_06_25_071608_create_types_table', 1),
('2021_07_06_031809_add_columns_to_users_table', 1);

SET FOREIGN_KEY_CHECKS = 1;
