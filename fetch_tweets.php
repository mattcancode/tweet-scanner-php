<?php

require_once('lib/Phirehose.php');
require_once('lib/OauthPhirehose.php');

require_once('tweetdb.php');
require_once('config.oauth.php');

class Consumer extends OauthPhirehose
{
  private $tweetdb;

  public function setPersist($persist = true)
  {
    if ($persist)
    {
      if (!$this->tweetdb) {
        print "creating TweetDb ...\n";
        $this->tweetdb = new TweetDb();
      }
    }
    else
    {
      $this->tweetdb = null;      
    }
  }

  public function enqueueStatus($status)
  {
    $data = json_decode($status, true);

    if (!is_array($data))
    {
      print "WARNING: ignoring tweet since it couldn't be decoded properly\n";
    }
    else if (!isset($data['id']))
    {
      print "WARNING: ignoring tweet since id is missing\n";
    }
    elseif (!isset($data['user'])) {
      print "WARNING: ignoring tweet since user is missing\n";
    }
    else
    {
      $user = $data['user'];

      print "processing tweet (id = " . $data['id'] . ", user = " . $user['screen_name'] . ")\n";

      if ($this->tweetdb)
      {
        $this->tweetdb->insertTweet($data['id'], base64_encode($status));

        if (isset($user['screen_name']))
        {
          $this->tweetdb->updateTweeter($user['id'], $user['screen_name'], $user['profile_image_url']);
        }
      }
      else
      {
        print $status . "\n";
        print $user['screen_name'] . ':' . $data['id'] . ': ' . urldecode($data['text']) . "\n";
      }
    }
  }
}

$consumer = new Consumer(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
$consumer->setTrack(array('IBM'));
$consumer->setPersist();
$consumer->consume();

?>
