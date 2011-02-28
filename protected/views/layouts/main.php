<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tg.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<div id="logotext">
				<a href="<?php Yii::app()->createUrl(''); ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
			</div>
			<div id="logomenu">
				<?php
				$this->widget('zii.widgets.CMenu', array(
						'items' => array(
								array('label' => 'Główna', 'url' => array('/site/index')),
								array('label' => 'Newsy', 'url' => array('/news')),
								array('label' => 'Forum', 'url' => array('/forum')),
								array('label' => 'Gry', 'url' => array('/game')),
								array('label' => 'Wydawcy', 'url' => array('/publisher')),
								array('label' => 'Rankingi', 'url' => array('/ranking')),
//								array('label' => 'About', 'url' => array('/site/page')),
//								array('label' => 'Kontakt', 'url' => array('/site/contact')),
								array('label' => 'Admin', 'url' => array('/admin'), 'visible' => Yii::app()->user->admin),
								array('label' => 'Zaloguj', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
								array('label' => 'Wyloguj (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
						),
				));
				?>
			</div><!-- mainmenu -->
		<div class="clear"></div>
		</div><!-- logo -->
	</div><!-- header -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>