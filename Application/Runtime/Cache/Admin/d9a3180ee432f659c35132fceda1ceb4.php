<?php if (!defined('THINK_PATH')) exit();?><div class="modal-dialog modal-lg">
  <div class="modal-content">
    <form class="form-horizontal lesson-form" id="course-lesson-form" method="post" novalidate="novalidate" action="<?php echo U('Admin/CourseLesson/editLesson');?>">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        <h4 class="modal-title">编辑课时</h4>
      </div>

      <div class="modal-body">

        <div class="form-group">
          <label class="col-sm-2 control-label">类型</label>
          <div class="col-sm-7 controls">
            <div class="radio">
              <label><input type="radio" name="type" value="video" <?php if(($lesson["type"]) == "video"): ?>checked="checked"<?php endif; ?> > 视频</label>
              <label><input type="radio" name="type" value="text" <?php if(($lesson["type"]) == "text"): ?>checked="checked"<?php endif; ?> > 图文</label>
            </div>
            <div class="help-block"></div>
          </div>
          <div class="col-sm-2">
            <div class="checkbox">
              <label><input type="checkbox" name="free" value="1" <?php if(($lesson['free']) == "1"): ?>checked<?php endif; ?> > 免费课时</label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">标题</label>
          <div class="col-sm-9 controls">
            <input name="title" required="required" class="form-control" type="text" value="<?php echo ($lesson["title"]); ?>">
            <div class="help-block"></div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">简介</label>
          <div class="col-sm-9 controls">
            <textarea name="summary" class="form-control"><?php echo ($lesson["summary"]); ?></textarea>
            <div class="help-block"></div>
          </div>
        </div>

        <div class="form-group for-text-type">
          <label class="col-sm-2 control-label">内容</label>
          <div class="col-md-9 controls">
            <textarea class="form-control" id="lesson-content-field" name="content" data-image-upload-url="" data-flash-upload-url=""><?php echo ($lesson["content"]); ?></textarea>
          <div class="help-block"></div>
          </div>
        </div>

        <div class="form-group for-video-type">
          <label class="col-sm-2 control-label">视频</label>
          <div class="col-sm-9 controls">
            <div id="media-choosers">
              <div class="file-chooser" id="video-chooser" data-params-url="" data-hls-encrypted="" data-targetType="" data-targetId="">
               
                <div class="file-chooser-bar">
                  <div id="media-name"><?php echo ($lesson["medianame"]); ?></div>
                </div>

                <div class="nav-tabs-custom file-chooser-main">

                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">上传视频</a></li>
                    <li><a href="#tab_2" data-toggle="tab">从课程文件中选择</a></li>
                  </ul>

                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                      <div class="file-chooser-uploader">

                        <div class="file-chooser-uploader-label">选择你要上传的视频文件：</div>
                  
                        <div class="file-chooser-uploader-control" id="file-selected">
                          <div class="btn btn-default">
                            <i class="fa fa-folder-o fa-fw"></i> 选择文件
                            <input type="file" id="video_file"/>
                          </div>
                        </div>

                        <div class="progress file-chooser-uploader-progress" style="display: none;">
                          <div class="progress-bar progress-bar-striped progress-bar-sm progress-bar-warning active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                            <!-- <span class="sr-only">45% Complete</span> -->
                          </div>
                        </div>

                        <div class="bg-warning file-chooser-uploader-progress-message"></div>
                        <div class="alert alert-info-c">
                          <ul>
                            <li>支持<strong>mp4</strong>格式的视频文件上传，文件大小不能超过200M<strong></strong></li>
                          </ul>
                        </div>

                      </div>

                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                      <div id="file-browser" class="file-browser">
                        <?php if(empty($materialList)): ?><div class="empty">暂无视频文件，请先上传。</div>
                        <?php else: ?>
                          <?php if(is_array($materialList)): $i = 0; $__LIST__ = $materialList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$material): $mod = ($i % 2 );++$i;?><div class="item" data-file-id="<?php echo ($material["fileid"]); ?>" data-file-uri="<?php echo ($material["uri"]); ?>"  data-file-title="<?php echo ($material["title"]); ?>"><?php echo ($material["title"]); ?></div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                      </div>
                    </div>
                    <!-- /.tab-pane -->
                  </div>

                </div>

              </div>
              <input name="media_name" type="hidden" value="<?php echo ($lesson["medianame"]); ?>"/>
              <input name="media_id" type="hidden" value="<?php echo ($lesson["mediaid"]); ?>"/>
              <input name="media_uri" type="hidden" value="<?php echo ($lesson["mediauri"]); ?>"/>
              <input name="course_id" type="hidden" value="<?php echo ($lesson["courseid"]); ?>"/>
              <input name="lesson_id" type="hidden" value="<?php echo ($lesson["id"]); ?>"/>
            </div>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <div id="msg" class="pull-left"></div>
        <button type="button" class="btn btn-link" data-dismiss="modal" id="cancel-btn">取消</button>
        <button id="submit" type="submit" class="btn btn-success" data-loading-text="提交中..."><i class="fa fa-check"></i> 提交</button>
      </div>

    </form>
    <script type="text/javascript">
      app.load('/edu/Public/js/admin/CourseLesson/edit.js')
    </script>
  </div>
</div>