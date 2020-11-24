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
        <h1>
            <?php if(!empty($course)): ?>《<?php echo ($course["title"]); ?>》<?php endif; ?>课程资料管理<small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-home"></i> 后台首页</a></li>
            <li><a href="<?php echo U('Admin/Course/index');?>"><i class="fa fa-graduation-cap"></i> 查看课程</a></li>
            <li class="active"><i class="fa fa-golbe"></i> 文件管理</li>
        </ol>
    </section>
    <!-- content-header end -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">文件列表</h3>
                <div class="pull-right">

                    <a class="btn btn-warning btn-sm"
                        href="<?php echo U('Admin/CourseLesson/index', array('course_id' => $course['id']));?>">
                        <i class="fa fa-file-video-o"></i>&nbsp;&nbsp;课时管理
                    </a>
                    <!-- <a class="btn btn-warning btn-sm" href="<?php echo U('Admin/CourseMaterial/uploadModal', array('course_id' => $course['id']));?>">
                        <i class="fa fa-user"></i>&nbsp;&nbsp;学员管理
                    </a> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover v-center">
                    <tbody>
                        <tr>
                            <th class="text-center">
                                <input id="checkall" type="checkbox" />
                            </th>
                            <th class="text-center">ID</th>
                            <th class="text-center">文件名称</th>
                            <th class="text-center">文件类型</th>
                            <th class="text-center hidden-xs">文件大小</th>
                            <th class="text-center hidden-xs">URI</th>
                            <th class="text-center hidden-xs">创建时间</th>
                            <th class="text-center">操作</th>
                        </tr>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td class="text-center">
                                    <input name="check" type="checkbox" value="<?php echo ($vo["id"]); ?>" />
                                </td>
                                <td class="text-right"><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["title"]); ?></td>
                                <td class="text-center"><?php echo ($vo["ext"]); ?></td>
                                <td class="text-center hidden-xs"><?php echo (format_bytes($vo["size"])); ?></td>
                                <td class="text-center hidden-xs"><?php echo ($vo["uri"]); ?></td>
                                <td class="text-center hidden-xs"><?php echo ($vo["createdtime"]); ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-xs delete" data-id="<?php echo ($vo["id"]); ?>"
                                        data-placement="left"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="pull-left">
                    <span id="deleteAll" class="btn btn-warning btn-sm" data-placement="top">批量删除</span>
                </div>
                <div class="pull-right">
                    <?php echo ($page); ?>
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
        seajs.use('/edu/Public/js/admin/CourseMaterial/index.js')
    </script>

</body>
</html>