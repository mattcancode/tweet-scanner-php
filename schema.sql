
-- this table obviously stores tweets - they are stored as base64-encoded serialized objects
CREATE TABLE IF NOT EXISTS tweets (
	tweet_id BIGINT(20) UNSIGNED NOT NULL,
	tweet TEXT NOT NULL,
	PRIMARY KEY (tweet_id)
);

-- and this one stores accumulated counts for each user that has tweeted
-- so we don't have to hit the potentially large tweet table to determine
-- which tweeters have tweeted the most
CREATE TABLE IF NOT EXISTS tweeters (
	user_id BIGINT(20) UNSIGNED NOT NULL,
	screen_name VARCHAR(20) NOT NULL,
	profile_image_url VARCHAR(200) NOT NULL,
	tweet_count INT(10) NOT NULL,
	PRIMARY KEY (user_id),
	KEY tweet_count (tweet_count)
);
