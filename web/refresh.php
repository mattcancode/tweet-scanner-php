<?php

require_once('../lib/tweetdb.php');

header('Content-Type: application/json');

$tweetdb = new TweetDb();

$tweets = array();
$tweeters = array();

$result = $tweetdb->fetchLatestTweets();
while ($row = mysqli_fetch_row($result))
{
	array_push($tweets, unserialize(base64_decode($row[0])));
}

$result = $tweetdb->fetchTopTweeters();
while ($tweeter = mysqli_fetch_assoc($result))
{
	array_push($tweeters, $tweeter);
}

print json_encode(array('tweets' => $tweets, 'tweeters' => $tweeters));

?>
