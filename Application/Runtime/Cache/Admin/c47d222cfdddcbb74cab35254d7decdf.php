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
      
    <!-- content-header start -->
    <section class="content-header">
        <h1>《<?php echo ($course["title"]); ?>》课时管理<small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-home"></i> 后台首页</a></li>
            <li><a href="<?php echo U('Admin/Course/index');?>"><i class="fa fa-graduation-cap"></i> 查看课程</a></li>
            <li class="active"><i class="fa fa-golbe"></i> 课时管理</li>
        </ol>
    </section>
    <!-- content-header end -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">课时列表</h3>
                <div class="pull-right">

                    <!-- <a class="btn btn-warning btn-sm"
                        href="<?php echo U('Admin/CourseMaterial/listByCourseId', array('course_id' => $course['id']));?>">
                        <i class="fa fa-file"></i>&nbsp;&nbsp;文件管理
                    </a> -->

                    <!-- <a class="btn btn-warning btn-sm" href="<?php echo U('Admin/CourseMaterial/uploadModal', array('course_id' => $course['id']));?>">
            <i class="fa fa-user"></i>&nbsp;&nbsp;学员管理
          </a> -->

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <ul class="lesson-list sortable-list" id="course-item-list"
                    data-sort-url="<?php echo U('Admin/CourseLesson/sort', array('course_id' => $course['id']));?>">
                    <?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item['itemType']) == "lesson"): ?><li class="item item-<?php echo ($item["itemType"]); ?> clearfix" id="<?php echo ($key); ?>">
                                <div class="item-content">
                                    <i class="fa fa-file-photo-o text-success"></i> 第 <span
                                        class="number"><?php echo ($item["number"]); ?></span>课时：<?php echo ($item["title"]); ?>
                                    <!-- <?php if(($item['status']) != "published"): ?><span class="text-warning">（未发布）</span><?php endif; ?> -->
                                </div>
                                <div class="item-tools">
                                    <div class="btn" data-toggle="modal" data-target="#modal" data-backdrop="static"
                                        data-url="<?php echo U('Admin/CourseLesson/editLesson', array('course_id' => $course['id'],'lesson_id' => $item['id']));?>">
                                        <i class="fa fa-pencil"></i>&nbsp;&nbsp;编辑</div>
                                    <!-- <div class="btn"><i class="fa fa-eye"></i>&nbsp;&nbsp;预览</div> -->
                                    <div class="btn-group">
                                        <div class="btn dropdown-toggle" data-toggle="dropdown">
                                            <span class="fa fa-angle-down"></span>&nbsp;&nbsp;更多
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <!-- <li><a href="#" data-toggle="modal" data-target="#modal"
                                                    data-backdrop="static"
                                                    data-url="<?php echo U('Admin/CourseLesson/addMaterial', array('course_id' => $course['id'],'lesson_id' => $item['id']));?>"><i
                                                        class="glyphicon glyphicon-paperclip"></i> 添加资料</a></li>
                                            <li class="divider"></li> -->
                                            <!-- <?php if(($item['status']) == "published"): ?><li><a href="#"><i class="fa fa-times-circlr-o"></i> 取消发布</a></li>
                                                <?php else: ?>
                                                <li><a href="#"><i class="fa fa-check-circle-o"></i> 发布</a></li><?php endif; ?> -->
                                            <li><a href="#"><i class="fa fa-trash"></i> 删除</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <?php else: ?>
                            <li class="item item-<?php echo ($item["itemType"]); ?> clearfix" id="<?php echo ($key); ?>">
                                <div class="item-content">
                                    第 <span class="number"><?php echo ($item["number"]); ?></span>
                                    <?php if(($item["type"]) == "chapter"): ?>章
                                        <?php else: ?>节<?php endif; ?>：<?php echo ($item["title"]); ?>
                                </div>
                                <div class="item-tools">
                                    <div class="btn" data-toggle="modal" data-target="#modal" data-backdrop="static"
                                        data-url="<?php echo U('Admin/CourseLesson/editChapter', array('chapter_id' => $item['id'], 'type' => $item['type']));?>">
                                        <i class="fa fa-pencil"></i>&nbsp;&nbsp;编辑</div>
                                    <div class="btn">
                                        <span id="delete" class="fa fa-trash">&nbsp;&nbsp;删除</span>
                                    </div>
                                </div>
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                </ul>

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="pull-left">

                    <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-plus"></i> 添加章节
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#modal" data-backdrop="static"
                                    data-url="<?php echo U('Admin/CourseLesson/addChapter', array('course_id' => $courseId));?>"><i
                                        class="fa fa-plus"></i> 添加章</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal" data-backdrop="static"
                                    data-url="<?php echo U('Admin/CourseLesson/addChapter', array('course_id' => $courseId, 'type' => 'unit'));?>"><i
                                        class="fa fa-plus"></i> 添加节</a></li>
                        </ul>
                    </div>

                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal"
                        data-backdrop="static"
                        data-url="<?php echo U('Admin/CourseLesson/addLesson', array('course_id' => $courseId));?>">
                        <i class="fa fa-plus"></i> 添加课时
                    </button>

                </div>
            </div>

        </div>

    </section>


    </div>

    
    <div id="modal" class="modal fade">
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
        seajs.use('/edu/Public/js/admin/CourseLesson/index.js')
    </script>

</body>
</html>