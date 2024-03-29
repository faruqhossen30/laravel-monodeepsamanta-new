<?php
function acronym($string = '')
{
    $words = explode(' ', $string);
    if (!$words) {
        return false;
    }
    $result = '';
    foreach ($words as $word) $result .= $word[0];
    return strtoupper($result);
}


function video_link($data){
    $url = $data->pull_zone.'/'.$data->video_id.'/play_'.$data->resolution.'.mp4';
    return $url;
}
