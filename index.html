<!DOCTYPE html>
<html lang="en">
<head>
  <title>Virtual Tour</title>
  <style>
    body { 
      margin: 0px; 
      overflow: hidden; 
      background-color: #000; 
    }
  </style>	
  <meta charset="utf-8"/>
</head>
<body>
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

    //load and check sphere img
    var sphereIMG = getVar("img");
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

  </script>
</body>
</html>
