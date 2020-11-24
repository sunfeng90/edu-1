<?php if (!defined('THINK_PATH')) exit();?><ul class="lesson-list">
  <?php if(is_array($lessonItems)): $i = 0; $__LIST__ = $lessonItems;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item['itemType']) == "lesson"): ?><li class="item item-<?php echo ($item["itemType"]); ?> clearfix <?php if(($item['id']) == $lessonId): ?>active<?php endif; ?>" id="<?php echo ($key); ?>">
      <?php if(($item['id']) == $lessonId): ?><span>
          <i class="fa <?php if(($item["type"]) == "video"): ?>fa-file-movie-o<?php else: ?>fa-file-text-o<?php endif; ?> text-danger"></i> <?php echo ($item["number"]); ?>：<?php echo ($item["title"]); ?>
        </span>
      <?php else: ?>
        <a href="/edu/Home/CourseLesson/learn?lesson_id=<?php echo ($item["id"]); ?>">
          <i class="fa <?php if(($item["type"]) == "video"): ?>fa-file-movie-o<?php else: ?>fa-file-text-o<?php endif; ?> text-danger"></i> <?php echo ($item["number"]); ?>：<?php echo ($item["title"]); ?>
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