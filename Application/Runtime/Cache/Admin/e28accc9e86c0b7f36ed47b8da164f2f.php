<?php if (!defined('THINK_PATH')) exit();?><div class="modal-dialog">
  <div class="modal-content">
    <form class="form-horizontal" id="lesson-material-form" method="post" novalidate="novalidate" action="<?php echo U('Admin/CourseLesson/addMaterial');?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        <h4 class="modal-title">添加资料</h4>
      </div>

      <div class="modal-body">
        <div class="box-body">
        <table class="table table-bordered table-hover v-center">
          <tbody><tr>
            <th class="text-center" width="80">勾选</th>
            <th class="text-center">名称</th>
          </tr>
          <?php if(is_array($materialList)): $i = 0; $__LIST__ = $materialList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td class="text-center">
              <input name="check_ids[]" type="checkbox" value="<?php echo ($vo["id"]); ?>" <?php if(($vo['lessonid']) == $lessonId): ?>checked="checked"<?php endif; ?> />
            </td>
            <td><?php echo ($vo["title"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>

        <input name="course_id" type="hidden" value="<?php echo ($courseId); ?>"/>
        <input name="lesson_id" type="hidden" value="<?php echo ($lessonId); ?>"/>
      </div>

      <div class="modal-footer">
        <div id="msg" class="pull-left"></div>
        <button type="button" class="btn btn-link" data-dismiss="modal" id="cancel-btn">取消</button>
        <button id="submit" type="submit" class="btn btn-success" data-loading-text="提交中"><i class="fa fa-check"></i> 提交</button>
      </div>
    </form>
    
    <script type="text/javascript">
      app.load('/edu/Public/js/admin/CourseLesson/add-material.js')
    </script>
  </div>
</div>