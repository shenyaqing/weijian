<?php $this->pageTitle=Yii::app()->name ?>
<h1>精彩推荐</h1>
<ul>
<?php foreach($model->getData() as $v):?>
	<li><?php echo $v->content.'<br>&nbsp;&nbsp;&nbsp;'.$v->add_time;?></li><span style="float:right"><?php echo $v->num?>个答案</span>
<?php endforeach;?>
</ul>
<?php $this->Widget('system.web.widgets.pagers.CLinkPager',array(
	'pages'=>$model->pagination,
	'header'=>'',
	'firstPageLabel'=>'首页'
));?>