<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' lang='en'>
	<!--<![endif]-->
	<head>
		<meta charset='utf-8' />
		<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
		<title>Photos</title>
		
		<meta content='jQuery Plugin to make jQuery Cycle Plugin work as a fullscreen background image slideshow' name='description' />
		<meta content='Aaron Vanderzwan' name='author' />
		
		<meta name="distribution" content="global" />
		<meta name="language" content="en" />
		<meta content='width=device-width, initial-scale=1.0' name='viewport' />
		
		<link rel="stylesheet" href="lib/css/jquery.maximage.css?v=1.2" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="lib/css/screen.css?v=1.2" type="text/css" media="screen" charset="utf-8" />
		
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		
		<style type="text/css" media="screen">			
			#maximage {
/*				position:fixed !important;*/
			}
			
			/*Set my logo in bottom left*/
			#logo {
				bottom:30px;
				height:auto;
				left:30px;
				position:absolute;
				width:34%;
				z-index:1000;
			}
			#logo img {
				width:100%;
			}
			
		</style>
		
		<!--[if IE 6]>
			<style type="text/css" media="screen">
				/*Please Upgrade Your Browser*/
				#gradient {display:none;}
			</style>
		<![endif]-->
	</head>
	<body>
		<a id="logo">
                  <div>This is a test</div>
                </a>
		
		<div id="maximage">
                  <?php include("photos.php");?>
		</div>
		
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js'></script>
		<script src="lib/js/jquery.cycle.all.js" type="text/javascript" charset="utf-8"></script>
		<script src="lib/js/jquery.maximage.js" type="text/javascript" charset="utf-8"></script>
		
		<script type="text/javascript" charset="utf-8">
			$(function(){
				// Trigger maximage
				jQuery('#maximage').maximage();
			});

                  document.body.addEventListener("mousedown", fullscreen, false);
                  function fullscreen(){
                    var element = document.body;
                    element.requestFullscreen = element.requestFullscreen ||
                        element.mozRequestFullscreen ||
                        element.mozRequestFullScreen ||
                        element.webkitRequestFullscreen;

                    element.requestFullscreen();
                  }

		</script>
		
  </body>
</html>
