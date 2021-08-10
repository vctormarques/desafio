SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imposto` decimal(8, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'Bebidas', 5.00, '2021-08-10 02:10:41', '2021-08-10 02:10:41');
INSERT INTO `categorias` VALUES (2, 'Carnes', 15.00, '2021-08-10 02:10:55', '2021-08-10 02:10:55');
INSERT INTO `categorias` VALUES (3, 'Eletrônicos', 5.00, '2021-08-10 02:11:16', '2021-08-10 02:11:16');
INSERT INTO `categorias` VALUES (4, 'Frutas', 1.00, '2021-08-10 02:38:07', '2021-08-10 02:38:07');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2021_08_09_172047_create_categorias_table', 1);
INSERT INTO `migrations` VALUES (2, '2021_08_09_172319_create_produtos_table', 1);
INSERT INTO `migrations` VALUES (3, '2021_08_09_194705_create_vendas', 2);
INSERT INTO `migrations` VALUES (4, '2021_08_09_195423_create_produto_vendas_table', 2);

-- ----------------------------
-- Table structure for produto_vendas
-- ----------------------------
DROP TABLE IF EXISTS `produto_vendas`;
CREATE TABLE `produto_vendas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produto_id` int(10) UNSIGNED NOT NULL,
  `quantidade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_total` decimal(8, 2) NOT NULL,
  `valor_imposto` decimal(8, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `vendas_id` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `produto_vendas_produto_id_foreign`(`produto_id`) USING BTREE,
  CONSTRAINT `produto_vendas_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produto_vendas
-- ----------------------------
INSERT INTO `produto_vendas` VALUES (1, 1, '5', 50.00, 52.50, '2021-08-10 02:12:12', '2021-08-10 02:12:12', 1);
INSERT INTO `produto_vendas` VALUES (2, 4, '2', 184.00, 211.60, '2021-08-10 02:12:22', '2021-08-10 02:12:22', 1);
INSERT INTO `produto_vendas` VALUES (3, 3, '2', 104.00, 119.60, '2021-08-10 02:12:27', '2021-08-10 02:12:27', 1);
INSERT INTO `produto_vendas` VALUES (4, 2, '2', 1048.00, 1100.40, '2021-08-10 02:19:51', '2021-08-10 02:19:51', 1);
INSERT INTO `produto_vendas` VALUES (5, 1, '15', 150.00, 157.50, '2021-08-10 02:21:46', '2021-08-10 02:21:46', 2);
INSERT INTO `produto_vendas` VALUES (6, 4, '2', 184.00, 211.60, '2021-08-10 02:32:07', '2021-08-10 02:32:07', 3);
INSERT INTO `produto_vendas` VALUES (7, 4, '4', 368.00, 423.20, '2021-08-10 02:37:38', '2021-08-10 02:37:38', 4);

-- ----------------------------
-- Table structure for produtos
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(8, 2) NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `produtos_categoria_id_foreign`(`categoria_id`) USING BTREE,
  CONSTRAINT `produtos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO `produtos` VALUES (1, 'Cerveja', 10.00, 1, '2021-08-10 02:11:28', '2021-08-10 02:11:28');
INSERT INTO `produtos` VALUES (2, 'Monitor', 524.00, 3, '2021-08-10 02:11:36', '2021-08-10 02:11:36');
INSERT INTO `produtos` VALUES (3, 'Prime Rib', 52.00, 2, '2021-08-10 02:11:50', '2021-08-10 02:11:50');
INSERT INTO `produtos` VALUES (4, 'Picanha', 92.00, 2, '2021-08-10 02:12:02', '2021-08-10 02:12:02');

-- ----------------------------
-- Table structure for vendas
-- ----------------------------
DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vendas
-- ----------------------------
INSERT INTO `vendas` VALUES (1, 'F', '2021-08-10 02:12:06', '2021-08-10 02:21:37');
INSERT INTO `vendas` VALUES (2, 'A', '2021-08-10 02:21:42', '2021-08-10 02:21:42');
INSERT INTO `vendas` VALUES (3, 'A', '2021-08-10 02:32:01', '2021-08-10 02:32:01');
INSERT INTO `vendas` VALUES (4, 'F', '2021-08-10 02:37:30', '2021-08-10 02:37:40');

SET FOREIGN_KEY_CHECKS = 1;
