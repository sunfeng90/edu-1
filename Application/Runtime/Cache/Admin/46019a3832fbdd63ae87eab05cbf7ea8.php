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
    <h1>话题管理<small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-home"></i> 后台首页</a></li>
      <li class="active"><i class="fa fa-golbe"></i> 查看话题</li>
    </ol>
  </section>
  <!-- content-header end -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">话题列表</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-hover v-center">
          <tbody><tr>
            <th class="text-center">
              <input class="checkall" type="checkbox" />
            </th>
            <th class="text-center">ID</th>
            <th class="text-center">话题名称</th>
            <th class="text-center">话题内容</th>
            <th class="text-center">回复/查看</th>
            <th class="text-center hidden-xs">属性</th>
            <th class="text-center hidden-xs">作者</th>
            <th class="text-center">操作</th>
          </tr>
          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td class="text-center">
              <input name="check" type="checkbox" value="<?php echo ($vo["id"]); ?>"/>
            </td>
            <td class="text-right"><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["title"]); ?></td>
            <td><?php echo ($vo["content"]); ?></td>
            <td class="text-center"><?php echo ($vo["postnum"]); ?> / <?php echo ($vo["hitnum"]); ?></td>
            <td class="text-center hidden-xs">
              <?php if(($vo["iselite"]) == "0"): ?><span class="btn btn-default btn-sm ajax-op" data-url="<?php echo U('Admin/CourseTopic/elite', array('id' => $vo['id']));?>">精</span>
              <?php else: ?>
                <span class="btn btn-success btn-sm ajax-op"  data-url="<?php echo U('Admin/CourseTopic/unelite', array('id' => $vo['id']));?>">精</span><?php endif; ?>
              <?php if(($vo["isstick"]) == "0"): ?><span class="btn btn-default btn-sm ajax-op" data-url="<?php echo U('Admin/CourseTopic/stick', array('id' => $vo['id']));?>">顶</span>
              <?php else: ?>
                <span class="btn btn-success btn-sm ajax-op" data-url="<?php echo U('Admin/CourseTopic/unstick', array('id' => $vo['id']));?>">顶</span><?php endif; ?>
            </td>
            <td class="text-center hidden-xs"><?php echo ($vo["username"]); ?></td>
            <td class="text-center">
              <button type="button" class="btn btn-warning btn-sm ajax-op" data-url="<?php echo U('Admin/CourseTopic/delete', array('id' => $vo['id']));?>"><i class="fa fa-trash"></i></button>
            </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody></table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <div class="pull-left">
<!--           <label class="checkbox-inline"><input class="checkall" type="checkbox" /> 全选</label> -->
          <span id="deleteAll" class="btn btn-warning btn-sm" data-placement="top">批量删除</span>
        </div>
        <div class="pull-right">
          <?php echo ($page); ?>
        </div>
      </div>

    </div>

  </section>


    </div>

    
  <div id="modal" class="modal fade" role="dialog">
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
    seajs.use('/edu/Public/js/admin/CourseTopic/index.js')
  </script>

</body>
</html>