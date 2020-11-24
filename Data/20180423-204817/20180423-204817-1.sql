-- -----------------------------
-- Think MySQL Data Transfer 
-- 
-- Host     : localhost
-- Port     : 3306
-- Database : edu
-- 
-- Part : #1
-- Date : 2018-04-23 20:48:17
-- -----------------------------

SET FOREIGN_KEY_CHECKS = 0;


-- -----------------------------
-- Table structure for `announcement`
-- -----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '课程公告ID',
  `userId` int(10) NOT NULL COMMENT '公告发布人ID',
  `targetType` varchar(64) NOT NULL DEFAULT 'course' COMMENT '公告类型',
  `url` varchar(255) NOT NULL,
  `startTime` int(10) unsigned NOT NULL DEFAULT '0',
  `endTime` int(10) unsigned NOT NULL DEFAULT '0',
  `targetId` int(10) NOT NULL COMMENT '所属ID',
  `content` text NOT NULL COMMENT '公告内容',
  `createdTime` int(10) NOT NULL COMMENT '公告创建时间',
  `updatedTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公告最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------
-- Table structure for `course`
-- -----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '课程ID',
  `title` varchar(1024) NOT NULL COMMENT '课程标题',
  `subtitle` varchar(1024) NOT NULL DEFAULT '' COMMENT '课程副标题',
  `status` enum('draft','published','closed') NOT NULL DEFAULT 'draft' COMMENT '课程状态',
  `type` varchar(255) NOT NULL DEFAULT 'normal' COMMENT '课程类型',
  `serializeMode` enum('none','serialize','finished') NOT NULL DEFAULT 'none' COMMENT '连载模式',
  `lessonNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '课时数',
  `giveCredit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学完课程所有课时，可获得的总学分',
  `rating` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排行分数',
  `ratingNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投票人数',
  `categoryId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `tags` text COMMENT '标签IDs',
  `smallPicture` varchar(255) NOT NULL DEFAULT '' COMMENT '小图',
  `largePicture` varchar(255) NOT NULL DEFAULT '' COMMENT '大图',
  `about` text COMMENT '简介',
  `teacherIds` text COMMENT '显示的课程教师IDs',
  `goals` text COMMENT '课程目标',
  `audiences` text COMMENT '适合人群',
  `recommended` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否为推荐课程',
  `recommendedSeq` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐序号',
  `recommendedTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐时间',
  `studentNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学员数',
  `hitNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看次数',
  `userId` int(10) unsigned NOT NULL COMMENT '课程发布人ID',
  `createdTime` int(10) unsigned NOT NULL COMMENT '课程创建时间',
  `freeStartTime` int(10) NOT NULL DEFAULT '0',
  `freeEndTime` int(10) NOT NULL DEFAULT '0',
  `parentId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '课程的父Id',
  `noteNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '课程笔记数量',
  `locked` int(10) NOT NULL DEFAULT '0' COMMENT '是否上锁1上锁,0解锁',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `course`
-- -----------------------------
INSERT INTO `course` VALUES ('1', '“微波技术与天线”网络', '“微波技术与天线”网络 ', 'published', 'normal', 'finished', '0', '0', '0', '0', '0', '', '', '', '“微波技术与天线”网络 ', '', '', '', '0', '0', '0', '0', '0', '1', '1523348723', '0', '0', '0', '0', '0');
INSERT INTO `course` VALUES ('3', 'Web攻防技术', 'Web攻防技术', 'published', 'normal', 'none', '0', '0', '0', '0', '0', '', '', '', 'Web攻防技术', '', '', '', '0', '0', '0', '0', '0', '1', '1523348882', '0', '0', '0', '0', '0');

-- -----------------------------
-- Table structure for `course_chapter`
-- -----------------------------
DROP TABLE IF EXISTS `course_chapter`;
CREATE TABLE `course_chapter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '课程章节ID',
  `courseId` int(10) unsigned NOT NULL COMMENT '章节所属课程ID',
  `type` enum('chapter','unit') NOT NULL DEFAULT 'chapter' COMMENT '章节类型：chapter为章节，unit为单元。',
  `parentId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'parentId大于０时为单元',
  `number` int(10) unsigned NOT NULL COMMENT '章节编号',
  `seq` int(10) unsigned NOT NULL COMMENT '章节序号',
  `title` varchar(255) NOT NULL COMMENT '章节名称',
  `createdTime` int(10) unsigned NOT NULL COMMENT '章节创建时间',
  `copyId` int(10) NOT NULL DEFAULT '0' COMMENT '复制章节的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `course_chapter`
