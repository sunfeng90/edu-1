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
  
  
  <div class="course-learn">
    <div class="course-learn-dashboard course-learn-dashboard-open" id="course-learn-dashboard">
      <div class="dashboard-content">
        <a class="btn btn-warning back" href="/edu/Home/Course/intro/course_id/<?php echo ($lesson["courseid"]); ?>"><span class="fa fa-chevron-left"></span> 返回课程</a>
        <div class="dashboard-head">
          <span class="lesson-title">课时<?php echo ($lesson["number"]); ?>：<?php echo ($lesson["title"]); ?></span>
        </div>
        <div class="dashboard-body">
          <?php if(($lesson["type"]) == "video"): ?><div id="lesson-video-content">
          </div><?php endif; ?>
          <?php if(($lesson["type"]) == "text"): ?><div class="lesson-content lesson-content-text" id="lesson-text-content">
            <div class="content"><?php echo ($lesson["content"]); ?></div>
          </div><?php endif; ?>
        </div>
        <div class="dashboard-foot clearfix">
          <div class="pull-right">
            <a class="btn btn-warning"  href="/edu/" style=""><span class="fa fa-square-o"></span> 学过了</a>
          </div>
        </div>
      </div>
      <div class="toolbar" id="dashboard-toolbar">
        <ul class="toolbar-nav">
          <li class="active"><a href="#toolbar-lesson-list" role="tab" data-toggle="tab" href=""><i class="fa fa-list"></i>目录</a></li>
          <!-- <li><a href="#toolbar-files" role="tab" data-toggle="tab" href=""><i class="fa fa-cloud-download"></i>资料</a></li>
          <li><a href="#toolbar-topic" role="tab" data-toggle="tab" href=""><i class="fa fa-question-circle"></i>问答</a></li> -->
        </ul>
        <div class="toolbar-content">
          <div class="tab-pane active" id="toolbar-lesson-list"></div>
          <div class="tab-pane" id="toolbar-files">
            <?php if(empty($files)): ?><h4 class="alert alert-warning">暂无课时资料</h4>
            <?php else: ?>
              <h4 class="">课时资料</h4>
              <ul>
                <?php if(is_array($files)): $i = 0; $__LIST__ = $files;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?><li><a href="/edu/Home/File/download/id/<?php echo ($file["fileid"]); ?>" target="_blank"><?php echo ($file["title"]); ?></a><small> [<?php echo (format_bytes($file["size"])); ?>]</small></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul><?php endif; ?>
          </div>
          <div class="tab-pane" id="toolbar-topic">
            <div class="question-list-pane">
              <div data-role="list-pane" >
                <form id="lesson-question-form" method="post" action="/edu/CourseLesson/addQuestion/course_id/<?php echo ($lesson["courseid"]); ?>/lesson_id/<?php echo ($lesson["id"]); ?>">

                  <div class="form-group">
                    <div class="controls">
                      <input type="text" id="question_title" name="question[title]" required="required" class="form-control expand-form-trigger" placeholder="我要提问" data-display="标题" />
                    </div>
                  </div>

                  <div class="form-group detail-form-group">
                    <div class="controls">
                      <textarea id="question_content" name="question[content]" required="required" class="form-control" rows="5" placeholder="详细描述你的问题" data-image-upload-url=""></textarea>
                    </div>
                  </div>

                  <div class="form-group detail-form-group">
                    <div class="controls clearfix">
                      <button class="btn btn-warning btn-sm pull-right" type="submit">提问</button>
                      <button class="btn btn-link btn-sm pull-right" type="button">取消</button>
                    </div>
                  </div>

                  <input type="hidden" id="question_courseId" name="question[courseId]" />
                  <input type="hidden" id="question_lessonId" name="question[lessonId]" />
                </form>

                <ul class="media-list thread-list-small" data-role="list">
                  <li class="text-center">此课时还没有问题</li>
                </ul>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  
  <?php echo W('Home/sidebar', array());?>
  

  

  
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
    var lesson = {};
    lesson.id = '<?php echo ($lesson["id"]); ?>';
    lesson.type = '<?php echo ($lesson["type"]); ?>';
    lesson.courseId = '<?php echo ($lesson["courseid"]); ?>';
    seajs.use('/edu/Public/js/Home/CourseLesson/learn.js')
  </script>

</body>
</html>