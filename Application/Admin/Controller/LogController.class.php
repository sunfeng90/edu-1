<?php
/**
 *          LogController(Admin\Controller\BaseController.class.php)
 *
 *    功　　能：日志控制器
 *
 */

namespace Admin\Controller;


class LogController extends BaseController
{
    public function delete(){
        $ids = I('post.check_ids');

        // 数据校验
        if (count($ids) <= 0) {
            $this->ajaxReturn(array(
                'success' => false,
                'message' => '请选择至少一个元素'
            ));
        }

        $ids = implode(',', $ids);

        // 从数据库中删除
        $data = M('log')->where("id in({$ids})")->delete();

        if ($data) {
            $this->ajaxReturn(array(
                'success' => true,
                'message' => "成功删除{$data}个记录"
            ));
        } else {
            $this->ajaxReturn(array(
                'success' => false,
                'message' => '删除失败'
            ));
        }

    }

    public function deleteTest()
    {
        $this->ajaxReturn(array(
            'success' => true,
            'message' => '删除失败'
        ));
    }
}