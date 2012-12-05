<?php

class SiteController extends Controller
{
	public function actionIndex($kid)
	{
		if(!empty($kid)){
			$model = new Questions();
			$recom = $model->search(1);
			$wait = $model->getwait(1);
			$this->render('index',array(
				'model'=>$recom,
				'wait'=>$wait,
			));
		}else{
			throw new CHttpException('您的关键词，没有相关的问题!');
		}
		
	}
	
	public function actionMorerecom($kid){
		if(!empty($kid)){
			$model = new Questions();
			$model = $model->search(2);
			$this->render('morerecom',array(
				'model'=>$model,
			));
		}else{
			throw new CHttpException('您的关键词，没有相关的问题!');
		}
	}
	
	public function actionMorewait($kid){
		if(!empty($kid)){
			$model = new Questions();
			$model = $model->getwait(2);
		}else{
			throw new CHttpException('您的关键词，没有相关的问题!');
		}
	}
}