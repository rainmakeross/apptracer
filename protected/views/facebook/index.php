<?php
/* @var $this FacebookController */

$this->breadcrumbs=array(
	'Facebook',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php $userinfo = Yii::app()->facebook->getInfo();
    var_dump($userinfo);
    // gets the Graph info of the current user ?>
