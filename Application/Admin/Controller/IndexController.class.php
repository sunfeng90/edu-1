<?php
/**
 *          IndexController(Admin\Controller\IndexController.class.php)
 *
 *    功　　能：后台首页控制器
 */

namespace Admin\Controller;

class IndexController extends BaseController {


    /**
     * index
     *
     * 1 检测用户是否登录
     * 1.1 如果用户已经登录，提示用户已经登录，如若重复登录请先退出当前账户
     * 1.2 如果用户没有登录，显示登录界面
     */
    public function index()
    {
        $this->display();
    }


    public function login()
    {
        $uid = md5('123');

        session('id', $uid, time()+3600);
        cookie('id', $uid, time()+3600);
    }
}