<?php
/* @var $this TwitterController */

$this->breadcrumbs=array(
    'Twitter',
);
?>


<?php
    Yii::app()->clientScript->registerPackage('accordion');
?>




<div id="accordion">
    <h3>User Details (referred as User Name by API)</h3>
    <section id="user_name">
<p><?php foreach ($this->user_name as $key => $data) {

        if (gettype($data) != 'object'){
            echo $key.':'.$data.'<br>';
        };

        //echo '<p>' . $key . ':'.'</p>';
    }; ?></p>
    </section>
    <h3>Follower List</h3>
    <section id = "follower_list">

        <ul>
        <?php
            //var_dump($this->friend_list->users);
            foreach ($this->friend_list->users as $data) {
            echo '<li>';
            echo 'Screen Name:'. $data->screen_name;
                echo '</li>';
            }; ?>
            </p>

        </ul>
    </section>
    <h3>Mentions Timelines </h3>
    <section id = "mentions_timelines">
        <ul>
<?php
    //var_dump($this->mentions_timelines);
    foreach($this->mentions_timelines as $key =>$data){

        echo '<li>'.'Id:'.$key. '</li>';
            echo '<ul> <li style="list-style-type:none">'.'Screen Name:'.$data->user->screen_name. '</li></ul> ';
                echo '<ul><li style="list-style-type:none"> '.'Tweet Body:'.$data->text. '</li></ul>';
                    echo '<ul><li style="list-style-type:none"> '.'Tweet Body:'.$data->created_at. '</li></ul>';

    }

?>
        </ul>
    </section>
    <h3>User Timelines </h3>
    <section id = "user_timelines">
        <ul>
            <?php

            foreach($this->user_timelines as $key =>$data){

                echo '<li>'.'Id:'.$key. '</li>';
                    echo '<ul> <li style="list-style-type:none">'.'Screen Name:'.$data->user->screen_name. '</li></ul> ';
                        echo '<ul><li style="list-style-type:none"> '.'Tweet Body:'.$data->text. '</li></ul>';
                            echo '<ul><li style="list-style-type:none"> '.'Created At:'.$data->created_at. '</li></ul>';

            }

            ?>
        </ul>
    </section>

    <h3>Home Timelines </h3>
    <section id = "home_timelines">
        <ul>
            <?php

            foreach($this->home_timelines as $key =>$data){

                echo '<li>'.'Id:'.$key. '</li>';
                echo '<ul> <li style="list-style-type:none">'.'Screen Name:'.$data->user->screen_name. '</li></ul> ';
                echo '<ul><li style="list-style-type:none"> '.'Tweet Body:'.$data->text. '</li></ul>';
                echo '<ul><li style="list-style-type:none"> '.'Created At:'.$data->created_at. '</li></ul>';

            }

            ?>
        </ul>
    </section>

    <h3>Retweets </h3>
    <section id = "retweets">
        <ul>
            <?php

            foreach($this->retweets as $key =>$data){

                echo '<li>'.'Id:'.$key. '</li>';
                echo '<ul> <li style="list-style-type:none">'.'Screen Name:'.$data->user->screen_name. '</li></ul> ';
                echo '<ul><li style="list-style-type:none"> '.'Tweet Body:'.$data->text. '</li></ul>';
                echo '<ul><li style="list-style-type:none"> '.'Created At:'.$data->created_at. '</li></ul>';

            }

            ?>
        </ul>
    </section>

</div>



<script>
    $(function() {
        $( "#accordion" ).accordion({defaultOpen:'user_name',collapsible: true, heightStyle: "content"});
    });
</script>


