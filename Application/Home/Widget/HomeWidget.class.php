<?php
/**
 *    HomeWidget(Home\Controller\HomeWidget.class.php)
 *
 *    功　　能：前台首页Widget扩展控制器
 */
namespace Home\Widget;
use Home\Controller\BaseController;
use Think\Controller;

class HomeWidget extends BaseController
{
    public function header()
    {
        $this->assign('user', $this->user);

        return $this->fetch('widget/header');
    }

    public function sidebar()
    {
    	$setting = $this->getSetting();

    	// return $this->fetch('widget/sidebar');
    	return '';
    }

}