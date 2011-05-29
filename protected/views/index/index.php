<div style="width:320px; float: left;">
	<div id="coin-slider">
		<a href="#">
			<?php echo CHtml::image('images/test1.jpg'); ?>
			<span>test</span>
		</a>
		<a href="#">
			<?php echo CHtml::image('images/test2.jpg'); ?>
			<span>test2</span>
		</a>
	</div>
	
</div>

<div style="float: right;" class="span-14">
	<h1>Newsroom</h1>
</div>

<div class="clearfix"></div>



<script type="text/javascript">
	$(document).ready(function() {
		$('#coin-slider').coinslider({
			width: 320,
			height: 240,
			sDelay: 10
		});
	});
</script>
