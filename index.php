<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sphere</title>
  <style>
    body { 
      margin: 0px; 
      overflow: hidden; 
      background-color: #000; 
    } #thumbs{
      position: absolute;
    } .thumb{
      width: 100px;
      border-radius: 10px;
      opacity: 0.4;
    } .thumb:hover{
      opacity: 1.0;
    }.coner{
      height: 128px;
      border-radius: 10px;
      float: right;
    }audio{
      display:none;
      position: absolute;
    }

    #info {
      display:none;
      position: absolute;
      bottom: 0px; width: 50%;
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

    
    /* Sticky footer styles
    -------------------------------------------------- */
    html {
      position: relative;
      min-height: 100%;
    }
    body {
      /* Margin bottom by footer height */
      margin-bottom: 128px;
    }
    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      /* Set the fixed height of the footer here */
      height: 128px;
      //background-color: #f5f5f5;
    }
  </style>	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
  <div id="thumbs"></div>  
 <div id="info">
     <div id="agentInfo" class="info">
      <div id="agent"></div>
      <div id="phone"></div>
      <div id="address"></div>
      <div>Click Here For Agent's Site</div>
    </div>
 
    <div id="sphereInfo" class="info">
      <div>Sphere By: Kris Occhipinti</div>
      <div>(239)963-4889</div>
      <div>Click Here For More Info</div>
      <div>Music By: www.bensound.com</div>
    </div>
  </div>

  <footer id="footer">
    <img src="" id="agentImg" class="coner right">
  </footer>
  <div id="sphere"></div>


  <!--MUSIC-->
  <audio autoplay="" controls="" loop="" preload="">
    <source src="music/song1.ogg" type="audio/ogg"></source>
    <source src="music/song1.mp3" type="audio/mpeg"></source>
    Your browser does not support the audio element.
  </audio>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/three.min.js"></script>
  <script src="js/OrbitControls.js"></script>	
  <script src="js/Detector.js"></script>		
  <script src="js/Photosphere.js"></script>
</body>
</html>
