/*
    需要库分析：本身借助crm本身的员工信息，但是本身独立库，不和crm一起用，在添加员工和修改密码的时候，做一个接口
    需要的表分析：
    1 员工表 已存在，登录信息，可以在crm后台添加员工的时候做一个接口，一
    2 问题表
    



*/

-- 创建数据库

DROP DATABASE IF EXISTS exam;
CREATE DATABASE IF NOT EXISTS exam DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
use `test`;
-- 员工表
DROP TABLE IF EXISTS `cfg_login_account_list`;
CREATE TABLE `cfg_login_account_list`(
    `user_id` INT(11) AUTO_INCREMENT,
    `user_name` VARCHAR(128) NOT NULL DEFAULT '',
    `pwd` VARCHAR(50) NOT NULL DEFAULT '',
    `region_id` INT(11) NOT NULL DEFAULT '0',
    `dept_id` INT(11) NOT NULL DEFAULT '0',
    `is_admin` TINYINT(4) NOT NULL DEFAULT '0', 
    `is_delete` TINYINT(4) NOT null DEFAULT '0',
    PRIMARY KEY(`user_id`)
)Engine='InnoDB' CHARSET='utf8';

-- 部门表
DROP TABLE IF EXISTS `cfg_department`;
CREATE TABLE `cfg_department`(
    `dept_id` INT(11) AUTO_INCREMENT,
    `dept_name` VARCHAR(128) NOT NULL DEFAULT '',
    PRIMARY KEY(`dept_id`)
)Engine='InnoDB' CHARSET='utf8';
 
-- 任务表
DROP TABLE IF EXISTS `task_list`;
CREATE TABLE `task_list`(
    `task_id` INT(11) AUTO_INCREMENT,
    `task_name` VARCHAR(128) NOT NULL DEFAULT '' COMMENT '任务名称',
    `task_content` VARCHAR(1024) NOT NULL DEFAULT '' COMMENT '任务内容',
    `task_status` TINYINT(4)  NOT NULL DEFAULT '0' COMMENT '任务状态 1 未读 5 已读',
    `receivor` INT(11) NOT NULL DEFAULT '0' COMMENT '接收人',
    `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
    `created` TIMESTAMP NOT NULL DEFAULT '0000-00-00',
    PRIMARY KEY(`task_id`)
)Engine='InnoDB' CHARSET='utf8';
