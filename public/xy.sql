# Host: localhost  (Version: 5.5.53)
# Date: 2019-11-12 21:53:32
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "xy_brand"
#

DROP TABLE IF EXISTS `xy_brand`;
CREATE TABLE `xy_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  `number` varchar(255) DEFAULT NULL COMMENT '货号',
  `pic` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `type` tinyint(3) DEFAULT '1' COMMENT '1：衣服；2：裤子；3：鞋子；4：配饰；5：其他',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='品牌款式表';

#
# Structure for table "xy_clothe"
#

DROP TABLE IF EXISTS `xy_clothe`;
CREATE TABLE `xy_clothe` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `name` varchar(255) DEFAULT NULL COMMENT '下单人',
  `number` varchar(255) DEFAULT NULL COMMENT '订单编号',
  `brand_id` int(11) DEFAULT NULL COMMENT '款式id',
  `size` varchar(255) DEFAULT NULL COMMENT '尺码',
  `mobile` varchar(255) DEFAULT NULL COMMENT '下单人手机号',
  `province` int(11) DEFAULT NULL COMMENT '省',
  `city` int(11) DEFAULT NULL COMMENT '市',
  `area` int(11) DEFAULT NULL COMMENT '区域',
  `address` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `ship` varchar(255) DEFAULT NULL COMMENT '快递',
  `ship_num` varchar(255) DEFAULT NULL COMMENT '运单编号',
  `buy_price` decimal(10,2) DEFAULT NULL COMMENT '成本',
  `sale_price` decimal(10,2) DEFAULT NULL COMMENT '出手价',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='衣服订单表';

#
# Structure for table "xy_menu"
#

DROP TABLE IF EXISTS `xy_menu`;
CREATE TABLE `xy_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='菜单表';

#
# Structure for table "xy_menu_role"
#

DROP TABLE IF EXISTS `xy_menu_role`;
CREATE TABLE `xy_menu_role` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='角色菜单表';

#
# Structure for table "xy_role"
#

DROP TABLE IF EXISTS `xy_role`;
CREATE TABLE `xy_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='角色表';

#
# Structure for table "xy_shoe"
#

DROP TABLE IF EXISTS `xy_shoe`;
CREATE TABLE `xy_shoe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `brand_id` int(11) DEFAULT NULL COMMENT '品牌id',
  `shop_type` varchar(255) DEFAULT NULL COMMENT '购入平台',
  `size` varchar(255) DEFAULT NULL COMMENT '尺码',
  `buy_price` decimal(10,2) DEFAULT NULL COMMENT '入手价',
  `sale_price` decimal(10,2) DEFAULT NULL COMMENT '出手价',
  `ship_num` varchar(255) DEFAULT NULL COMMENT '运单号',
  `ship_fee` decimal(10,2) DEFAULT NULL COMMENT '运费',
  `sale_time` int(11) DEFAULT NULL COMMENT '出手时间',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='球鞋订单表';

#
# Structure for table "xy_user"
#

DROP TABLE IF EXISTS `xy_user`;
CREATE TABLE `xy_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(500) DEFAULT NULL COMMENT '密码',
  `role_id` int(11) DEFAULT NULL COMMENT '角色id',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `headimg` varchar(255) DEFAULT NULL COMMENT '头像',
  `user_type` tinyint(3) DEFAULT NULL COMMENT '1:admin;2:普通会员',
  `last_login_ip` varchar(255) DEFAULT NULL COMMENT '上次登录ip地址',
  `last_login_time` int(11) DEFAULT NULL COMMENT '上次登录时间',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='管理员表';
