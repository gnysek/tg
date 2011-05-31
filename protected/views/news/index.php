<?php
$this->breadcrumbs=array(
	'tworzegry.pl',
);

foreach ($model as $news)
{ ?>
	<div>
		<div class="prebar">
			<div class="bar"><div><?php echo CHtml::link($news->title,array('/news/view/','id'=>$news->content_id)); ?></div></div>
		</div>
		Autor: <?php echo $news->content->user->name; ?><br/>
		<p><?php echo $news->text; ?></p><br/>
<!--		<h2>Treść-długa:<?php echo $news->more; ?></h2><br/>-->
	</div>
	
	
<?php 

} ?>