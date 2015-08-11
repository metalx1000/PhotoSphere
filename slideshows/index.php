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
        width:100%;
        z-index:1000;
      }
      #logo img {
        width:100%;
      }

      #info {
        position: absolute; 
        bottom: 0px; 
        width: 50%;
        opacity: 0.4;
        color: #ffffff;
        padding: 5px;
        margin:5px;
        font-family: Monospace;
        font-size: 15px;
        text-align: center;
      }.info{
        background-color: #000000;
        border-radius: 10px;
        padding: 5px;
        margin:5px;

      }

      #sold{
        display: none;
        position: absolute;
        width: 25%;
        top: 40%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
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
      <div id="info">
        <div class="info">
          <div id="address"></div>
          <div id="agent"></div>
          <div id="phone"></div>
        </div>
      </div>
    </a>
    
    <div id="maximage">
      <?php include("getPhotos.php");?>
    </div>

    <!--sold image-->
    <img src="../res/sold.png" id="sold">

 
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js'></script>
    <script src="lib/js/jquery.cycle.all.js" type="text/javascript" charset="utf-8"></script>
    <script src="lib/js/jquery.maximage.js" type="text/javascript" charset="utf-8"></script>
    
    <script type="text/javascript" charset="utf-8">
      var pid = getVar("pid");
      var agent,site,phone,address,expired,active,sold;
      $(document).ready(function(){
        // Trigger maximage
        jQuery('#maximage').maximage();

        //get info
        $.getJSON("../get.php",{pid:pid},function(data){
          agent = data[0].agent;
          site = data[0].site;
          phone = data[0].phone;
          address = data[0].address;

          //check if listing is avalable
          expired = data[0].expired;
          active = data[0].active;
          if(expired || active == "false"){
            document.write("Listing Not Available!");
            alert("Listing Not Available!");
            //window.location.href = "../index.php";
          }
          //Check if property is sold
          sold = data[0].sold;
          if(sold){
            $("#sold").fadeTo("slow",1);
          }

          $("#address").html(address);
          $("#agent").html("Agent: " + agent);
          $("#phone").html(phone);
        }).done(function(){
          $("#agentImg").attr("src","tours/"+pid+"/agent/agent.jpg");
        });

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

      function getVar(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
      }

    </script>
          
  </body>
</html>
