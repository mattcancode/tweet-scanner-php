<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1">

	<title>Tweet Scanner</title>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-3.3.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/tweet-scanner.css" />
</head>

<body>
	<div role="banner" class="navbar navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<div class="navbar-brand">
					<span><img src="img/Twitter_logo_blue_32.png"></span>
					<span>Tweet Scanner</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
			<div class="row">
				<div id="tweets" class="tweets col-xs-offset-2 col-xs-5">
					Tweets will go here.
				</div>
				<div id="tweeters" class="tweeters col-xs-offset-1 col-xs-2">
					Tweeters will go here.
				</div>
			</div>
		</div>

	</div>

	<script src="vendor/jquery-1.11.2/jquery-1.11.2.min.js"></script>
	<script src="js/tweet-scanner.js"></script>
	<!--
	<script src="lib/vendor/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
	-->
</body>
</html>