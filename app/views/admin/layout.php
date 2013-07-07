<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap 101 Template</title>
	<base href="<?php echo base_url();?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="static/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="static/css/main.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="static/js/bootstrap.min.js"></script>
</head>
<body style="padding-top:60px; padding-bottom:40px">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="/index.php/admin/">网络ping测试后台</a>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3">
				<div class="well">
					<ul class="nav nav-list">
						<li class="nav-header">测试机房管理</li>
						<li><a href="#">服务器查看</a></li>
						<li><a href="/index.php/admin/add_servers">服务器添加</a></li>				
					</ul>
				</div>
			</div>
			<div class="span9">
				<?= $content_body ?>
			</div>
		</div>
	</div>

</body>
</html>