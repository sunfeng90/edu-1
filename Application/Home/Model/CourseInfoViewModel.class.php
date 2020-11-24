<?php
/**
 *    CourseInfoViewModel(Admin\Model\CourseInfoViewModel.class.php)
 *
 *    功　　能：课程详细信息视图
 *
 */
namespace Home\Model;

use Think\Model\ViewModel;

class CourseInfoViewModel extends ViewModel
{
    public $viewFields = array(
        'course' => array(
            'id',
            'title',
            'studentNum',
            'hitNum',
            '_type'=>'LEFT'
        ),
        'course_topic' => array(
            'postNum',
            '_on'=>'course.id=course_topic.courseId',
        )
    );
}