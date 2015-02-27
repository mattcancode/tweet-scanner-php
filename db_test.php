<?php

require_once('tweetdb.php');

$db = new TweetDb();

//$db->insertTweet(2, 'blah blah blah 2');

//$db->updateTweeter(1, 'tweeter', 'http://blah.png');

print "\nLatest Tweets:\n";

$tweets = $db->fetchLatestTweets();
while ($row = mysqli_fetch_row($tweets))
{
	print base64_decode($row[0]) . "\n";
}

print "\nTop Tweeters:\n";

$tweeters = $db->fetchTopTweeters();
while ($tweeter = mysqli_fetch_assoc($tweeters))
{
	print $tweeter['screen_name'] . " (" . $tweeter['tweet_count'] . ")\n";
}

?>