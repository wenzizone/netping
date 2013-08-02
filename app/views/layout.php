<!DOCTYPE html>
<html>
<head>
    <title>网络ping测试</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= _CSS_ ?>bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?= _CSS_ ?>main.css" rel="stylesheet" media="screen">
    <link href="<?= _CSS_ ?>bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?= _JS_ ?>bootstrap.min.js"></script>
    <script src="<?= _JS_ ?>bootstrap-datetimepicker.min.js"></script>
    <script src="<?= _JS_ ?>highchart/highcharts.js"></script>
    <script src="<?= _JS_ ?>main.js"></script>
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
                    <?php foreach ($nav as $row): ?>
                    <li class="<?php if($row['key'] == $nav_cur):?>active<?php endif?>"><a href="<?= $row['link'] ?>"><?= $row['title'] ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="clear" />
            <div style="width:1190px">
                <?= $content_body ?>
            </div>
        </div>
    </div>

</body>
</html>