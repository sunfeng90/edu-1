<?php if (!defined('THINK_PATH')) exit();?><div class="modal-dialog">
  <div class="modal-content">
    <form class="form-horizontal" id="course-chapter-form" method="post" novalidate="novalidate" action="<?php echo U('Admin/CourseLesson/addChapter');?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        <h4 class="modal-title">添加<?php if(($type) == "chapter"): ?>章<?php else: ?>节<?php endif; ?></h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-2 control-label"><?php if(($type) == "chapter"): ?>章<?php else: ?>节<?php endif; ?>标题</label>
          <div class="col-sm-9 controls">
            <input id="title" name="title" class="form-control" type="text">
            <div class="help-block"></div>
          </div>
        </div>

        <input name="course_id" type="hidden" value="<?php echo ($courseId); ?>"/>
        <input name="type" type="hidden" value="<?php echo ($type); ?>"/>
      </div>

      <div class="modal-footer">
        <div id="msg" class="pull-left"></div>
        <button type="button" class="btn btn-link" data-dismiss="modal" id="cancel-btn">取消</button>
        <button id="submit" type="submit" class="btn btn-success" data-loading-text="提交中"><i class="fa fa-check"></i> 提交</button>
      </div>
    </form>
    
    <script type="text/javascript">
      app.load('\/Public\/js\/admin\/CourseLesson\/chapter.js')
    </script>
  </div>
</div>