<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends BaseController {

    public function index()
    {
    	
    	$courses = D('CourseInfoView')->order('course.createdTime')->limit(8)->select();

    	$this->assign('courses', $courses);
    	$this->display();
    }

    public function about ()
    {
    	$this->display();
    }
}