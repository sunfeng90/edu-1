<?php
/**
 *    CourseMaterialInfoViewModel(Admin\Model\CourseMaterialInfoViewModel.class.php)
 *
 *    功　　能：课程资料详细信息视图
 */
namespace Home\Model;

use Think\Model\ViewModel;

class CourseMaterialInfoViewModel extends ViewModel
{
    public $viewFields = array(
        'course_material' => array(
            'title',
            'fileId',
            '_type'=>'LEFT'
        ),
        'file' => array(
            'size',
            '_on'=>'course_material.fileId=file.id',
        )
    );
}