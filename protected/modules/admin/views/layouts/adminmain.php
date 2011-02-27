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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'ACP', 'url'=>array('/admin')),
				array('label'=>'Zawartosc', 'url'=>array('/admin/content')),
				array('label'=>'Z/News', 'url'=>array('/admin/contentNews')),
				array('label'=>'Z/Grafiki', 'url'=>array('/admin/contentImage')),
				array('label'=>'Z/Wideo', 'url'=>array('/admin/contentVideo')),
				array('label'=>'Z/Głosy', 'url'=>array('/admin/contentVote')),
				array('label'=>'Z/Komentarze', 'url'=>array('/admin/comment')),
				array('label'=>'Gry', 'url'=>array('/admin/game')),
				array('label'=>'G/Bugtracker', 'url'=>array('/admin/gameBugtracker')),
				array('label'=>'G/Komentarze', 'url'=>array('/admin/gameComment')),
				array('label'=>'G/Grafiki', 'url'=>array('/admin/gameImage')),
				array('label'=>'G/Wideo', 'url'=>array('/admin/gameVideo')),
				array('label'=>'G/Głosy', 'url'=>array('/admin/gameVote')),
				array('label'=>'Ranking', 'url'=>array('/admin/ranking')),
				array('label'=>'R/Gry', 'url'=>array('/admin/rankingGame')),
				array('label'=>'R/Głosy', 'url'=>array('/admin/rankingVote')),
				array('label'=>'Forum', 'url'=>array('/admin/forum')),
				array('label'=>'Kategorie', 'url'=>array('/admin/fcat')),
				array('label'=>'Tematy', 'url'=>array('/admin/topic')),
				array('label'=>'Posty', 'url'=>array('/admin/post')),
				array('label'=>'Użytkownicy', 'url'=>array('/admin/user')),
				array('label'=>'Wydawcy', 'url'=>array('/admin/publisher')),
				array('label'=>'Members', 'url'=>array('/admin/member')),
				array('label'=>'Home', 'url'=>array('/')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?>.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>