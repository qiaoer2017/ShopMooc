CREATE DATABASE IF NOT EXISTS `shop_mooc`;
USE `shop_mooc`;

-- 管理员表
DROP TABLE IF EXISTS `mooc_admin`;
CREATE TABLE `mooc_admin` (
  `id`       TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(20) NOT NULL UNIQUE,
  `password` CHAR(32)    NOT NULL,
  `email`    VARCHAR(50) NOT NULL
);

-- 分类表
DROP TABLE IF EXISTS `mooc_cate`;
CREATE TABLE `mooc_cate` (
  `id`    SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `cName` VARCHAR(50) UNIQUE
);

-- 商品表
DROP TABLE IF EXISTS `mooc_pro`;
CREATE TABLE `mooc_pro` (
  `id`      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `pName`   VARCHAR(50)       NOT NULL  UNIQUE,
  `pSn`     VARCHAR(50)       NOT NULL,
  `pNum`    INT UNSIGNED DEFAULT 1,
  `mPrice`  DECIMAL(10, 2)    NOT NULL,
  `iPrice`  DECIMAL(10, 2)    NOT NULL,
  `pDesc`   TEXT,
  `pImg`    VARCHAR(50)       NOT NULL,
  `pubTime` INT UNSIGNED      NOT NULL,
  `isShow`  TINYINT(1)   DEFAULT 1,
  `isHot`   TINYINT(1)   DEFAULT 0,
  `cId`     SMALLINT UNSIGNED NOT NULL
);

-- 用户表
DROP TABLE IF EXISTS `mooc_user`;
CREATE TABLE `mooc_user` (
  `id`       INT UNSIGNED                   AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(20)           NOT NULL,
  `password` CHAR(32)              NOT NULL,
  `sex`      ENUM ("男", "女", "保密") NOT NULL DEFAULT "保密",
  `face`     VARCHAR(50)           NOT NULL,
  `regTime`  INT UNSIGNED          NOT NULL
);

-- 相册表
DROP TABLE IF EXISTS `mooc_album`;
CREATE TABLE `mooc_album` (
  `id`        INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `pId`       INT UNSIGNED NOT NULL,
  `albumPath` VARCHAR(50)  NOT NULL
);
