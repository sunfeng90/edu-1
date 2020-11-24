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
  
  
  <section class="section-course-list">
    <div class="container">
      <div class="course-list">
        <div class="row">

        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topic): $mod = ($i % 2 );++$i;?><div class="col-lg-3 col-md-4 col-sm-6">
            <div><?php echo ($topic["title"]); ?></div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
      </div>
    </div>
  </section>

    <section>
      <div class="container text-center">
        <?php echo ($page); ?>
      </div>
    </section>


  
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