-- -----------------------------
INSERT INTO `course_chapter` VALUES ('1', '1', 'chapter', '0', '1', '1', '网络安全', '1523848109', '0');
INSERT INTO `course_chapter` VALUES ('2', '1', 'unit', '1', '1', '2', '网络安全', '1523848124', '0');
INSERT INTO `course_chapter` VALUES ('3', '1', 'unit', '1', '2', '4', '加密技术', '1523848144', '0');
INSERT INTO `course_chapter` VALUES ('4', '1', 'chapter', '0', '2', '6', '大型网站架构', '1523848156', '0');
INSERT INTO `course_chapter` VALUES ('5', '1', 'unit', '4', '1', '7', '大型网站的特点', '1524301599', '0');
INSERT INTO `course_chapter` VALUES ('6', '1', 'unit', '4', '2', '9', '分布式服务', '1524301622', '0');
INSERT INTO `course_chapter` VALUES ('7', '1', 'unit', '4', '3', '11', 'Session复制', '1524301664', '0');
INSERT INTO `course_chapter` VALUES ('8', '1', 'unit', '4', '4', '13', '一致性哈希', '1524397978', '0');

-- -----------------------------
-- Table structure for `course_favorite`
-- -----------------------------
DROP TABLE IF EXISTS `course_favorite`;
CREATE TABLE `course_favorite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '收藏ID',
  `courseId` int(10) unsigned NOT NULL COMMENT '收藏课程的ID',
  `userId` int(10) unsigned NOT NULL COMMENT '收藏人的ID',
  `createdTime` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户的收藏数据表';


-- -----------------------------
-- Table structure for `course_lesson`
-- -----------------------------
DROP TABLE IF EXISTS `course_lesson`;
CREATE TABLE `course_lesson` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '课时ID',
  `courseId` int(10) unsigned NOT NULL COMMENT '课时所属课程ID',
  `chapterId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '课时所属章节ID',
  `number` int(10) unsigned NOT NULL COMMENT '课时编号',
  `seq` int(10) unsigned NOT NULL COMMENT '课时在课程中的序号',
  `free` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否为免费课时',
  `status` enum('unpublished','published') NOT NULL DEFAULT 'published' COMMENT '课时状态',
  `title` varchar(255) NOT NULL COMMENT '课时标题',
  `summary` text COMMENT '课时摘要',
  `tags` text COMMENT '课时标签',
  `type` varchar(64) NOT NULL DEFAULT 'text' COMMENT '课时类型',
  `content` text COMMENT '课时正文',
  `giveCredit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学完课时获得的学分',
  `requireCredit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学习课时前，需达到的学分',
  `mediaId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '媒体文件ID',
  `mediaSource` varchar(32) NOT NULL DEFAULT '' COMMENT '媒体文件来源(self:本站上传,youku:优酷)',
  `mediaName` varchar(255) NOT NULL DEFAULT '' COMMENT '媒体文件名称',
  `mediaUri` text COMMENT '媒体文件资源名',
  `homeworkId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '作业iD',
  `exerciseId` int(10) unsigned DEFAULT '0' COMMENT '练习ID',
  `length` int(11) unsigned DEFAULT NULL COMMENT '时长',
  `materialNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传的资料数量',
  `quizNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '测验题目数量',
  `learnedNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '已学的学员数',
  `viewedNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看数',
  `startTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '直播课时开始时间',
  `endTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '直播课时结束时间',
  `memberNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '直播课时加入人数',
  `replayStatus` enum('ungenerated','generating','generated') NOT NULL DEFAULT 'ungenerated',
  `maxOnlineNum` int(11) DEFAULT '0' COMMENT '直播在线人数峰值',
  `liveProvider` int(10) unsigned NOT NULL DEFAULT '0',
  `userId` int(10) unsigned NOT NULL COMMENT '发布人ID',
  `createdTime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `copyId` int(10) NOT NULL DEFAULT '0' COMMENT '复制课时id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `course_lesson`
