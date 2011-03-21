<?php
$this->breadcrumbs=array(
	'Publisher'=>array('/publisher'),
	'View',
);?>
<?php /* @var $model Publisher */ ?>
<h1><?php echo $model->name; ?></h1>

Członkowie teamu <?php echo $model->name; ?>:<br/>
<br/>

<?php
	$i = 1;
	/* @var $member Member */
?>
<?php foreach ($model->members as $member): ?>
	<?php echo $i++; ?>. <?php echo $member->user->name; ?>
	<br/>
<?php endforeach; ?>

