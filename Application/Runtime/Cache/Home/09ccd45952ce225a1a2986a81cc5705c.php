<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if(empty($title)): ?>文科中心课程展示系统<?php else: echo ($title); endif; ?></title>
  <link rel="stylesheet" href="/edu/Public/lib/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="/edu/Public/lib/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="/edu/Public/css/home.css">
  
</head>
<body>
  
  <?php echo W('Home/header', array());?>
  
  
  <div class="container">
  	<div class="page-header"  style="min-height: 540px;">
      <p>
        <medium>
          浙江师范大学文科综合实验教学中心组建于2008年，其前身可追溯到1979年成立的天文台和气象观测站。
          2009年11月，中心被教育部批准为文科综合类国家级实验教学示范中心建设单位。2013年6月，通过验收成为国家级实验教学示范中心。
          2014年5月，获批浙江省“十二五”实验教学示范中心重点建设项目。中心现有专兼职实验教师和实验技术人员130人，其中正高35人，副高52人；博士29人，硕士60人。
        </medium>
      </p>
      <p>
        <medium>中心建有创意设计、版画、陶艺、素描、社会适应、艺术欣赏、艺术表演、器乐、录播、科学、机器人、手工制作、音频制作、电子商务、语言文字、金融模拟、科技馆等17个公共实验（实训）室，下设商贸电子、法律事务与社会工作、语言、音乐与表演、视觉艺术等5个专业实验教学分中心。</medium>
      </p>
      <p>
        <medium>
          中心承担全校文科专业以及大学英语、部分通识课程等的实验教学任务，中心建有公共实验实训课程49门，面向全校学生开放。2014年，开设实验课程340余门，年实验人时数达153万。
          中心现有面积13800多平方米，实验教学设备9800余台件，资产总值4610余万元。
        </medium>
      </p>
      <p>
        <medium>
          近三年，中心成员获国家级教学成果奖1项，省级教学成果奖4项，承担各类教改、科研项目208项，其中国家级3项，省部级27项；出版专著、教材33部；发表论文246篇，其中权威与一级期刊23篇。
          学生获得省级以上奖项411项，其中国际级34项，国家级174项；发表论文328篇；获专利21项。
        </medium>
      </p>
      <p>
        <medium>
          2011年，中心承办了全国首届国家级文科综合类实验教学示范中心建设研讨会，来自北京大学、辽宁大学、华南理工大学等26所高校的近百位专家齐聚师大，共商文科综合实验教学示范中心建设大计。
          中心成立以来，先后有50多个非洲国家的260余名大学校长和教育官员来中心访问、培训。接待省内外同行专家考察指导数千人次。
        </medium>
      </p>
      <p>
        <medium>
          文科实验中心课程展示系统开发于2020年11月，旨在为文科教师和学生提供线上学习和交流的平台。
        </medium>
      </p>
    </div>
  </div>


  
  <?php echo W('Home/sidebar', array());?>
  

  
  <footer class="footer">
    <!-- <div class="footer-link"></div> -->
    <!-- position:fixed; left:0px; right:0px; bottom:0px;height: 100px; -->
    <div class="copyright" style="background-color: #661B18; left: 0; bottom: 0; width: 100%; ">
      <span style="color: aliceblue;">友情链接：</span>
        <!-- <a href="www.zjnu.edu.cn" target="_blank" style="color: aliceblue;">浙江师范大学</a> |
        <a href="www.wk.zjnu.edu.cn" lo target="_blank" style="color: aliceblue;">浙江师范大学文科实验教学中心首页</a> |  -->
        <a href="http://localhost/edu/Admin/Index/index.html" target="_blank" style="color: blue;text-decoration:underline">后台管理</a>
      <div class="container" style="color: aliceblue;">Copyright ©2020- wkzx.zjnu.edu.cn Corporation, All Rights Reserved
      </div>
    </div>
  </footer>
  

  
  <div id="modal" class="modal"></div>
  <div id="login-modal" class="modal" data-url="/Admin/Login/ajax"></div>
  

  <script type="text/javascript">
    var app = {}

    app.version = '<?php echo C('VERSION');?>'

    app.config = {
      loading_img_path: "\/edu\/Public\/images\/loading.svg"
    }
  </script>
  <script type="text/javascript" src="/edu/Public/lib/seajs/seajs/2.2.1/sea.js"></script>
  <script type="text/javascript" src="/edu/Public/lib/seajs-global-config.js"></script>
  <script type="text/javascript">
    seajs.use('/edu/Public/js/app-index.js')
  </script>
  
</body>
</html>