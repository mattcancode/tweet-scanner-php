<?php

require_once('tweetdb.php');

$db = new TweetDb();

//$db->insertTweet(2, 'blah blah blah 2');

//$db->updateTweeter(1, 'tweeter', 'http://blah.png');

//print "\nLatest Tweets:\n";

$tweets = array();

$result = $db->fetchLatestTweets();
while ($row = mysqli_fetch_row($result))
{
	array_push($tweets, unserialize(base64_decode($row[0])));
	//print json_encode(unserialize(base64_decode($row[0]))) . "\n";
}

//print json_encode($tweets) . "\n";

//print "\nTop Tweeters:\n";

$tweeters = array();

$result = $db->fetchTopTweeters();
while ($tweeter = mysqli_fetch_assoc($result))
{
	array_push($tweeters, $tweeter);
	//print $tweeter['screen_name'] . " (" . $tweeter['tweet_count'] . ")\n";
}

//print json_encode($tweeters);

header('Content-Type: application/json');
print json_encode(array('tweets' => $tweets, 'tweeters' => $tweeters));

?>