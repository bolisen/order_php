# Host: localhost  (Version: 5.5.53)
# Date: 2019-11-12 21:53:32
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# 管理员/用户相关
# Structure for table "xy_user"
#

DROP TABLE IF EXISTS `xy_user`;
CREATE TABLE `xy_user` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `username`                 varchar(255)                DEFAULT NULL                COMMENT '登录名',
  `password`                 varchar(255)                DEFAULT NULL                COMMENT '密码',
  `user_type`                int(2)                      DEFAULT NULL                COMMENT '用户类型（1：admin;2：商家；3：用户）',
  `nickname`                 varchar(255)                DEFAULT NULL                COMMENT '昵称',
  `realname`                 varchar(255)                DEFAULT NULL                COMMENT '真实姓名',
  `openid`                   varchar(255)                DEFAULT NULL                COMMENT 'openid',
  `unionid`                  varchar(255)                DEFAULT NULL                COMMENT 'unid',
  `sex`                      int(2)                      DEFAULT 0                   COMMENT '性别（0：未知；1：男；2：女；）',
  `avatar`                   varchar(255)                DEFAULT NULL                COMMENT '头像',
  `birth`                    varchar(255)                DEFAULT NULL                COMMENT '生日',
  `email`                    varchar(255)                DEFAULT NULL                COMMENT '邮箱',
  `mobile`                   varchar(255)                DEFAULT NULL                COMMENT '手机号',
  `role_id`                  integer(11)                 DEFAULT NULL                COMMENT '角色id',
  `last_login_time`          integer(11)                 DEFAULT NULL                COMMENT '上次登陆时间',
  `last_login_ip`            varchar(255)                DEFAULT NULL                COMMENT '上次登陆ip',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

#
# Structure for table "xy_role"
#

DROP TABLE IF EXISTS `xy_role`;
CREATE TABLE `xy_role` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `role_name`                varchar(255)                DEFAULT NULL                COMMENT '名称',
  `role_key`                 varchar(255)                DEFAULT NULL                COMMENT '角色标识符',
  `role_sort`                varchar(255)                DEFAULT NULL                COMMENT '排序',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='后台管理员角色表';

#
# Structure for table "xy_menu"
#

DROP TABLE IF EXISTS `xy_menu`;
CREATE TABLE `xy_menu` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `menu_name`                varchar(255)                DEFAULT NULL                COMMENT '名称',
  `pid`                      int(11)                     DEFAULT NULL                COMMENT '父级id',
  `menu_sort`                int(11)                     DEFAULT 0                   COMMENT '排序',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `path`                     varchar(255)                DEFAULT NULL                COMMENT '路由地址',
  `component`                varchar(255)                DEFAULT NULL                COMMENT '组件路径',
  `is_frame`                 int(11)                     DEFAULT NULL                COMMENT '是否外链：0-1',
  `menu_type`                int(11)                     DEFAULT NULL                COMMENT '菜单类型（1-目录；2-菜单；3-按钮）',
  `perms`                    varchar(255)                DEFAULT NULL                COMMENT '权限标识',
  `icon`                     varchar(255)                DEFAULT NULL                COMMENT '菜单图表',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='后台管理员菜单表';

#
# Structure for table "xy_role_menu"
#

