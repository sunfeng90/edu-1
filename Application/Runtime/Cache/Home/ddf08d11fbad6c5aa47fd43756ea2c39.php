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
  
  
<div class="course-intro-head">
 <div class="container">
   <ol class="breadcrumb">
    <li><a href="/edu/">首页</a></li>
    <li><a href="/edu/Home/Course/intro">课程介绍</a></li>
    <li class="active">详情</li>
  </ol>
  <div class="course-detail clearfix">

    <div class="course-img">
      <img class="img-responsive" src="/edu/Public/images/course1.jpg">
      <div class="tags"></div>
    </div>

    <div class="course-info">
      <h2 class="title"><?php echo ($course["title"]); ?></h2>
      <div class="subtitle"><?php echo ($course["subtitle"]); ?></div>
      <div class="metas">
        <div class="score">
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star-o"></i>
          <span>(0人)</span>
        </div>
      </div>
    </div>

    <div class="course-op clearfix">
      <div class="student-num hidden-xs">
        <i class="fa fa-user"></i>1人
      </div>

      <ul class="course-data clearfix ">
        <li id="unfavorite-btn" data-toggle="tooltip" data-placement="top" data-original-title="取消收藏" data-url="/course/7/unfavorite" style="display:none;">
          <a href="javascript:;" class="color-primary">
            <p><i class="fa fa-bookmark-o"></i></p>
            <p>已收藏</p>
          </a>
        </li>

        <li id="favorite-btn" data-toggle="tooltip" data-placement="top" data-original-title="收藏课程" data-url="/course/7/favorite">
          <a href="javascript:;">
            <p><i class="fa fa-bookmark"></i></p>
            <p>收藏</p>
          </a>
        </li>

        <li>
          <span class="share top">
            <a class="dropdown-toggle" href="" data-toggle="dropdown">
              <p><i class="fa fa-share-alt"></i></p>
              <p>分享</p>
            </a>
                      
            <div class="dropdown-menu" data-title="详情" data-summary="" data-message="" data-url="" data-picture="">
              <a href="javascript:;" class="js-social-share" data-cmd="weixin" title="分享到微信" data-share="weixin" data-qrcode-url=""><i class="fa fa-weixin"></i></a>
              <a href="javascript:;" class="js-social-share" data-cmd="tsina" title="分享到新浪微博" data-share="weibo"><i class="fa fa-weibo"></i></a>
              <a href="javascript:;" class="js-social-share" data-cmd="qq" title="分享到QQ好友" data-share="qq"><i class="fa fa-qq"></i></a>
            </div>

          </span>
        </li>

      </ul>

      <div class="learn">
        <?php if(empty($member)): ?><a class="btn btn-warning btn-lg" href="#modal" data-toggle="modal" data-url="/edu/Home/Course/learn?course_id=<?php echo ($course['id']); ?>">加入学习</a>
        <?php else: ?>
        <a class="btn btn-warning btn-lg" href="/edu/Home/Course/continue?course_id=<?php echo ($course['id']); ?>">继续学习</a><?php endif; ?>
      </div>

    </div>

  </div>

 </div>
</div>

<div class="course-content">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-9">
        <div class="course-detail">

          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#course-lesson" role="tab" data-toggle="tab">课时列表</a></li>
            <?php if(!empty($member)): ?><li><a href="#course-material" role="tab" data-toggle="tab">资料</a></li><?php endif; ?>
            <li><a href="#course-comment" role="tab" data-toggle="tab">评价</a></li>
            <li><a href="#course-topic" role="tab" data-toggle="tab">话题</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade in active" id="course-lesson">
              <ul class="lesson-list">
              <?php if(is_array($lessonItems)): $i = 0; $__LIST__ = $lessonItems;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item['itemType']) == "lesson"): ?><li class="item item-<?php echo ($item["itemType"]); ?> clearfix" id="<?php echo ($key); ?>">
                <?php if(empty($member)): ?><div data-target="#modal" data-toggle="modal" data-url="/edu/Home/CourseLesson/preview?lesson_id=<?php echo ($item["id"]); ?>">
                  <i class="fa fa-file-movie-o text-danger"></i> <?php echo ($item["number"]); ?>：<?php echo ($item["title"]); ?>
                </div>
                <?php else: ?>
                <a href="/edu/Home/CourseLesson/learn?lesson_id=<?php echo ($item["id"]); ?>">
                  <i class="fa fa-file-movie-o text-danger"></i> <?php echo ($item["number"]); ?>：<?php echo ($item["title"]); ?>
                </a><?php endif; ?>
                  
                </li>
                <?php else: ?>
                <li class="item item-<?php echo ($item["itemType"]); ?> clearfix" id="<?php echo ($key); ?>">
                  <div class="item-content">
                    <?php if(($item["type"]) == "chapter"): ?><i class="fa fa-list"></i>
                    第 <span class="number"><?php echo ($item["number"]); ?></span>章
                    <?php else: ?>
                    第 <span class="number"><?php echo ($item["number"]); ?></span>节<?php endif; ?>
                    ：<?php echo ($item["title"]); ?>
                  </div>
                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
            <?php if(!empty($member)): ?><div class="tab-pane fade" id="course-material">
              资料列表
            </div><?php endif; ?>
            <div class="tab-pane fade" id="course-comment">
              评价列表
            </div>
            <div class="tab-pane fade" id="course-topic">
              话题列表
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-4 col-lg-3"></div>
    </div>
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
  
  <script type="text/javascript">
    seajs.use('/edu/Public/js/Home/Course/intro.js')
  </script>

</body>
</html>