/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : myblog

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2022-03-14 11:08:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(250) NOT NULL,
  `intime` int(250) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('5', '大萨达', '1644843936', '党史的撒');
INSERT INTO `article` VALUES ('6', '实打实大', '1644844240', '是的撒');
INSERT INTO `article` VALUES ('7', '实打实大', '1644844244', '是的撒');
INSERT INTO `article` VALUES ('8', '实打实大', '1644844408', '是的撒');
INSERT INTO `article` VALUES ('10', 'cont123ent', '1644844499', 'title');
INSERT INTO `article` VALUES ('12', '我是买到的小行家', '1644849763', '啦啦啦');
INSERT INTO `article` VALUES ('13', '呀呀呀呀呀!!!忘了给文章加时间了,不知道时间还来不来得及!!!', '1644851304', '尝试在后台添加文章');
INSERT INTO `article` VALUES ('14', '没把博客页面安排好,改为php文件后,再添加或大幅度修改页面有点困难了(英语太难了),所以把首页当做退出登录的工具了,可以用来测试cookie.', '1644856340', '哈哈哈,cookie效果over!');
INSERT INTO `article` VALUES ('15', '之前是自己输入名字,和登录一毛钱关系都没有,现在弄了一下(简单),不能自己输入名字了,和你注册时的用户名一致,使用了cookie,还有CSDN\r\nYYDS!!!', '1644857091', '用cookie修改了一下留言板功能');
INSERT INTO `article` VALUES ('16', '........input没法传递默认的value值.....凸(艹皿艹 )!!!', '1644857498', '失.....失败了');
INSERT INTO `article` VALUES ('17', '用用JavaScript试试,这样改可以不........', '1644857753', 'JavaScript试一下');
INSERT INTO `article` VALUES ('18', '原来不是不可以传送默认值()(我去!!可以穿小表情看看可不可以正常显示),是设置了不可选,...应该导致的,现在改了一下,自由度高了一下,在用户名中默认是当前用户名,也可以自己改,这样啊也省事,睡觉睡觉去~~~', '1644858444', '找到原因了');
INSERT INTO `article` VALUES ('19', '上传那个小表情会使SQL语句错误,没法解析把...应该.....', '1644858504', '草...');
INSERT INTO `article` VALUES ('20', '但是,虽然得到是string,但是你还是得在$name = ...中等号右边加上\';\r\n不然还是报错,汗,写好分析是否出错的代码太重要了,不然你都不知道怎么错的......', '1644884940', '修改文章ke');
INSERT INTO `article` VALUES ('21', '在最后的最后,加了一个时间,看看可以正常显示不', '1644897669', '时间');
INSERT INTO `article` VALUES ('22', '时间有点不准呀', '1644897730', '时间');
INSERT INTO `article` VALUES ('23', '原来是时区的问题,\r\n得到时间戳以后转化{date()}时时转化为0时区的当前时间', '1644898075', '时间问题解决');
INSERT INTO `article` VALUES ('24', '基本功能可以实现了', '1644902127', '结束了');
INSERT INTO `article` VALUES ('25', '已进入就是首页,然后登录,不登录没法进去,但如果你注册了,并登陆了,则在1小时内不用在登陆了的,然后在留言页面,用户名框默认是你登录时(注册时)的用户名,想要退出登录,则要点击首页退出,但这样就没法访问博客和留言板', '1644902320', '介绍COKKIE');
INSERT INTO `article` VALUES ('26', '分页,,在留言板和后台对留言板的删除加上了简单的分页功能,其他没加,加上感觉有点不好看了,而起不怎么多', '1644902409', '介绍:分页');
INSERT INTO `article` VALUES ('27', '增删改主要是在后台进行文章的增删改,对留言的删除\r\n而 查 在在前台和后台都有体现,在前台搜索时,只会匹配对应的文章名并对关键字加上红色,在后台搜索是只要有这个关键字无论内容还是标题都给你找出来', '1644902586', '介绍:增删改查');
INSERT INTO `article` VALUES ('28', '在登录时(注册)做了一个小小的判断,注册后把username email pwd放在数据库中后,用户登录会进行一个小小判断,可以判断一下是否有这个邮箱,密码是否正确,用户名或邮箱是否重复什么的', '1644902712', '介绍:登录');
INSERT INTO `article` VALUES ('29', '3254454', '1645875477', '找到原因了');

