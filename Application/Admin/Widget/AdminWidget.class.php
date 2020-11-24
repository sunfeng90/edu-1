<?php
/**
 *    AdminWidget(Admin\Controller\AdminWidget.class.php)
 *
 *    功　　能：后台首页Widget扩展控制器
 */
namespace Admin\Widget;
use Admin\Controller\BaseController;
use Think\Controller;

class AdminWidget extends BaseController
{
    public function header()
    {
        $uid = $this->uid;
        $user = getUserById($uid);

        $this->assign('user', $user);

        return $this->fetch('widget/header');
    }

    public function sidebar()
    {
        $sideBar = getSideBar();

        // 查找当前节点的path
        $path = getPathByTree($sideBar, __ACTION__);

        $this->assign('sidebar', $sideBar);
        $this->assign('path', $path);

    	return $this->fetch('widget/sidebar');
    }

}