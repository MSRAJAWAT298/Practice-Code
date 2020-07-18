<?php
//Get videos from channel by YouTube Data API
$API_key    = 'AIzaSyA8Mhh7DR4_mn89o6ohRwy5SHTYWwRj9pw'; //my API key
$channelID  = 'UC325gI345WdVzDYMTxIQnqw'; //my channel ID
$maxResults = 10;

$video_list = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));
echo "<pre>";
	print_r($video_list);
echo "</pre>";
exit;
foreach ($video_list->items as $item) {

    //Embed video
    if (isset($item->id->videoId)) {
        echo '<div class="">
                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                <h2>'. $item->snippet->title .'</h2>
            </div>';
    } 

}
?>
