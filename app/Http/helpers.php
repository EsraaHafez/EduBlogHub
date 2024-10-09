<?php

function getYouTubeID($url)
{
    preg_match("/(youtu\.be\/|youtube\.com\/(watch\?(.*&)?v=|(embed|v|user)\/))([^\?&\"'>]+)/", $url, $matches);
    return $matches[5] ?? null;
}
