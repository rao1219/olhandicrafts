# coursework
Very Simple Renting Platform

----
## 前端
库用的bootstrap，前端状态如下：


```flow
				
						   	      +----------------+	
						      +--->crafts require  <-----------------------------+
		                      |   +----------------+							 |
						      | 											     |
						      |	  +----------------+		                     | 
						      +--->crafts overview |	   +---------------+     |
						      |   +----------------+  +---->publish needs  +--(json)
	+-------+                 |						  |	   +---------------+    
	|       |    			  |                       |
	| index |  			      |   +---------------+   |	   +---------------+
	|       +--(login/regist)-+--->user management+---+----> profile	   |
	+---+---+  	 		      |   +---------------+   |	   +---------------+
						      |                       |	
						      |						  |    +--------------+
						      |                       +----> my orders    |
						      |   +---------------+		   +--------------+
						      +--->product detail |
						 	      +---------------+

```		
+ 此图只表明网页/状态之间的相关关系，并不能描述所有的路由和跳转规则。
+ 试图将不同网页公用模板表示在一起。例如用户信息管理如果是可修改状态则可用于修改当前用户资料，否则用于显示他人资料。

## 后端
使用php的lavavrel框架完成，为RESTful服务器
提供

+ 用户管理  
+ 订单管理  
+ 需求管理  
+ Session management   


SQL：
```sql

create database crafts;

/* 会员表 */
CREATE TABLE IF NOT EXISTS `member` 
(
	id int primary key auto_increment,
	username varchar(100) not NULL unique,
	email varchar(100) not null unique,
	password varchar(100) not NULL,
	headpic varchar(100) default '/images/head/0.jpg',
	name varchar(20),
	gender tinyint not null default 0 comment '0:男 1:女',
	saverage int not null default 0,
	sbad int not null default 0,
	name varchar(20),
	phone varchar(20),
	qq varchar(15)，
	intro varchar(1024) comment '其他介绍'
)DEFAULT CHARSET=utf8;


/* 用户需求表 */
CREATE TABLE IF NOT EXISTS `requireTable` 
(
	id int primary key auto_increment,
	uid int not null comment '所属用户',
	name varchar(100) comment '产品表名',
	info text comment '信息项目'
)DEFAULT CHARSET=utf8;


/* 产品信息表 */
CREATE TABLE IF NOT EXISTS `product` 
(
	id int primary key auto_increment,
	mid int not null comment '所属产品表',
	title varchar(100) comment '产品名称可检索',
	info text comment '产品序列化信息'
)DEFAULT CHARSET=utf8;

```

## 开发工具

+ 包管理：bower，方便高德地图/discuz等第三方库和API的打包，写成脚本方便安装
+ 构造工具：Grunt，方便服务器部署，统一编译，作为静态文件发布
+ 版本控制： Git，便于版本回退和多人合作


