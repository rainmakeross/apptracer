<?php

class FacebookController extends Controller
{


    var $user, $loginUrl;

	public function actionIndex()
	{
        $loginUrl = Yii::app()->facebook->getLoginUrl();

        $user = Yii::app()->facebook->getUser();
        var_dump($user);

        if($user == 0){
          $this->redirect($loginUrl);
        } else {
          Yii::app()->facebook->ogTags['og:title'] = "My Page Title";
          var_dump($user);
          $this->render('index');
        }



        /*try {
            $user = Yii::app()->facebook->getUser();
        } catch (ErrorException  $e){
            var_dump('test') ;
            $this->redirect($loginUrl);
            Yii::app()->redirect($loginUrl);
        }
        if(!ISSET($e)){
            $user = Yii::app()->facebook->getUser();
            //$app_id = Yii::app()->facebook->getAppId();
            var_dump($user);
            $this->render('index');
        }
        */

	}



	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}