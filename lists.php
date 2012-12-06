<?php $this->pageTitle=Yii::app()->name ?>
<?php 
	$this->Widget('zii.widgets.grid.CGridView',array(
		'dataProvider'=>$model,
		'columns'=>array(
			'nickname',
			'email',
			'add_time',
			'content',
			'num'
		),
	));
?>
<?php 
	$this->Widget('system.web.widgets.pagers.CLinkPager',array(
		'pages'=>$model->pagination,
	));
?>


<h1>精彩推荐</h1>
<ul>
<?php foreach($model->getData() as $v):?>
	<li><?php echo $v->content.'<br>';?></li><span style="float:right"><?php echo $v->num;?>个答案</span>
	
<?php endforeach;?>
</ul>


<h1>待回答的问题</h1>
<ul>
<?php foreach($wait->getData() as $va):?>
	<li><?php echo $va->content.'<br>';?></li><span style="float:right">0个答案</span>
<?php endforeach;?>
</ul>


<h1>热门词条</h1>
<ul>
<?php foreach($keywords as $key=>$val):?>
	<li><?php echo $val->keyword.'<br>';?><?php echo $key+1?></li>
<?php endforeach;?>
</ul>


