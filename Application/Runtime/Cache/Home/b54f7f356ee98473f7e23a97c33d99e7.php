<?php if (!defined('THINK_PATH')) exit();?><header>
    <nav class="navbar navbar-default">
        <div class="container" style="background: #661B18; width: 100%;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <img src="/edu/Public/images/logo2.png">
                </ul>
                <ul class="nav navbar-nav" style="position: absolute; top: 30%;left: 50%;">
                    <li id="course"><a href="/edu/Home/Course" style="color: aliceblue;">课程</a></li>
                    <!-- <li><a href="/edu/Home/CourseTopic" style="color: aliceblue;">话题</a></li> -->
                    <li id="about"><a href="/edu/Home/Index/about" style="color: aliceblue;">关于我们</a></li>
                </ul>
                <!--
                <ul class="nav user-nav">
                    <?php if(empty($user)): ?><li class="hidden-xs"><a href="/edu/Admin/Login/index?goto=/edu/Home/Course/index" style="color: aliceblue;">登录</a></li>
                        <li class="hidden-xs"><a href="/edu/Admin/Register/index?goto=/edu/Home/Course/index" style="color: aliceblue;">注册</a></li>
                        <?php else: ?>
                        <li class="user-avatar-li dropdown nav-hover">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <img class="avatar-xs" src="<?php echo ($user['avatar']); ?>">
                            </a>
                            <ul class="dropdown-menu" role="menu">
                            <li><a href="/edu/Admin/User/index"><i class="fa fa-home"></i>个人中心</a></li> -->
                <!--   <li><a href="/edu/Admin/Index/index"><i class="fa fa-dashboard"></i> 管理后台</a></li>
                                <li><a href="/edu/Home/Course"><i class="fa fa-power-off"></i> 退出登录</a></li> 
                                <li><a href="/Admin/Login/logout?goto=/edu/Home/Course/index"><i class="fa fa-power-off"></i> 退出登录</a></li>
                            </ul>
                        </li><?php endif; ?>
                </ul>
                -->
                <!-- <form class="navbar-form navbar-right hidden-xs hidden-sm" action="/edu/search" method="get">
          <div class="form-group">
            <input class="form-control search" name="q" placeholder="搜索">
            <button class="button es-icon fa fa-search"></button>
          </div>
        </form> -->
            </div>
        </div>
    </nav>
</header>