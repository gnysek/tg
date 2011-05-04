<?php
$this->breadcrumbs=array(
	'Niusy',
);

foreach ($model as $news)
{ ?>
	<div>
		<h1><?php echo CHtml::link($news->title,array('/news/view/','id'=>$news->content_id)); ?></h1>Autor: <?php echo $news->content->user->name; ?><br/>
		<p><?php echo $news->text; ?></p><br/>
<!--		<h2>Treść-długa:<?php echo $news->more; ?></h2><br/>-->
	</div>
	
	
<?php 

} ?>