<?php if (!defined('THINK_PATH')) exit();?><div class="modal-dialog">
  <div class="modal-content">
    <form class="form-horizontal" id="course-form" method="post" novalidate="novalidate" action="<?php echo U('Admin/Course/edit');?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        <h4 class="modal-title">添加课程</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label class="col-sm-3 control-label">标题</label>
          <div class="col-sm-8 controls">
            <input id="course_title" name="title" required="required" class="form-control" type="text" value="<?php echo ($course["title"]); ?>">
            <div class="help-block"></div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">副标题</label>
          <div class="col-sm-8 controls">
            <textarea id="course_subtitle" name="subtitle" class="form-control"><?php echo ($course["subtitle"]); ?></textarea>
            <div class="help-block"></div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">简介</label>
          <div class="col-sm-8 controls">
            <textarea name="about" class="form-control"><?php echo ($course["about"]); ?></textarea>
            <div class="help-block"></div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">连载状态</label>
          <div class="col-sm-8 radio">
            <label>
              <input name="serializeMode" value="none" <?php if(($course['serializemode']) == "none"): ?>checked="checked"<?php endif; ?> type="radio"> 非连载课程
            </label>
            <label>
              <input name="serializeMode" value="serialize" <?php if(($course['serializemode']) == "serialize"): ?>checked="checked"<?php endif; ?> type="radio"> 连载中
            </label>
            <label>
              <input name="serializeMode" value="finished" <?php if(($course['serializemode']) == "finished"): ?>checked="checked"<?php endif; ?> type="radio"> 已完结
            </label>
          </div>
        </div>

        <input type="hidden" name="course_id" value="<?php echo ($course["id"]); ?>" />

      </div>
      <div class="modal-footer">
        <div id="msg" class="pull-left"></div>
        <button id="submit" type="submit" class="btn btn-success btn-sm" data-loading-text="提交中..."><i class="fa fa-check"></i> 提交</button>
      </div>
    </form>

    <script type="text/javascript">
      app.load('\/edu\/Public\/js\/admin\/Course\/edit.js')
    </script>

  </div>
</div>