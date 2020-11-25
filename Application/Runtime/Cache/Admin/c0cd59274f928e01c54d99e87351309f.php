<?php if (!defined('THINK_PATH')) exit();?><header class="main-header">
  <!-- Logo -->
  <a href="" class="logo" style="background: #661B18;">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>课程展示系统后台管理</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>课程展示系统后台管理</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" style="background: #661B18;">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- 用户账户 -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo ($user['avatar']); ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo ($user['nickname']); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo ($user['avatar']); ?>" class="img-circle" alt="User Image">
              <p><?php echo ($user['nickname']); ?></p>
            </li>
            <!-- Menu Body 
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>            
            </li>
             /.row -->
            <!-- Menu Footer-->
            <li class="user-footer">
              <!-- <div class="pull-left">
                <a href="<?php echo U('User/Index/index');?>" class="btn btn-default btn-flat">个人中心</a>
              </div> -->
              <div class="pull-right">
                <a href="<?php echo U('Admin/Login/logout');?>" class="btn btn-default btn-flat">退出系统</a>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>