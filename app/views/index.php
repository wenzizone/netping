<div>
	<form id="frm_timecheck">
		<div class="left">
			<select name="idcgroup[]" size="7" multiple="multiple" id="idcgroup[]">
				<?php foreach ($arrayidc as $k => $v): ?>
				<option value="<?php echo $k ?>"><?php echo $v ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<!-- 省份 -->
		<div class="left">
			<select name="prov[]" size="7" multiple="multiple" id="prov[]">
				<?php foreach($arrayprovince as $v): ?>
				<option value="<?php echo $v;?>"><?php echo $v;?></option>
				<?php endforeach ?>
			</select>
		</div>
	<!-- 网络部分 -->
		<div class="left">
			<select name="network" id="network">
				<?php foreach($arraynetwork as $k => $v): ?>
				<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
				<?php endforeach ?>
			</select>
		</div>
	<!-- 各种查询 -->
		<div class="left">
			<?php foreach ($options as $k=>$v): ?><label>
			<input type="radio" name="Radio" value="<?php echo $k;?>"
				id="RadioGroup1_0" /><?php echo $v;?></label>
			<?php endforeach ?>
		</div>

		<div class="left">
			<label for="timestart">开始日期:</label>
		</div>

		<div id="timestart" class="input-append left"> 
			<input data-format="yyyy-MM-dd" type="text" id='stime'></input>
			<span class="add-on">
				<i data-time-icon="icon-time" data-date-icon-"icon-calendar"></i>
			</span>
		</div>

		<div class="left">
			<label for="timeend">结束日期:</label>
		</div>

		<div id="timeend" class="input-append left"> 
			<input data-format="yyyy-MM-dd" type="text" id="etime"></input>
			<span class="add-on">
				<i data-time-icon="icon-time" data-date-icon-"icon-calendar"></i>
			</span>
		</div>

		<div class="left">
			<button class="btn" type="button" id="btnsubmit">提交</button>
		</div>
		<div class="clear" />
	</form>
</div>
<div id="display" style="padding-left:50%">
</div>
