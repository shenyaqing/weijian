<?php $this->pageTitle=Yii::app()->name ?>
<h1>待回答的问题</h1>
<ul>
<?php foreach($model->getData() as $v):?>
	<li><?php echo $v->content.'&nbsp;&nbsp;'.$v->add_time.'<br>';?></li>
	<span style="float:right">
		<input type="button" value="我也要回答"/>
	</span>
<?php endforeach;?>
</ul>
<?php 
$this->Widget('system.web.widgets.pagers.CLinkPager',array(
	'pages' => $model->pagination,
	'header'=>'',
	'firstPageLabel'=>'首页'
));
?>