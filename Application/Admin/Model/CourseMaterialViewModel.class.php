<?php
/**
 *    CourseMaterialViewModel(Admin\Model\CourseMaterialViewModel.class.php)
 *
 *    功　　能：课程资料视图
 */
namespace Admin\Model;

use Think\Model\ViewModel;

class CourseMaterialViewModel extends ViewModel
{
    public $viewFields = array(
        'course_material' => array(
            'id',
            'title',
            'fileId',
            '_type'=>'LEFT'
        ),
        'file' => array(
            'ext',
            'size',
            'createdTime',
            'uri',
            '_on'=>'course_material.fileId=file.id',
        )
    );
}