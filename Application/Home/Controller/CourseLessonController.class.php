<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class CourseLessonController extends BaseController
{
    public function __construct()
    {
        // 课时操作需要登录
        $this->ajaxLogin();
        parent::__construct();
    }

    public function learn()
    {
        $lessonId = I('request.lesson_id', 0);

        if ($lessonId <=0 ) {
            $this->error('课时ID不合法');
        }

        $lesson = M('CourseLesson')->field('id,courseId,title,type,number,content,mediaUri')->where("id={$lessonId}")->find();
        $lesson['mediauri'] = '/edu'.C('UPLOAD_DIR').$lesson['mediauri'];
        // 获取课程话题
        $topic = M('CourseTopic')->where("lessonId={$lessonId}")->select();
        // 获取课程资料
        $files = D('CourseMaterialInfoView')->where("lessonId={$lessonId}")->select();

        $this->assign('lesson', $lesson);
        $this->assign('topic', $topic);
        $this->assign('files', $files);
    	$this->display();
    }

    /**
     *  课时预览
     */
    public function preview()
    {

    }

    public function playVideo()
    {
        $lessonId = I('request.lesson_id', 0);

        if ($lessonId <= 0 ) {
            $this->error('课时ID不合法');
        }

        $lesson = M('CourseLesson')->field('id,title,type,mediaUri')->where("id={$lessonId}")->find();
        
        $file = array();

        if ($lesson) {
            // 去除路径中第一个出现的点字符
            $formerUri = '/edu'.C('UPLOAD_DIR').$lesson['mediauri'];
            $suffixname = substr(strrchr($formerUri, '.'), 1);  // 获取后缀名
            $filename= str_replace(strrchr($formerUri, "."),"",$formerUri); // 获取文件名（不带后缀）
            $cleanname = str_replace('.','',$filename); // 删除文件名中的点
            $file['url'] = 'http://localhost'.$cleanname.'.'.$suffixname;
            $file['type'] = $lesson['type'];
        }
        
        $this->assign('file', $file);
        $this->assign('user', $this->user);
        $this->display('Play/play-video');
    }

}