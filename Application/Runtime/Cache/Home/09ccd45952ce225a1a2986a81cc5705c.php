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
  	<div class="page-header">
      <p>
        <medium>
          浙江师范大学文科综合实验教学中心组建于2008年，其前身可追溯到1979年成立的天文台和气象观测站。
          2009年11月，中心被教育部批准为文科综合类国家级实验教学示范中心建设单位。2013年6月，通过验收成为国家级实验教学示范中心。
          2014年5月，获批浙江省“十二五”实验教学示范中心重点建设项目。中心现有专兼职实验教师和实验技术人员130人，其中正高35人，副高52人；博士29人，硕士60人。
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
    <div class="copyright" style="background-color: #661B18; position: relative; left: 0; bottom: 0; top: 450px; width: 100%; ">
      <span style="color: aliceblue;">友情链接：</span><a href="www.zjnu.edu.cn" target="_blank" style="color: aliceblue;">浙江师范大学</a> |
        <a href="www.wk.zjnu.edu.cn" lo target="_blank" style="color: aliceblue;">浙江师范大学文科实验教学中心首页</a> | 
        <a href="http://localhost/edu/Admin/Index/index.html" target="_blank" style="color: aliceblue;">后台管理</a>
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