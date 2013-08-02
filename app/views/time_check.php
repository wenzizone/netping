
	<form id="frm_timecheck">
		<div class="left pl-10">
			<select name="idcgroup[]" size="7" multiple="multiple" id="idcgroup[]" class="w-150">
				<?php foreach ($arrayidc as $k => $v): ?>
				<option value="<?php echo $k ?>"><?php echo $v ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<!-- 省份 -->
		<div class="left pl-10">
			<select name="prov[]" size="7" multiple="multiple" id="prov[]" class="w-150">
				<?php foreach($arrayprovince as $v): ?>
				<option value="<?php echo $v;?>"><?php echo $v;?></option>
				<?php endforeach ?>
			</select>
		</div>
	<!-- 网络部分 -->
		<div class="left pl-10 mt-50">
			<select name="network" id="network" class="w-150">
				<?php foreach($arraynetwork as $k => $v): ?>
				<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
				<?php endforeach ?>
			</select>
		</div>
	<!-- 各种查询 -->
		<div class="left pl-10 mt-15">
			<?php foreach ($options as $k=>$v): ?><label>
			<input type="radio" name="options" value="<?php echo $k;?>"
				id="RadioGroup1_0" /><?php echo $v;?></label>
			<?php endforeach ?>
		</div>
	<div class="left mt-50">
		<div class="left pl-10 mt-5">
			<label for="timestart">开始日期:</label>
		</div>

		<div id="timestart" class="input-append left pl-10"> 
			<input data-format="yyyy-MM-dd" type="text" id='stime' readonly class="w-150"></input>
			<span class="add-on">
				<i data-time-icon="icon-time" data-date-icon-"icon-calendar"></i>
			</span>
		</div>

		<div class="left pl-10 mt-5">
			<label for="timeend">结束日期:</label>
		</div>

		<div id="timeend" class="input-append left pl-10"> 
			<input data-format="yyyy-MM-dd" type="text" id="etime" readonly class="w-150"></input>
			<span class="add-on">
				<i data-time-icon="icon-time" data-date-icon-"icon-calendar"></i>
			</span>
		</div>

		<div class="left pl-10">
			<button class="btn" type="button" id="btnsubmit">提交</button>
		</div>
	</div>
		<div class="clear" />
	</form>

<div id="display">
</div>
