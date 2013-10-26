<?php
/* @var $this TwitterController */

$this->breadcrumbs=array(
    'Twitter',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>



<p><?php foreach ($this->user_name as $key => $data) {
        var_dump($data);
        //echo '<p>' . $key . ':'.'</p>';
    }; ?></p>
<h1>Followers List:</h1>
<ul>
<?php
    //var_dump($this->friend_list->users);
    foreach ($this->friend_list->users as $data) {
    echo '<li>';
    echo 'Screen Name:'. $data->screen_name;
        echo '</li>';
    }; ?></p>

</ul>
