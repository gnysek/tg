<?php
$this->breadcrumbs = array(
	'Teamy / Wydawcy' => array('/publisher'),
	'View',
);

$this->menu = array(
	array('label' => 'Wróć', 'url' => array('index')),
);

if ($model->isPublisherAdmin())
	array_unshift($this->menu, array('label' => 'Edytuj', 'url' => array('update', 'id' => $model->publisher_id)));
?>
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

