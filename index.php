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
    }

    #info {
      display:none;
      position: absolute;
      bottom: 0px; width: 50%;
      background-color: #000000;
      opacity: 0.4;
      color: #ffffff;
      padding: 5px;
      font-family: Monospace;
      font-size: 15px;
      text-align: center;
      border-radius: 10px;
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
  <footer id="footer">
    <div id="info">
      <div id="agent"></div>
      <div id="phone"></div>
      <div id="address"></div>
    </div>
    <img src="" id="agentImg" class="coner right">
  </footer>
  <div id="sphere"></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/three.min.js"></script>
  <script src="js/OrbitControls.js"></script>	
  <script src="js/Detector.js"></script>		
  <script src="js/Photosphere.js"></script>
</body>
</html>
