<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="mainmenu" class="navbar navbar-default">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items' => array(
				array('label'=>'Главная', 'url'=>array('/site/main'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Зарегистрироваться', 'url'=>array('/site/register')),
				array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
			'htmlOptions' => array(
				'class' => 'nav navbar-nav navbar-right'
			)
		)); ?>
		<span class="navbar-brand navbar-left"><?php echo CHtml::encode(Yii::app()->name); ?></span>
	</div>

	<?php echo $content; ?>

</div>

</body>
</html>
