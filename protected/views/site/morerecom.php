<?php $this->pageTitle=Yii::app()->name ?>
<?php 
	$this->Widget('zii.widgets.grid.CGridView',array(
		'dataProvider'=>$model,
		'columns'=>array(
			'nickname',
			'email',
			'content',
			'add_time'
		),
	));
?>
<?php $this->Widget('system.web.widgets.pagers.CLinkPager',array(
	'pages'=>$model->pagination,
	'header'=>'',
	'firstPageLabel'=>'首页'
));?>