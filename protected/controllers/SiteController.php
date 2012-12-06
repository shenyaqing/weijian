<?php

class SiteController extends Controller
{
	public function actionLists($kid = '')
	{
		if(!empty($kid)){
			$model = new Questions();
			$model->kid = $kid;
			$recom = $model->search(1);
			$wait = $model->getwait(12);
			
			$key = new Keyword();
			$kwords = $key->search();
			
			$this->render('lists',array(
				'model'=>$recom,
				'wait'=>$wait,
				'keywords'=>$kwords,
			));
		}else{
			throw new CHttpException(404,'您的关键词，没有相关的问题!');
		}
		
	}
	
	public function actionMorerecom($kid = ''){
		if(!empty($kid)){
			$model = new Questions();
			$model->kid = $kid;
			$model = $model->search(2);
			$this->render('morerecom',array(
				'model'=>$model,
			));
		}else{
			throw new CHttpException(404,'您的关键词，没有相关的问题!');
		}
	}
	
	public function actionMorewait($kid = ''){
		if(!empty($kid)){
			$model = new Questions();
			$model->kid = $kid;
			$model = $model->getwait(1);
			$this->render('morewait',array(
				'model'=>$model,
			));
		}else{
			throw new CHttpException(404,'您的关键词，没有相关的问题!');
		}
	}
	
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
	
}