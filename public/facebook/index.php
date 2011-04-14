<?php
$app_id = "121909831214890";
$app_secret = "d8aba023d1e5ce937e9407efb758c266";
$canvas_page = "http://apps.facebook.com/dev_tab_test/";

$auth_url = "http://www.facebook.com/dialog/oauth?client_id=" . $app_id . "&redirect_uri=" . urlencode($canvas_page) . "&scope=email,read_stream";

$signed_request = $_REQUEST["signed_request"];

list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);


?>
<!doctype html> 

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
	Remove this if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Facebook Tab Page</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<style>
	body{
		width: 560px;
		margin: 0 auto;
	}
	</style>
</head>

<body lang="en" >
	<header id="top">
		header
	</header>

	<div id="main" role="main">
		<?
		if (empty($data["user_id"])) {
			echo("<script> top.location.href='" . $auth_url . "'</script>");
		} else {
			//echo ("Welcome User: " . $data["user_id"]);
			?>
				<pre>
					<?
					print_r($data);
					?>
				</pre>
			<?
		}
		?>
		<?php
		/*
		 * <fb:serverFbml width="740px">
			<script type="text/fbml">
				<fb:fbml>
					<fb:request-form method='POST' invite=true type='My Great Canvas Application' content='Would you like to join me in this great application?'>
					<fb:multi-friend-selector cols=3 actiontext="Invite your friends to join you in this application"/>
					</fb:request-form>
				</fb:fbml>
			</script>
		</fb:serverFbml>
		* */
		?>
		<div id="testPlayground">
			
		</div>
		<script>
		
		</script>
	</div>
	<footer id="bottom" class="clearfix small-gradient">
		footer
	</footer>
	<!-- facebook's dom playground -->
	<div id="fb-root"></div>
	<?php
	/*<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.4.4.js"%3E%3C/script%3E'))</script>*/
	?>
	<script>
	window.log = function(){
	  log.history = log.history || [];   // store logs to an array for reference
	  log.history.push(arguments);
	  if(this.console) console.log( Array.prototype.slice.call(arguments) );
	};
	// Facebook Init
	window.fbAsyncInit = function() {
		//localhost key: 	155369171175391
		//development key: 	150248088358433
		FB.init({
			appId: '121909831214890',
			status: true,
			cookie: true,
			xfbml: true
		});
		<?php
		if (!empty($data["user_id"])){
			?>
				FB.api(
				  {
				    method: 'fql.query',
				    query: 'SELECT name FROM user WHERE uid=<?php echo $data['user_id']; ?>'
				  },
				  function(response) {
					//alert(response[0].name)
					log(response);
				  }
				);
			<?php
		}
		?>
	};
	(function() {
		var e = document.createElement('script'); e.async = true;
		e.src = document.location.protocol +
		'//connect.facebook.net/en_US/all.js';
		document.getElementById('fb-root').appendChild(e);
	}());
	</script>
	
</body>
</html>