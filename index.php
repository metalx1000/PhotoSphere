<!DOCTYPE html>
<html lang="en">
<head>
  <title>Virtual Tour</title>
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
    }

  </style>	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="thumbs">
  </div>  
  <div id="sphere"></div>
  <script src="js/three.min.js"></script>
  <script src="js/OrbitControls.js"></script>	
  <script src="js/Detector.js"></script>		
  <script>
    //scene setup
    var webglEl = document.getElementById('sphere');
    var width  = window.innerWidth;
    var height = window.innerHeight;
    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera(75, width / height, 1, 1000);
    camera.position.x = 0.1;
    var controls;

    var renderer = Detector.webgl ? new THREE.WebGLRenderer() : new THREE.CanvasRenderer();
    renderer.setSize(width, height);

    //load info and check sphere img
    var pid = getVar("pid");
    var name,phone,site;
    var images = [];
    $(document).ready(function(){
      $.getJSON("get.php",{pid:pid},function(data){
        var imgs = JSON.parse(data[0].images);
        imgs.forEach(function(img){
          images.push(img.img);
        });
        name = data[0].name;
        site = data[0].site;
        phone = data[0].phone;
      }).done(function(){   
        loadImage(0);
        createThumbs();
      });

      $("#thumbs").on("mouseover","img",function(){
        var image = $(this).attr('image');
        loadImage(image);
        $(".thumb").fadeTo( "slow", .3 );
        $( this ).fadeTo( "fast", 1 );
      });
    });


    loadControls();
    webglEl.appendChild(renderer.domElement);

    render();

    function render() {
      controls.update();
      requestAnimationFrame(render);
      renderer.render(scene, camera);
    }

    function onMouseWheel(event) {
      event.preventDefault();
      
      if (event.wheelDeltaY) { // WebKit
              camera.fov -= event.wheelDeltaY * 0.05;
      } else if (event.wheelDelta) { 	// Opera / IE9
              camera.fov -= event.wheelDelta * 0.05;
      } else if (event.detail) { // Firefox
              camera.fov += event.detail * 1.0;
      }

      camera.fov = Math.max(40, Math.min(100, camera.fov));
      camera.updateProjectionMatrix();
    }

    //events
    document.addEventListener('mousewheel', onMouseWheel, false);
    document.addEventListener('DOMMouseScroll', onMouseWheel, false);
    window.addEventListener( 'resize', onWindowResize, false );
    document.body.addEventListener("mousedown", fullscreen, false);

    function onWindowResize() {
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize( window.innerWidth, window.innerHeight );
    }

    function getVar(name) {
      name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
          results = regex.exec(location.search);
      return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function imageExists(url, callback) {
      var img = new Image();
      img.onload = function() { callback(true); };
      img.onerror = function() { callback(false); };
      img.src = url;
    }

  function loadSphere(){
    var sphere = new THREE.Mesh(
      new THREE.SphereGeometry(100, 20, 20),
      new THREE.MeshBasicMaterial({
        map: THREE.ImageUtils.loadTexture(sphereIMG)
      })
    );
    sphere.scale.x = -1;
    scene.add(sphere);
  }

  function loadControls(){ 
    controls = new THREE.OrbitControls(camera);
    controls.noPan = true;
    controls.noZoom = true; 
    controls.autoRotate = true;
    controls.autoRotateSpeed = 0.5;
  }

  function loadImage(i){
    sphereIMG = "tours/"+pid+"/spheres/"+images[i];
    imageExists(sphereIMG, function(exists) {
      if(exists){
        //console.log('RESULT: url=' + sphereIMG + ', exists=' + exists);
        loadSphere();
      }else{
        alert("Sorry, the tour you chose does not exist");
        sphereIMG = "station24bay.jpg";
        loadSphere();
      }
    });    
  }

  function createThumbs(){
    for(var i = 0;i<images.length;i++){
      var html = '<img src="tours/'+pid+'/thumbs/'+images[i]+'" class="thumb" image="'+i+'">'
      $("#thumbs").append(html);
    }
  }

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
