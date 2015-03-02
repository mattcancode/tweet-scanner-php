# tweet-scanner-php

This was an intial attempt at creating a [PHP][1] web app that fetches
tweets from [Twitter][6] and displays them in a browser. The original
task was to do that using [PHP][1] and the [Symfony][2] framework, but
time was short and I was completely unfamiliar with [Symfony][2] and
barely more experienced with [PHP][1]. Since there were a lot of other
new technologies to explore (e.g [Amazon Web Services][10] cloud
computing and the [Twitter Streaming API][4]) as well as some others
that were familiar but a bit rusty (using [MySQL][8] and configuring
[Apache][11]), I opted to put together a version that used vanilla [PHP][1].

With this simpler prototype in place, migrating it to [Symfony][2] actually
wasn't a bit deal. Figuring out some of the poorly document setup ended up
being at least as time-consuming as writing the code. (Seriously?? The initial
app.php doesn't actually run but app_dev.php does?!? Perhaps that ought to be
at the top of the Quick Tour!)

You can find that much improved version here:
(https://github.com/mattcancode/tweet-scanner-symfony)[https://github.com/mattcancode/tweet-scanner-symfony]

[1]:  http://www.php.net/
[2]:  http://symfony.com/
[3]:  http://www.doctrine-project.org/
[4]:  https://dev.twitter.com/streaming/overview
[5]:  http://www.sublimetext.com/
[6]:  http://www.twitter.com/
[7]:  https://github.com/fennb/phirehose
[8]:  http://www.mysql.com/
[9]:  https://dev.twitter.com/rest/public
[10]: http://aws.amazon.com/
[11]: http://httpd.apache.org/
