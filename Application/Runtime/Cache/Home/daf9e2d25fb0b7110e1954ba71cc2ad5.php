<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
  <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
  <meta name="renderer" content="webkit">
  <meta name="viewport"
    content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="/edu/Public/css/play.css">
</head>

<body style="overflow:auto;border:0px;">
  <div style="display: flex; display: -webkit-flex; align-items:center; justify-content:center;height: 100%; width: 100%;">
    <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="300px" height="400px"
      poster="/edu/Public/images/course2.jpg" autoplay="true">
      <source src="<?php echo ($file["url"]); ?>" type="video/mp4">
    </video>
    <!-- <div id="lesson-video-content" class="local-video-player vjs-default-skin" data-user-id="<?php echo ($user["id"]); ?>"
      data-file-id="<?php echo ($file["id"]); ?>" data-file-type="<?php echo ($file["type"]); ?>" data-url="<?php echo ($file["url"]); ?>" data-player="<?php echo ($player); ?>"
      style="height:100%"></div> -->
  </div>
  <script type="text/javascript">
    var app = {}

    app.version = '<?php echo C('VERSION');?>'

    app.config = {
      loading_img_path: "\/edu\/Public\/images\/loading.svg"
    }
  </script>
  <script src="https://vjs.zencdn.net/7.10.2/video.js"></script>
  <script type="text/javascript" src="/edu/Public/lib/seajs/seajs/2.2.1/sea.js"></script>
  <script type="text/javascript" src="/edu/Public/lib/seajs-global-config.js"></script>
  <script type="text/javascript">
    seajs.use('/edu/Public/js/Home/Play/play-video.js')
  </script>
</body>

</html>