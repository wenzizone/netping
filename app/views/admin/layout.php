<!DOCTYPE html>
<html>
<head>
	<title>Netping后台</title>
	<base href="<?php echo base_url();?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="static/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="static/css/main.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="static/js/bootstrap.min.js"></script>
	<!-- <script src="http://validatious.org/design/js/validatious.0.9.1.min.js?1256063644"></script> -->
	<script src="static/js/validatious-custom-0.9.1.min.js"></script>
	<script type="text/javascript">
	v2.Field.prototype.successClass = 'success';
	v2.Field.prototype.instant = true;
	v2.Field.prototype.displayErrors = 1;
	v2.Field.prototype.positionErrorsAbove = false;
	v2.Fieldset.prototype.positionErrorsAbove = false;
	</script>
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