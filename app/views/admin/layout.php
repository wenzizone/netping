<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap 101 Template</title>
	<base href="<?php echo base_url();?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="static/css/bootstrap.min.css" rel="stylesheet" media="screen">
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
				<div class="well sidebar-nav">
					<ul class="nav nav0list">
						<li class="nav-header">Sidebar</li>
						<li><a href="#">服务器配置</a></li>
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