DROP TABLE IF EXISTS `xy_role_menu`;
CREATE TABLE `xy_role_menu` (
  `role_id`                  int(11)                      NOT NULL                COMMENT '角色id',
  `menu_id`                  int(11)                      NOT NULL                COMMENT '菜单id',
   PRIMARY KEY (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='角色和菜单关联表';


#
# 商品相关
# Structure for table "xy_product_type"
#

DROP TABLE IF EXISTS `xy_product_type`;
CREATE TABLE `xy_product_type` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `pid`                      int(11)                     DEFAULT NULL                COMMENT '父级id',
  `name`                     varchar(255)                DEFAULT NULL                COMMENT '名称',
  `path`                     varchar(255)                DEFAULT NULL                COMMENT '路径',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='商品分类表';

#
# Structure for table "xy_product"
#

DROP TABLE IF EXISTS `xy_product`;
CREATE TABLE `xy_product` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `name`                     varchar (255)               DEFAULT NULL                COMMENT '商品名称',
  `pro_no`                   varchar (500)               DEFAULT NULL                COMMENT '商品编号',
  `theme_img`                varchar (400)               DEFAULT NULL                COMMENT '主图',
  `img`                      varchar (4000)              DEFAULT NULL                COMMENT '附图',
  `type_id`                  int(11)                     DEFAULT NULL                COMMENT '商品分类',
  `desc`                     varchar(1000)               DEFAULT NULL                COMMENT '描述',
  `brand_id`                 int(11)                     DEFAULT NULL                COMMENT '品牌id',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='商品表';

#
# Structure for table "xy_product_sku"
#

DROP TABLE IF EXISTS `xy_product_sku`;
CREATE TABLE `xy_product_sku` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `pro_id`                   int(11)                     DEFAULT NULL                COMMENT '商品id',
  `properties`               varchar (255)               DEFAULT NULL                COMMENT '商品属性',
  `price`                    int(11)                     DEFAULT NULL                COMMENT '价格',
  `cost`                     int(11)                     DEFAULT NULL                COMMENT '成本',
  `discount`                 double(10,2)                DEFAULT 1                   COMMENT '折扣',
  `stock`                    int(11)                     DEFAULT 0                   COMMENT '库存',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='商品规格表';

#
# Structure for table "xy_brand"
#

DROP TABLE IF EXISTS `xy_brand`;
CREATE TABLE `xy_brand` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `name`                     varchar (255)               DEFAULT NULL                COMMENT '名称',
  `img_url`                  varchar (255)               DEFAULT NULL                COMMENT '图片',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='品牌表';

#
# Structure for table "xy_shop"
#

DROP TABLE IF EXISTS `xy_shop`;
CREATE TABLE `xy_shop` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `user_id`                  int(11)                     DEFAULT NULL                COMMENT '用户id',
  `pro_id`                   int(11)                     DEFAULT NULL                COMMENT '商品id',
  `num`                      int(11)                     DEFAULT NULL                COMMENT '商品数量',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='购物车表';


#
# 订单相关
# Structure for table "xy_order"
#

DROP TABLE IF EXISTS `xy_order`;
CREATE TABLE `xy_order` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `order_no`                 varchar (255)               DEFAULT NULL                COMMENT '订单编号（当前时间+用户id）',
  `user_id`                  int(11)                     DEFAULT NULL                COMMENT '下单人',
  `order_status`             int(3)                      DEFAULT NULL                COMMENT '订单状态（1：未付款；2：已付款；3：已发货；4：取消交易）',
  `product_cost`             int(11)                     DEFAULT NULL                COMMENT '订单成本价',
  `product_total`            int(11)                     DEFAULT NULL                COMMENT '订单标价',
  `order_total`              int(11)                     DEFAULT NULL                COMMENT '订单支付价',
  `order_time`               int(11)                     DEFAULT NULL                COMMENT '下单时间',
  `Logistics_type`           int(3)                      DEFAULT NULL                COMMENT '物流类型（1：顺丰；2：韵达；）',
  `Logistics_no`             varchar (255)               DEFAULT NULL                COMMENT '物流单号',
  `Logistics_fee`            int(11)                     DEFAULT NULL                COMMENT '运费',
  `receive_name`             varchar (255)               DEFAULT NULL                COMMENT '收货人姓名',
  `receive_mobile`           varchar (255)               DEFAULT NULL                COMMENT '收货人手机号',
  `province`                 int(11)                     DEFAULT NULL                COMMENT '省',
  `city`                     int(11)                     DEFAULT NULL                COMMENT '市',
  `area`                     int(11)                     DEFAULT NULL                COMMENT '区',
  `address`                  varchar (400)               DEFAULT NULL                COMMENT '详细地址',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='订单表';

#
# Structure for table "xy_order_product"
#

DROP TABLE IF EXISTS `xy_order_product`;
CREATE TABLE `xy_order_product` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `order_id`                 int(11)                     DEFAULT NULL                COMMENT '订单id',
  `pro_id`                   int(11)                     DEFAULT NULL                COMMENT '商品id',
  `num`                      int(11)                     DEFAULT NULL                COMMENT '数量',
  `buy_price`                int(11)                     DEFAULT NULL                COMMENT '购入价',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='订单商品表';

#
# Structure for table "xy_delivery_address"
#

DROP TABLE IF EXISTS `xy_delivery_address`;
CREATE TABLE `xy_delivery_address` (
  `id`                       int(11)                     NOT NULL                    AUTO_INCREMENT,
  `user_id`                  int(11)                     DEFAULT NULL                COMMENT '用户id',
  `name`                     varchar (255)               DEFAULT NULL                COMMENT '收货人姓名',
  `mobile`                   varchar (255)               DEFAULT NULL                COMMENT '手机号',
  `province`                 int(11)                     DEFAULT NULL                COMMENT '省',
  `city`                     int(11)                     DEFAULT NULL                COMMENT '市',
  `area`                     int(11)                     DEFAULT NULL                COMMENT '区',
  `address`                  varchar (400)               DEFAULT NULL                COMMENT '详细地址',
  `remark`                   varchar(255)                DEFAULT NULL                COMMENT '备注',
  `is_del`                   int(1)                      DEFAULT 0                   COMMENT '是否删除：0-1',
  `cid`                      int(11)                     DEFAULT NULL                COMMENT '创建人',
  `create_time`              int(11)                     DEFAULT NULL                COMMENT '创建时间',
  `uid`                      int(11)                     DEFAULT NULL                COMMENT '更新人',
  `update_time`              int(11)                     DEFAULT NULL                COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='收货地址表';
