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
  <link rel="stylesheet" href="/edu/Public/css/admin.css">
  
</head>
<body>
  
  <div class="form">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>用户登录</h3>
      </div>
      <div class="panel-body">
        <form id="login-form" action="<?php echo U('/Admin/Login/login');?>" method="post">
          <input type="hidden" name="goto" value="<?php echo ($goto); ?>">
          <div class="form-group mb20">
            <label class="control-label" for="form_username">用户名：</label>
            <div class="controls">
              <input class="form-control" type="text" name="username" id="form_username">
              <div class="help-block"></div>
            </div>
          </div>
          <div class="form-group mb20">
            <label class="control-label" for="form_password">密码：</label>
            <div class="controls">
              <input class="form-control" type="password" name="password" id="form_password">
              <div class="help-block"></div>
            </div>
          </div>
          <div class="form-group mb20">
            <!--<label class="control-label" for="form_password"></label>-->
            <div class="controls checkbox">
              <label>
                <input type="checkbox" name="remember_me"> 记住登录 <small>(默认记住登录7天)</small>
              </label>
              <!--<div class="help-block"></div>-->
            </div>
          </div>
          <div class="form-group mb20">
            <button id="submit" class="btn btn-block btn-success" data-loading-text="验证中...">登录</button>
            <div class="help-block msg"></div>
          </div>
        </form>
      </div>
    </div>
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
    seajs.use('/edu/Public/js/Admin/Login/login.js')
  </script>

</body>
</html>