-- -----------------------------
INSERT INTO `course_lesson` VALUES ('1', '1', '2', '1', '3', '1', 'unpublished', 'XSS攻击', '跨站脚本攻击，Cross Site Script。指黑客通过篡改网页，注入恶意HTML脚本，在用户浏览网页时，控制用户浏览器进行恶意操作的一种攻击方式。攻击者通过XSS攻击，偷取用户Cookie、密码等重要数据，进行伪造交易、盗窃用户财产、窃取情报等。', '', 'video', '<p>随着业务拆分越来越小，存储系统越来越大，应用系统的整体复杂度呈指数级增加，部署维护越来越难。由于所有应用要和所有的数据库系统连接，在数万台服务器规模的网站中，这些连接的数据是服务器规模的平方，导致数据库连接资源不足，拒绝服务。既然每一个应用系统都需要执行许多相同的业务操作，比如用户管理、商品管理等，那么可以将这些公共的业务提取出来，独立部署。由这些可复用的业务连接数据库，提供公共的业务连接，而应用系统只需要管理用户界面，通过分布式服务调用公共业务服务完成具体操作。服务的一种抽象，面向服务架构。</p>\r\n', '0', '0', '51', '', '脚本报告.mp4', '2018-04-23/5addd13388c11.mp4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'ungenerated', '0', '0', '1', '1523858780', '0');
INSERT INTO `course_lesson` VALUES ('2', '1', '3', '2', '5', '0', 'unpublished', '对称加密', '对称加密', '', 'text', '<p>信息的发送方和接收方采用相同的密钥进行加密。一旦密钥被人窃取，那么信息也就会被破译。因此，密钥的管理是一个重要的工作。</p>\r\n\r\n<p>DES加密（Data Encryption Standard）1997年美国政府采用。密钥长度56位。</p>\r\n\r\n<p>RC2、RC4、RC5支持可变长度密钥加密，效率比DES高</p>\r\n', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'ungenerated', '0', '0', '2', '1524301516', '0');
INSERT INTO `course_lesson` VALUES ('3', '1', '5', '3', '8', '0', 'unpublished', '大型网站的特点', '高并发，大流量、高可用、海量数据、用户分布广泛，网络情况复杂、安全环境恶劣、需求快速变更，发布频繁、渐进式发展。', '', 'text', '<p>高并发，大流量、高可用、海量数据、用户分布广泛，网络情况复杂、安全环境恶劣、需求快速变更，发布频繁、渐进式发展。</p>\r\n', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'ungenerated', '0', '0', '2', '1524301532', '0');
INSERT INTO `course_lesson` VALUES ('4', '1', '6', '4', '10', '0', 'unpublished', '分布式服务', '随着业务拆分越来越小，存储系统越来越大，应用系统的整体复杂度呈指数级增加，部署维护越来越难。', '', 'text', '<p>随着业务拆分越来越小，存储系统越来越大，应用系统的整体复杂度呈指数级增加，部署维护越来越难。由于所有应用要和所有的数据库系统连接，在数万台服务器规模的网站中，这些连接的数据是服务器规模的平方，导致数据库连接资源不足，拒绝服务。既然每一个应用系统都需要执行许多相同的业务操作，比如用户管理、商品管理等，那么可以将这些公共的业务提取出来，独立部署。由这些可复用的业务连接数据库，提供公共的业务连接，而应用系统只需要管理用户界面，通过分布式服务调用公共业务服务完成具体操作。服务的一种抽象，面向服务架构。</p>\r\n', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'ungenerated', '0', '0', '2', '1524301564', '0');
INSERT INTO `course_lesson` VALUES ('5', '1', '7', '5', '12', '0', 'unpublished', 'Session复制', 'Session复制是早期企业应用系统使用较多的一种服务器集群Session管理机制。', '', 'text', '<p>Session复制是早期企业应用系统使用较多的一种服务器集群Session管理机制。应用服务器开启Web容器Session复制功能，在集群中的几台服务器之间同步Session对象，使得每台服务器上都保存所有用户的Session信息，这样任何一台机器宕机都不会导致Session数据的丢失，而服务器使用Session时，也只需要在本机获取即可。</p>\r\n\r\n<p>缺点：当集群规模较大是，集群服务器间需要大量的通信进行Session复制，占用服务器和网络的大量资源，系统不堪负担。而且由于所有用户的Session信息在每台服务器上都有备份，在大量用户访问的情况下，甚至会出现服务器内存不够Session使用的情况。</p>\r\n', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'ungenerated', '0', '0', '2', '1524301577', '0');
INSERT INTO `course_lesson` VALUES ('6', '1', '8', '6', '14', '0', 'unpublished', '一致性哈希', '一致性哈希', '', 'text', '<p>先构造一个长度为0~232的整数环（这个环被称作一致性Hash环），根据节点名称的Hash值将缓存服务器节点放置在这个Hash环上。然后根据需要缓存的数据KEY值计算得到对应的Hash值，然后在Hash环上顺时针查找距离这个KEY的Hash值最近的缓存服务器节点，完成KEY到服务器的Hash映射查找。</p>\r\n', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'ungenerated', '0', '0', '2', '1524301654', '0');

-- -----------------------------
-- Table structure for `course_lesson_learn`
-- -----------------------------
DROP TABLE IF EXISTS `course_lesson_learn`;
CREATE TABLE `course_lesson_learn` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '学员课时学习记录ID',
  `userId` int(10) unsigned NOT NULL COMMENT '学员ID',
  `courseId` int(10) unsigned NOT NULL COMMENT '课程ID',
  `lessonId` int(10) unsigned NOT NULL COMMENT '课时ID',
  `status` enum('learning','finished') NOT NULL COMMENT '学习状态',
  `startTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学习开始时间',
  `finishedTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学习完成时间',
  `learnTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学习时间',
  `watchTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学习观看时间',
  `watchNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '观看次数',
  `videoStatus` enum('paused','playing') NOT NULL DEFAULT 'paused' COMMENT '学习观看时间',
  `updateTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId_lessonId` (`userId`,`lessonId`),
  KEY `userId_courseId` (`userId`,`courseId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------
-- Table structure for `course_material`
-- -----------------------------
DROP TABLE IF EXISTS `course_material`;
CREATE TABLE `course_material` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '课程资料ID',
  `courseId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '资料所属课程ID',
  `lessonId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '资料所属课时ID',
  `title` varchar(1024) NOT NULL COMMENT '资料标题',
  `description` text COMMENT '资料描述',
  `link` varchar(1024) NOT NULL DEFAULT '' COMMENT '外部链接地址',
  `fileId` int(10) unsigned NOT NULL COMMENT '资料文件ID',
  `userId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '资料创建人ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `course_material`
-- -----------------------------
INSERT INTO `course_material` VALUES ('44', '1', '1', '脚本报告.mp4', '', '', '51', '0');

-- -----------------------------
-- Table structure for `course_member`
-- -----------------------------
DROP TABLE IF EXISTS `course_member`;
CREATE TABLE `course_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '课程学员记录ID',
  `courseId` int(10) unsigned NOT NULL COMMENT '课程ID',
  `joinedType` enum('course','classroom') NOT NULL DEFAULT 'course' COMMENT '购买班级或者课程加入学习',
  `userId` int(10) unsigned NOT NULL COMMENT '学员ID',
  `deadline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学习最后期限',
  `levelId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户以会员的方式加入课程学员时的会员ID',
  `learnedNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '已学课时数',
  `credit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学员已获得的学分',
  `noteNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '笔记数目',
  `noteLastUpdateTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最新的笔记更新时间',
  `isLearned` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否已学完',
  `seq` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序序号',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `isVisible` tinyint(2) NOT NULL DEFAULT '1' COMMENT '可见与否，默认为可见',
  `role` enum('student','teacher') NOT NULL DEFAULT 'student' COMMENT '课程会员角色',
  `locked` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '学员是否被锁定',
  `deadlineNotified` int(10) NOT NULL DEFAULT '0' COMMENT '有效期通知',
  `createdTime` int(10) unsigned NOT NULL COMMENT '学员加入课程时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseId` (`courseId`,`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `course_member`
-- -----------------------------
INSERT INTO `course_member` VALUES ('1', '1', 'course', '2', '0', '0', '0', '0', '0', '0', '0', '0', '', '1', 'student', '0', '0', '1524224685');

-- -----------------------------
-- Table structure for `course_topic`
-- -----------------------------
DROP TABLE IF EXISTS `course_topic`;
CREATE TABLE `course_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '课程话题ID',
  `courseId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '话题所属课程ID',
  `lessonId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '话题所属课时ID',
  `userId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '话题发布人ID',
  `type` enum('discussion','question') NOT NULL DEFAULT 'discussion' COMMENT '话题类型',
  `isStick` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `isElite` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '是否精华',
  `isClosed` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '是否关闭',
  `private` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `title` varchar(255) NOT NULL COMMENT '话题标题',
  `content` text COMMENT '话题内容',
  `postNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复数',
  `hitNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看数',
  `followNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注数',
  `latestPostUserId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后回复人ID',
  `latestPostTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后回复时间',
  `createdTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '话题创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `course_topic`
-- -----------------------------
INSERT INTO `course_topic` VALUES ('1', '1', '1', '0', 'discussion', '0', '1', '0', '0', '各位同学，最近有没有什么学习活动啊？', '各位同学，最近有没有什么学习活动啊？', '1', '10', '0', '0', '0', '0');

-- -----------------------------
-- Table structure for `course_topic_post`
-- -----------------------------
DROP TABLE IF EXISTS `course_topic_post`;
CREATE TABLE `course_topic_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '课程话题回复ID',
  `courseId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复所属课程ID',
  `lessonId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复所属课时ID',
  `threadId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复所属话题ID',
  `userId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复人',
  `isElite` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否精华',
  `content` text NOT NULL COMMENT '正文',
  `createdTime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------
-- Table structure for `file`
-- -----------------------------
DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '上传文件ID',
  `groupId` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '上传文件组ID',
  `userId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传人ID',
  `uri` varchar(255) NOT NULL COMMENT '文件URI',
  `mime` varchar(255) NOT NULL COMMENT '文件MIME',
  `ext` varchar(20) DEFAULT NULL COMMENT '文件类型',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '文件状态',
  `createdTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件上传时间',
  `originName` varchar(255) NOT NULL DEFAULT '''''' COMMENT '文件原始名字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `file`
-- -----------------------------
INSERT INTO `file` VALUES ('51', '1', '2', '2018-04-23/5addd13388c11.mp4', 'application/octet-stream', 'mp4', '8298633', '0', '1524486451', '脚本报告.mp4');

-- -----------------------------
-- Table structure for `file_group`
-- -----------------------------
DROP TABLE IF EXISTS `file_group`;
CREATE TABLE `file_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '上传文件组ID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '上传文件组名称',
  `code` varchar(255) NOT NULL COMMENT '上传文件组编码',
  `auth` tinyint(3) NOT NULL DEFAULT '1' COMMENT '文件组文件权限：（0x111<-->Delete-Write-Read）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `file_group`
-- -----------------------------
INSERT INTO `file_group` VALUES ('1', '默认文件组', 'default', '1');

-- -----------------------------
-- Table structure for `log`
-- -----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '系统日志ID',
  `userId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作人ID',
  `module` varchar(32) NOT NULL COMMENT '日志所属模块',
  `action` varchar(32) NOT NULL COMMENT '日志所属操作类型',
  `message` text NOT NULL COMMENT '日志内容',
  `data` text COMMENT '日志数据',
  `ip` varchar(255) NOT NULL COMMENT '日志记录IP',
  `createdTime` int(10) unsigned NOT NULL COMMENT '日志发生时间',
  `level` char(10) NOT NULL COMMENT '日志等级',
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `log`
-- -----------------------------
INSERT INTO `log` VALUES ('74', '1', 'login', 'login', '用户admin在2018-04-19 21:29:50登录系统', '', '0.0.0.0', '1524144590', 'info');
INSERT INTO `log` VALUES ('75', '1', 'login', 'login', '用户admin在2018-04-20 15:22:23登录系统', '', '0.0.0.0', '1524208943', 'info');
INSERT INTO `log` VALUES ('76', '1', 'login', 'login', '用户admin在2018-04-20 15:24:08登录系统', '', '0.0.0.0', '1524209048', 'info');
INSERT INTO `log` VALUES ('30', '1', 'login', 'login', '用户admin在2018-04-07 09:54:07登录系统', '', '0.0.0.0', '1523066047', 'info');
INSERT INTO `log` VALUES ('31', '1', 'login', 'login', '用户admin在2018-04-07 11:01:50登录系统', '', '0.0.0.0', '1523070110', 'info');
INSERT INTO `log` VALUES ('32', '1', 'login', 'login', '用户admin在2018-04-07 15:29:11登录系统', '', '0.0.0.0', '1523086151', 'info');
INSERT INTO `log` VALUES ('33', '1', 'login', 'login', '用户admin在2018-04-07 15:33:17登录系统', '', '0.0.0.0', '1523086397', 'info');
INSERT INTO `log` VALUES ('34', '1', 'login', 'login', '用户admin在2018-04-07 16:24:20登录系统', '', '0.0.0.0', '1523089460', 'info');
INSERT INTO `log` VALUES ('35', '1', 'login', 'login', '用户admin在2018-04-07 16:24:53登录系统', '', '127.0.0.1', '1523089493', 'info');
INSERT INTO `log` VALUES ('36', '1', 'login', 'login', '用户admin在2018-04-07 19:04:43登录系统', '', '127.0.0.1', '1523099083', 'info');
INSERT INTO `log` VALUES ('37', '1', 'login', 'login', '用户admin在2018-04-08 08:36:20登录系统', '', '127.0.0.1', '1523147780', 'info');
INSERT INTO `log` VALUES ('38', '1', 'login', 'login', '用户admin在2018-04-08 09:40:49登录系统', '', '127.0.0.1', '1523151649', 'info');
INSERT INTO `log` VALUES ('39', '1', 'login', 'login', '用户admin在2018-04-08 09:42:49登录系统', '', '127.0.0.1', '1523151769', 'info');
INSERT INTO `log` VALUES ('40', '1', 'login', 'login', '用户admin在2018-04-08 09:43:18登录系统', '', '127.0.0.1', '1523151798', 'info');
INSERT INTO `log` VALUES ('41', '1', 'login', 'login', '用户admin在2018-04-08 10:00:24登录系统', '', '127.0.0.1', '1523152824', 'info');
INSERT INTO `log` VALUES ('42', '1', 'login', 'login', '用户admin在2018-04-10 10:43:38登录系统', '', '0.0.0.0', '1523328218', 'info');
INSERT INTO `log` VALUES ('43', '1', 'login', 'login', '用户admin在2018-04-10 15:09:27登录系统', '', '0.0.0.0', '1523344167', 'info');
INSERT INTO `log` VALUES ('44', '1', 'login', 'login', '用户admin在2018-04-10 15:15:04登录系统', '', '0.0.0.0', '1523344504', 'info');
INSERT INTO `log` VALUES ('45', '1', 'login', 'login', '用户admin在2018-04-10 16:45:27登录系统', '', '0.0.0.0', '1523349927', 'info');
INSERT INTO `log` VALUES ('46', '1', 'login', 'login', '用户admin在2018-04-11 13:04:09登录系统', '', '0.0.0.0', '1523423049', 'info');
INSERT INTO `log` VALUES ('47', '1', 'login', 'login', '用户admin在2018-04-12 09:22:38登录系统', '', '0.0.0.0', '1523496158', 'info');
INSERT INTO `log` VALUES ('48', '1', 'login', 'login', '用户admin在2018-04-12 09:24:30登录系统', '', '0.0.0.0', '1523496270', 'info');
INSERT INTO `log` VALUES ('49', '1', 'login', 'login', '用户admin在2018-04-12 15:01:24登录系统', '', '0.0.0.0', '1523516484', 'info');
INSERT INTO `log` VALUES ('50', '1', 'login', 'login', '用户admin在2018-04-12 15:12:14登录系统', '', '0.0.0.0', '1523517134', 'info');
INSERT INTO `log` VALUES ('51', '1', 'login', 'login', '用户admin在2018-04-14 10:35:54登录系统', '', '0.0.0.0', '1523673354', 'info');
INSERT INTO `log` VALUES ('52', '1', 'login', 'login', '用户admin在2018-04-14 10:37:34登录系统', '', '0.0.0.0', '1523673454', 'info');
INSERT INTO `log` VALUES ('53', '1', 'login', 'login', '用户admin在2018-04-14 16:54:18登录系统', '', '0.0.0.0', '1523696058', 'info');
INSERT INTO `log` VALUES ('55', '3', 'register', 'register', '李康成功注册', '', '0.0.0.0', '1523877428', 'info');
INSERT INTO `log` VALUES ('56', '3', 'login', 'login', '用户李康在2018-04-16 19:18:01登录系统', '', '0.0.0.0', '1523877481', 'info');
INSERT INTO `log` VALUES ('57', '1', 'login', 'login', '用户admin在2018-04-18 17:35:57登录系统', '', '0.0.0.0', '1524044157', 'info');
INSERT INTO `log` VALUES ('58', '1', 'login', 'login', '用户admin在2018-04-19 16:21:25登录系统', '', '0.0.0.0', '1524126085', 'info');
INSERT INTO `log` VALUES ('59', '1', 'login', 'login', '用户admin在2018-04-19 16:42:31登录系统', '', '0.0.0.0', '1524127351', 'info');
INSERT INTO `log` VALUES ('60', '1', 'login', 'login', '用户admin在2018-04-19 17:00:00登录系统', '', '0.0.0.0', '1524128400', 'info');
INSERT INTO `log` VALUES ('61', '1', 'login', 'login', '用户admin在2018-04-19 17:00:42登录系统', '', '0.0.0.0', '1524128442', 'info');
INSERT INTO `log` VALUES ('62', '1', 'login', 'login', '用户admin在2018-04-19 17:04:08登录系统', '', '0.0.0.0', '1524128648', 'info');
INSERT INTO `log` VALUES ('63', '1', 'login', 'login', '用户admin在2018-04-19 17:04:46登录系统', '', '0.0.0.0', '1524128686', 'info');
INSERT INTO `log` VALUES ('64', '1', 'login', 'login', '用户admin在2018-04-19 17:32:30登录系统', '', '0.0.0.0', '1524130350', 'info');
INSERT INTO `log` VALUES ('65', '1', 'login', 'login', '用户admin在2018-04-19 17:54:13登录系统', '', '0.0.0.0', '1524131653', 'info');
INSERT INTO `log` VALUES ('66', '1', 'login', 'login', '用户admin在2018-04-19 17:55:28登录系统', '', '0.0.0.0', '1524131728', 'info');
INSERT INTO `log` VALUES ('67', '1', 'login', 'login', '用户admin在2018-04-19 17:57:27登录系统', '', '0.0.0.0', '1524131847', 'info');
INSERT INTO `log` VALUES ('68', '1', 'login', 'login', '用户admin在2018-04-19 18:24:13登录系统', '', '0.0.0.0', '1524133453', 'info');
INSERT INTO `log` VALUES ('69', '1', 'login', 'login', '用户admin在2018-04-19 18:27:06登录系统', '', '0.0.0.0', '1524133626', 'info');
INSERT INTO `log` VALUES ('70', '1', 'login', 'login', '用户admin在2018-04-19 18:43:19登录系统', '', '0.0.0.0', '1524134599', 'info');
INSERT INTO `log` VALUES ('71', '1', 'login', 'login', '用户admin在2018-04-19 18:43:38登录系统', '', '0.0.0.0', '1524134618', 'info');
INSERT INTO `log` VALUES ('72', '1', 'login', 'login', '用户admin在2018-04-19 18:44:19登录系统', '', '0.0.0.0', '1524134659', 'info');
INSERT INTO `log` VALUES ('73', '1', 'login', 'login', '用户admin在2018-04-19 18:45:24登录系统', '', '0.0.0.0', '1524134724', 'info');
INSERT INTO `log` VALUES ('77', '1', 'login', 'login', '用户admin在2018-04-20 15:27:22登录系统', '', '0.0.0.0', '1524209242', 'info');
INSERT INTO `log` VALUES ('78', '1', 'login', 'login', '用户admin在2018-04-20 15:38:04登录系统', '', '0.0.0.0', '1524209884', 'info');
INSERT INTO `log` VALUES ('79', '1', 'login', 'login', '用户admin在2018-04-20 15:38:56登录系统', '', '0.0.0.0', '1524209936', 'info');
INSERT INTO `log` VALUES ('80', '1', 'login', 'login', '用户admin在2018-04-20 15:58:52登录系统', '', '0.0.0.0', '1524211132', 'info');
INSERT INTO `log` VALUES ('81', '1', 'login', 'login', '用户admin在2018-04-20 15:59:34登录系统', '', '0.0.0.0', '1524211174', 'info');
INSERT INTO `log` VALUES ('82', '1', 'login', 'login', '用户admin在2018-04-20 16:00:23登录系统', '', '0.0.0.0', '1524211223', 'info');
INSERT INTO `log` VALUES ('83', '1', 'login', 'login', '用户admin在2018-04-20 17:06:03登录系统', '', '0.0.0.0', '1524215163', 'info');
INSERT INTO `log` VALUES ('84', '2', 'login', 'login', '用户李伯特在2018-04-20 17:19:14登录系统', '', '0.0.0.0', '1524215954', 'info');
INSERT INTO `log` VALUES ('85', '2', 'login', 'login', '用户李伯特在2018-04-20 17:52:32登录系统', '', '0.0.0.0', '1524217952', 'info');
INSERT INTO `log` VALUES ('86', '2', 'login', 'login', '用户李伯特在2018-04-21 11:17:27登录系统', '', '0.0.0.0', '1524280647', 'info');
INSERT INTO `log` VALUES ('87', '2', 'login', 'login', '用户李伯特在2018-04-21 11:17:53登录系统', '', '0.0.0.0', '1524280673', 'info');
INSERT INTO `log` VALUES ('88', '2', 'login', 'login', '用户李伯特在2018-04-21 11:18:03登录系统', '', '0.0.0.0', '1524280683', 'info');

-- -----------------------------
-- Table structure for `message`
-- -----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '私信Id',
  `type` enum('text','image','video','audio') NOT NULL DEFAULT 'text' COMMENT '私信类型',
  `fromId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发信人Id',
  `toId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收信人Id',
  `content` text NOT NULL COMMENT '私信内容',
  `createdTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '私信发送时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- -----------------------------
-- Table structure for `setting`
-- -----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '系统设置ID',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '系统设置名',
  `value` longblob COMMENT '系统设置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `setting`
-- -----------------------------
INSERT INTO `setting` VALUES ('1', 'site', 'a:4:{s:8:\"sitename\";s:34:\"“微波技术与天线”网络 \";s:8:\"subtitle\";s:34:\"“微波技术与天线”网络 \";s:5:\"email\";s:16:\"845301110@qq.com\";s:8:\"sitelogo\";N;}');
INSERT INTO `setting` VALUES ('2', 'course', 'a:5:{s:4:\"send\";s:1:\"0\";s:7:\"welcome\";s:41:\"{{nickname}},欢迎加入课程{{course}}\";s:22:\"teacher_manage_student\";s:1:\"1\";s:16:\"student_download\";s:1:\"0\";s:23:\"allow_anonymous_preview\";s:1:\"0\";}');

-- -----------------------------
-- Table structure for `user`
-- -----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '用户密码',
  `salt` varchar(32) NOT NULL DEFAULT '' COMMENT '密码SALT',
  `email` varchar(128) NOT NULL COMMENT '用户邮箱',
  `tags` varchar(255) NOT NULL DEFAULT '' COMMENT '标签',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '小头像',
  `roles` varchar(255) NOT NULL COMMENT '用户角色',
  `fileGroupId` varchar(255) DEFAULT '1' COMMENT '文件组ID',
  `locked` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否被禁止',
  `lockDeadline` int(10) NOT NULL DEFAULT '0' COMMENT '帐号锁定期限',
  `consecutivePasswordErrorTimes` int(11) NOT NULL DEFAULT '0' COMMENT '帐号密码错误次数',
  `lastPasswordFailTime` int(10) NOT NULL DEFAULT '0',
  `loginTime` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `loginIp` varchar(64) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `loginSessionId` varchar(255) NOT NULL DEFAULT '' COMMENT '最后登录会话ID',
  `newMessageNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '未读私信数',
  `newNotificationNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '未读消息数',
  `createdIp` varchar(64) NOT NULL DEFAULT '' COMMENT '注册IP',
  `createdTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `user`
-- -----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'deb32ce77c0358a593e44b707f33fa85', '37c63dd9ee00e414373275076be623c2', '568202560@qq.com', '', './Public/images/avatar.png', 'ROLE_ADMIN', '1', '0', '0', '0', '0', '1523016450', '', '589b0a1dde09efab48d23edb48bae8b7', '0', '0', '0.0.0.0', '1523016450');
INSERT INTO `user` VALUES ('2', '李伯特', '1e15527ae06b0a428590fd2fb055e1a1', '4050df7882d2d4ff7692b94b7d88cca4', '845301111@qq.com', '', './Public/images/avatar.png', 'ROLE_USER', '1', '0', '0', '0', '0', '0', '', '', '0', '0', '0.0.0.0', '1523877228');
INSERT INTO `user` VALUES ('3', '李康', '8d73344b229fd6642c51762ec21bee60', '6d2a9d19928e6b5f967f8ad56a9b1fe5', '845301112@qq.com', '', './Public/images/avatar.png', 'ROLE_USER', '1', '0', '0', '0', '0', '0', '', '107365b5d89f8c24b599e8b1c34233ac', '0', '0', '0.0.0.0', '1523877427');
