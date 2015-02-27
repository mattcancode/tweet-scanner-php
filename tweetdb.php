<?php

/**
*	db.php
*
*	All of the db code needed to insert into and read from the
*	tweet-scanner db is here. It is very trivial and has minimal
*	error handling since this will be reimplemented shortly using
*	Symfony's Doctrine component(?).
*/

class TweetDb
{
	private $dbconnect;

	function __construct()
	{
		require_once('config.db.php');

		$this->dbconnect = mysqli_connect($db_host, $db_user, $db_password, $db_name);

		if ($this->dbconnect)
		{
			// we're good
		}
		else
		{
			$this->error = true;
			$this->error_message = 'cannot connect to db';

			// TODO really ought to throw an exception
		}
	}

	public function fetchLatestTweets($maxrows = 50)
	{
		$query = 'SELECT tweet FROM tweets'
				. ' ORDER BY tweet_id DESC';

		if ($maxrows > 0) {
			$query .= ' LIMIT ' . $maxrows;
		}

		return $this->select($query);
	}

	public function fetchTweetsSince($lastTweetId, $maxrows = 50)
	{
		$query = 'SELECT tweet FROM tweets'
				. ' WHERE tweet_id > ' . $lastTweetId
				. ' ORDER BY tweet_id DESC';

		if ($maxrows > 0) {
			$query .= ' LIMIT ' . $maxrows;
		}

		return $this->select($query);
	}

	public function fetchTopTweeters($maxrows = 5)
	{
		$query = 'SELECT * FROM tweeters'
				. ' ORDER BY tweet_count DESC, screen_name';

		if ($maxrows > 0) {
			$query .= ' LIMIT ' . $maxrows;
		}

		return $this->select($query);
	}

	public function insertTweet($tweetId, $tweet)
	{
		$values = 'tweet_id = ' . $tweetId
				. ', tweet = "' . $tweet . '"';

		$this->insert('tweets', $values);
	}

	public function updateTweeter($userId, $screenName, $profileImageUrl, $count = 1)
	{
		$values = 'user_id = ' . $userId
				. ', screen_name = "' . $screenName . '"'
				. ', profile_image_url = "' . $profileImageUrl . '"'
				. ', tweet_count = ' . $count;

		$this->insert('tweeters', $values, 'tweet_count = tweet_count + ' . $count);

		return;

		$statement = 'INSERT INTO tweeter SET ' . $values
					. ' ON DUPLICATE KEY UPDATE tweet_count = tweet_count + ' . $count;

		//print "executing: " . $statement . "\n";

		mysqli_query($this->dbconnect, $statement);
	}

	private function select($query)
	{
		print "executing: " . $query . "\n";

		$result = mysqli_query($this->dbconnect, $query);

		return $result;
	}

	private function insert($table, $values, $duplicateValues = null)
	{
		$statement = 'INSERT INTO ' . $table . ' SET ' . $values;

		if ($duplicateValues)
		{
			$statement .= ' ON DUPLICATE KEY UPDATE ' . $duplicateValues;
		}

		//print "executing: " . $statement . "\n";

		mysqli_query($this->dbconnect, $statement);
	}

	private function update($table, $values, $where)
	{
		$statement = 'UPDATE ' . $table . ' SET ' . $values . ' WHERE ' . $where;

		//print "executing: " . $statement . "\n";

		mysqli_query($this->dbconnect, $statement);
	}
}

?>
