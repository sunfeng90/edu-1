<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>课程展示系统后台管理</title>
  <link rel="stylesheet" href="/edu/Public/lib/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="/edu/Public/lib/font-awesome/4.7.0/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/edu/Public/lib/ionicons/2.2.0/css/ionicons.css">
  <!-- adminlte style -->
  <link rel="stylesheet" href="/edu/Public/lib/adminlte/2.4.2/css/adminlte.css">
  <!-- skin style -->
  <link rel="stylesheet" href="/edu/Public/lib/adminlte/2.4.2/css/skins/skin-yellow-light.css">
  <link rel="stylesheet" href="/edu/Public/css/admin.css">
  
</head>
<body class="skin-yellow-light">
  <div class="wrapper">

    
  <?php echo W('Admin/header', array());?>


    
  <?php echo W('Admin/sidebar', array());?>


    <div class="content-wrapper">
      

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>后台首页<small>系统基本信息</small>
    </h1>
   <!--  <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> 后台首页</a></li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">运行环境</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped">
          <tr>
              <th width="30%">服务器操作系统</th>
              <td><?php echo (PHP_OS); ?></td>
          </tr>
          <tr>
              <th>ThinkPHP版本</th>
              <td><?php echo (THINK_VERSION); ?></td>
          </tr>
          <tr>
              <th>运行环境</th>
              <td><?php echo ($_SERVER['SERVER_SOFTWARE']); ?></td>
          </tr>
          <tr>
              <th>MYSQL版本</th>
              <?php $system_info_mysql = M()->query("select version() as v;"); ?>
              <td><?php echo ($system_info_mysql["0"]["v"]); ?></td>
          </tr>
          <tr>
              <th>上传限制</th>
              <td><?php echo ini_get('upload_max_filesize');?></td>
          </tr>
          <tr>
              <th>建议浏览器版本</th>
              <td>IE8以上，谷歌，<a href="http://www.firefox.com.cn/">火狐</a>，360极速浏览器</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">开发团队</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered">
          <tr>
              <th width="30%">总策划</th>
              <td>Sunfeng</td>
          </tr>
          <tr>
              <th>软件设计</th>
              <td>Sunfeng</td>
          </tr>
          <tr>
              <th>数据库设计</th>
              <td>Sunfeng</td>
          </tr>
          <tr>
              <th>界面及用户体验团队</th>
              <td>Frank</td>
          </tr>
          <tr>
              <th>技术支持</th>
              <td>QQ：568202560 , 微信：fwzkj90</td>
          </tr>
        </table>
      </div>
    </div>

  </section>

    </div>

    

    
    <div id="login-modal" class="modal" data-url="/Admin/Login/ajax"></div>
    

  </div>
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
    seajs.use('/edu/Public/js/app.js')
  </script>
  
  <script type="text/javascript">
    seajs.use('/edu/Public/js/admin/index.js')
  </script>

</body>
</html>