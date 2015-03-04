CREATE TABLE `thinkphp`.`tbl_agents_albums` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '相册图片id',
  `agentid` INT NOT NULL COMMENT '商户id',
  `options` INT NOT NULL COMMENT '相册选项\n1-默认(商户执照等)\n2-店铺相册',
  `optionsvalue` INT NULL COMMENT 'options == 1 : value 为空\noptions == 2 : value 为店铺id',
  `imgpath` VARCHAR(45) NOT NULL COMMENT '图片路径',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));
