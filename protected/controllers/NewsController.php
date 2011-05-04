<?php

class NewsController extends Controller
{
	
	public function actionIndex(){
		$model = ContentNews::model()->findAll();
		$this->render('index', array('model' => $model));
	}
	
	public function actionView($id){
		$modelComm = new Comment;
		
		if(isset($_POST['Comment'])){
		$modelComm->content_id = $id;
		$modelComm->date = time();
		$modelComm->attributes=$_POST['Comment'];
			if($modelComm->save())
				$this->redirect(array('view','id'=>$id));
			}
			
		$comm = Comment::model()->findAll(array(
			'select' => '*',
			'condition' => 'content_id=:commID',
			'params' => array(':commID' => $id ),
			'order' => 'date ASC',
		));
		
		$this->render('view', array(
			'model' => $this->loadModel($id),
			'modelComm' => $modelComm,
			'comm' => $comm,
		));
	}
	
	
	public function loadModel($id){
		$model=ContentNews::model()->findByPk((int)$id);
		if($model===null)
			//throw new CHttpException(404,'The requested page does not exist.');
			$this->redirect(array('index','id'=>$id));
		return $model;
	}
}
?>