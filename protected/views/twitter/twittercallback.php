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
    <h3>User Details (referred as Verify Credentials by API)</h3>
    <section id="user_name">
<p><?php foreach ($this->user_name as $key => $data) {

        if (gettype($data) != 'object'){
            echo $key.':'.$data.'<br>';
        };

        //echo '<p>' . $key . ':'.'</p>';
    }; ?></p>
    </section>
    <h3>User Settings </h3>
    <section id = "User_Settings">
        <ul>
            <?php
            //var_dump($this->twuser_settings);

            //echo $this->twuser_settings->always_use_https;

            $data = $this->twuser_settings;







            echo '<ul> <li style="list-style-type:none">'.'always_use_https:'.$data->always_use_https. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'discoverable_by_email:'.$data->discoverable_by_email. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'geo_enabled:'.$data->geo_enabled. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'language:'.$data->language. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'protected:'.$data->protected. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'screen_name:'.$data->screen_name. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'sleep_time - Enabled:'.$data->sleep_time-> enabled. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'sleep_time - End Time:'.$data->sleep_time->end_time. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'sleep_time - Start Time:'.$data->sleep_time->start_time. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'sleep_time - Start Time:'.$data->sleep_time->start_time. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'time_zone - name:'.$data->time_zone->name. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'time_zone - tzinfo_name:'.$data->time_zone->tzinfo_name. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'time_zone - utc_offset:'.$data->time_zone->utc_offset. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'trend_location - country:'.$data->trend_location[0]->country. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'trend_location - countryCode:'.$data->trend_location[0]->countryCode. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'trend_location - name:'.$data->trend_location[0]->name. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'trend_location - parentid:'.$data->trend_location[0]->parentid. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'trend_location - placeType - code:'.$data->trend_location[0]->placeType->code. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'trend_location - placeType - name:'.$data->trend_location[0]->placeType->name. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'trend_location - url:'.$data->trend_location[0]->url. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'trend_location - woeid:'.$data->trend_location[0]->woeid. '</li></ul> ';
            echo '<ul> <li style="list-style-type:none">'.'use_cookie_personalization :'.$data->use_cookie_personalization. '</li></ul> ';






            ?>
        </ul>
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

    <h3>Messages Received </h3>
    <section id = "messages_received">
        <ul>
            <?php

            foreach($this->direct_messages as $key =>$data){

                echo '<li>'.'Id:'.$key. '</li>';
                echo '<ul> <li style="list-style-type:none">'.'Name:'.$data->sender->name. '</li></ul> ';
                echo '<ul> <li style="list-style-type:none">'.'Screen Name:'.$data->sender_screen_name. '</li></ul> ';
                echo '<ul><li style="list-style-type:none"> '.'Tweet Body:'.$data->text. '</li></ul>';
                echo '<ul><li style="list-style-type:none"> '.'Created At:'.$data->created_at. '</li></ul>';

            }

            ?>
        </ul>
    </section>

    <h3>Messages Sent </h3>
    <section id = "messages_received">
        <ul>
            <?php

            foreach($this->direct_messages_sent as $key =>$data){

                echo '<li>'.'Id:'.$key. '</li>';
                echo '<ul> <li style="list-style-type:none">'.'Name:'.$data->recipient->name. '</li></ul> ';
                echo '<ul> <li style="list-style-type:none">'.'Screen Name:'.$data->recipient->screen_name. '</li></ul> ';
                echo '<ul><li style="list-style-type:none"> '.'Tweet Body:'.$data->text. '</li></ul>';
                echo '<ul><li style="list-style-type:none"> '.'Created At:'.$data->created_at. '</li></ul>';

            }

            ?>
        </ul>
    </section>

    <h3>Favorite Tweets </h3>
    <section id = "favorites_list">
        <ul>
            <?php

            foreach($this->favorites_list as $key =>$data){

                echo '<li>'.'Id:'.$key. '</li>';
                echo '<ul> <li style="list-style-type:none">'.'Name:'.$data->user->name. '</li></ul> ';
                echo '<ul> <li style="list-style-type:none">'.'Screen Name:'.$data->user->screen_name. '</li></ul> ';
                echo '<ul><li style="list-style-type:none"> '.'Tweet Body:'.$data->text. '</li></ul>';
                echo '<ul><li style="list-style-type:none"> '.'Created At:'.$data->created_at. '</li></ul>';

            }

            ?>
        </ul>
    </section>

    <h3>Lists I Created or Subscribed </h3>
    <section id = "lists_list">
        <ul>
            <?php

            foreach($this->lists_list as $key =>$data){

                echo '<li>'.'Id:'.$key. '</li>';
                echo '<ul> <li style="list-style-type:none">'.'List Name:'.$data->name. '</li></ul> ';
                echo '<ul> <li style="list-style-type:none">'.'List Creator Name:'.$data->user->name. '</li></ul> ';
                echo '<ul> <li style="list-style-type:none">'.'List Creator Screen Name:'.$data->user->screen_name. '</li></ul> ';
                echo '<ul><li style="list-style-type:none"> '.'List Description:'.$data->description. '</li></ul>';
                echo '<ul><li style="list-style-type:none"> '.'List Created At:'.$data->created_at. '</li></ul>';
                echo '<ul><li style="list-style-type:none"> '.'List Subscriber Count:'.$data->subscriber_count. '</li></ul>';
                echo '<ul><li style="list-style-type:none"> '.'List Member Count:'.$data->member_count. '</li></ul>';

            }

            ?>
        </ul>
    </section>

    <h3>Saved Searches </h3>
    <section id = "saved_searches_list">
        <ul>
            <?php

            foreach($this->saved_searches_list as $key =>$data){

                echo '<li>'.'Id:'.$key. '</li>';
                echo '<ul> <li style="list-style-type:none">'.'Search Name:'.$data->name. '</li></ul> ';
                echo '<ul> <li style="list-style-type:none">'.'Search Query:'.$data->query. '</li></ul> ';
                echo '<ul><li style="list-style-type:none"> '.'Search Created At:'.$data->created_at. '</li></ul>';


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