-- ----------------------------
-- Table structure for `massage`
-- ----------------------------
DROP TABLE IF EXISTS `massage`;
CREATE TABLE `massage` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `content` varchar(250) NOT NULL,
  `intime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of massage
-- ----------------------------
INSERT INTO `massage` VALUES ('37', '李四', '张三我爱你', '1644765724');
INSERT INTO `massage` VALUES ('38', 'js', '差不多可以了,分页', '1644765809');
INSERT INTO `massage` VALUES ('39', 'js', '差不多可以了,分页', '1644765809');
INSERT INTO `massage` VALUES ('40', '草', '失败了,每次两份', '1644765863');
INSERT INTO `massage` VALUES ('41', '草', '失败了,每次两份', '1644765863');
INSERT INTO `massage` VALUES ('42', 'text', '行不行', '1644765896');
INSERT INTO `massage` VALUES ('43', '结束', 'emm if判断时竟然还会运行一次,曹乐', '1644765929');
INSERT INTO `massage` VALUES ('44', '来', '来', '1644767819');
INSERT INTO `massage` VALUES ('47', '312312', '231231', '1644767837');
INSERT INTO `massage` VALUES ('48', '31231', '312312', '1644767840');
INSERT INTO `massage` VALUES ('49', '321312', '312312', '1644767843');
INSERT INTO `massage` VALUES ('50', '321312', '312312', '1644767846');
INSERT INTO `massage` VALUES ('51', 'okk', '每张显示十条留言试试看', '1644767901');
INSERT INTO `massage` VALUES ('52', 'dasdas', 'sadasdsa', '1644770648');
INSERT INTO `massage` VALUES ('54', 'dwefwefwe', 'wr23r32r', '1644770656');
INSERT INTO `massage` VALUES ('56', 'rdewf23rd2', '23r23rfefcsd', '1644770664');
INSERT INTO `massage` VALUES ('57', 'csdf32f2efe', 'e23e23fds', '1644770668');
INSERT INTO `massage` VALUES ('59', 'cwj;vnwe;jvwe;v', 'rqwjfijfj;ewwfj', '1644770677');
INSERT INTO `massage` VALUES ('60', 'dfvwhlfwnf', 'ejs;ahlakfbahls\r\n', '1644770688');
INSERT INTO `massage` VALUES ('61', 'jef;wne;fuwenfj', 'efwejfnhhqlwf', '1644770695');
INSERT INTO `massage` VALUES ('65', '23123', '苏打撒旦撒', '1644857929');
INSERT INTO `massage` VALUES ('66', '恶趣味群无', '王企鹅群翁无', '1644857995');
INSERT INTO `massage` VALUES ('67', 'You name', '而我却二群无', '1644858006');
INSERT INTO `massage` VALUES ('68', '张三', '委屈', '1644858142');
INSERT INTO `massage` VALUES ('69', '张三', '时间', '1644897752');
INSERT INTO `massage` VALUES ('70', '张三', '测试', '1644904049');
INSERT INTO `massage` VALUES ('71', '呵呵呵', '换个号试试\r\n', '1644904092');
INSERT INTO `massage` VALUES ('72', '147258369', '恶心的', '1644905084');
INSERT INTO `massage` VALUES ('73', '战三', 'ewqeqeq', '1645711110');
INSERT INTO `massage` VALUES ('74', '147258369', '1212312', '1645875419');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `psd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '战三', '13213', '21312@123212');
INSERT INTO `users` VALUES ('2', '呵呵呵', 'dsadsa12312', 'xcsdw@eqweqw');
INSERT INTO `users` VALUES ('3', '12312', 'dasda', 'wdqewqd@sdad');
INSERT INTO `users` VALUES ('4', '管理员', '12345678', 'STUD@gmail.com');
INSERT INTO `users` VALUES ('5', '{$username}', '{$psd}', '{$email}');
INSERT INTO `users` VALUES ('6', 'wq2312', '21321sad', 'STUD@gmail.com');
INSERT INTO `users` VALUES ('7', 'wq2312', '21321sad', 'STUD@gmail.com');
INSERT INTO `users` VALUES ('11', '张三', '232131dw', '147258369@qq.com');
INSERT INTO `users` VALUES ('12', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('13', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('14', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('15', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('16', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('17', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('18', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('19', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('20', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('21', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('22', '147258369', 'eqweqw', '14725832312@qq.com');
INSERT INTO `users` VALUES ('23', 'wq2312', 'QWEQW', 'dwqeqw2@QQ.COM');
INSERT INTO `users` VALUES ('24', '张三', '13214124', '312312@qq.com');
INSERT INTO `users` VALUES ('25', '张三', '147258369', '147258369@gmail.com');
INSERT INTO `users` VALUES ('26', '张三', '147258369', '147258369@gmail.com');
INSERT INTO `users` VALUES ('53', '张三', '213123', '147258369@qq.com');
INSERT INTO `users` VALUES ('54', '张三', '213123', '147258369@qq.com');
INSERT INTO `users` VALUES ('88', '默张三', '1147258369', '227072qw@qq.com');
INSERT INTO `users` VALUES ('89', '例子', '', '125541541@qsqd.com');
INSERT INTO `users` VALUES ('90', '王五', '12345578', '123456789@qq.com');
INSERT INTO `users` VALUES ('91', '张三', '147258369', '147qw@qq.com');
INSERT INTO `users` VALUES ('92', '张三1', '147258369', 'STUD@gmail.com');
