<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util\Request;
use Org\Util\BinaryFileResponse;
use Org\Util\FileToolkit;

class FileController extends BaseController {

    public  $uid = 0;
    public  $user = array();

    public function download()
    {
        $id = I('get.id', 0);

        if ($id > 0) {

            $file = M('file')->where("id={$id}")->find();
            $file['uri'] = C('UPLOAD_DIR').$file['uri'];

            if ($file) {
                $request = Request::createFromGlobals();
                $response = $this->createPrivateFileDownloadResponse($request, $file);
                $response->prepare($request);
                $response->send();
                exit();
            }
        }

        echo '文件不存在';
    }


    // protected function createPrivateFileDownloadResponse($file)
    // {

    //     $response = BinaryFileResponse::create($file['uri'], 200, array(), false);
    //     $response->trustXSendfileTypeHeader();

    //     $file['filename'] = urlencode($file['originname']);
    //     if (preg_match("/MSIE/i", $_REQUEST['User-Agent'])) {
    //         $response->headers->set('Content-Disposition', 'attachment; filename="'.$file['filename'].'"');
    //     } else {
    //         $response->headers->set('Content-Disposition', "attachment; filename*=UTF-8''".$file['filename']);
    //     }

    //     $mimeType = FileToolkit::getMimeTypeByExtension($file['ext']);
    //     if ($mimeType) {
    //         $response->headers->set('Content-Type', $mimeType);
    //     }

    //     return $response;
    // }

    protected function createPrivateFileDownloadResponse(Request $request, $file)
    {

        $response = BinaryFileResponse::create($file['uri'], 200, array(), false);
        $response->trustXSendfileTypeHeader();

        $file['filename'] = urlencode($file['originname']);
        if (preg_match("/MSIE/i", $request->headers->get('User-Agent'))) {
            $response->headers->set('Content-Disposition', 'attachment; filename="'.$file['filename'].'"');
        } else {
            $response->headers->set('Content-Disposition', "attachment; filename*=UTF-8''".$file['filename']);
        }

        $mimeType = FileToolkit::getMimeTypeByExtension($file['ext']);
        if ($mimeType) {
            $response->headers->set('Content-Type', $mimeType);
        }

        return $response;
    }


}