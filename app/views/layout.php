<!DOCTYPE html>
<html>
<head>
    <title>网络ping测试</title>
    <base href="<?php echo base_url();?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="static/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="static/css/main.css" rel="stylesheet" media="screen">
    <link href="static/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/bootstrap-datetimepicker.min.js"></script>
    <script src="static/js/main.js"></script>
</head>
<body style="padding-top:60px; padding-bottom:40px">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="/">网络ping测试</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9 offset1">
                <ul class="nav nav-pills">
                    <li><a href="/index.php/#">查看最新结果</a></li>
                    <li><a href="/index.php/#">按城市查看</a></li>
                    <li><a href="/index.php/#">按时间查看查看</a></li>                
                </ul>
            </div>
            <div class="span9">
                <?= $content_body ?>
            </div>
        </div>
    </div>

</body>
</html>