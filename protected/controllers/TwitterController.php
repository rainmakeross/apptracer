<?php

class TwitterController extends Controller
{

    public $friend_list = '';
    public $follower_list = '';
    public $user_name = '';

    public function actions()
    {
        return array();
    }


    public function actionIndex()
    {
        $this->redirect(Yii::app()->homeUrl.'/twitter/twitterlogin');
    }


    public function actionTwitterLogin(){
        //JUST TO BUILD A SESSION
        $isguest = Yii::app()->user->getIsGuest();
        //JUST TO BUILD A SESSION

        //grab twitter object and request token
        $twitter = Yii::app()->twitter->getTwitter();
        $callbackurl='http://apptracer.com/index.php/twitter/TwitterCallBack'; // this is your callback url!!!!
        $request_token = $twitter->getRequestToken($callbackurl);
        #$request_token = $twitter->getRequestToken();

        //set some session info
        $_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
        $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

        if($twitter->http_code == 200){
            //get twitter connect url
            $url = $twitter->getAuthorizeURL($token);
            //send them
            $this->redirect($url);
        }else{
            //error here
            $this->redirect(Yii::app()->homeUrl);
        }

    }



    public function actionTwitterCallBack() {
        /* If the oauth_token is old redirect to the connect page. */
        if (isset($_REQUEST['oauth_token']) && Yii::app()->session['oauth_token'] !== $_REQUEST['oauth_token']) {
            Yii::app()->session['oauth_status'] = 'oldtoken';
        }

        /* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
        $twitter = Yii::app()->twitter->getTwitterTokened(Yii::app()->session['oauth_token'], Yii::app()->session['oauth_token_secret']);

        /* Request access tokens from twitter */
        $access_token = $twitter->getAccessToken($_REQUEST['oauth_verifier']);

        /* Save the access tokens. Normally these would be saved in a database for future use. */
        Yii::app()->session['access_token'] = $access_token;

        /* Remove no longer needed request tokens */
        unset(Yii::app()->session['oauth_token']);
        unset(Yii::app()->session['oauth_token_secret']);

        if (200 == $twitter->http_code) {
            /* The user has been verified and the access tokens can be saved for future use */
            Yii::app()->session['status'] = 'verified';

            //get an access twitter object
            $twitter = Yii::app()->twitter->getTwitterTokened($access_token['oauth_token'],$access_token['oauth_token_secret']);

            //get user details
            $twuser= $twitter->get("account/verify_credentials");
            //get friends ids
            $friends= $twitter->get("friends/ids");
            //get followers ids
            $followers= $twitter->get("followers/ids");
            //tweet
            $result=$twitter->post('statuses/update', array('status' => "Tweet message"));
            //var_dump($twuser->screen_name);

            //$twitter_id = $twuser->id;
            //print_r($followers);

            //get friend lookups
            $friend_lookup = $twitter->get("followers/list", array('screen_name'=>$twuser->screen_name));

            //print_r($friend_lookup);

            $this-> follower_list  = $followers;
            $this-> friend_list = $friend_lookup;
            $this-> user_name = $twuser;
            $this->render('twittercallback');

        } else {
            /* Save HTTP status for error dialog on connnect page.*/
            //header('Location: /clearsessions.php');
            $this->redirect(Yii::app()->homeUrl);
        }
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