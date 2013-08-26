<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name;
?>

<p>Список пользователей и их компаний</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $dataProvider,
	'columns' => array(
		'email:email:E-mail',
		'company:text:Компания'
	)
)); ?>