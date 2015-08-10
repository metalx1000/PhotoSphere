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
var site,phone,agent;
var audio = $("audio");
music = audio[0];

var im;
$(document).ready(function(){
  $.get("getSpheres.php",{pid:pid},function(data){
    data = data.split(",");
    data.forEach(function(img){
      if(img){
        images.push(img);
      };
    });
  }).done(function(){
    loadImage(0);
    createThumbs();
  });

  $.getJSON("get.php",{pid:pid},function(data){
    agent = data[0].agent;
    site = data[0].site;
    phone = data[0].phone;
    address = data[0].address;
  
    $("#address").html(address);
    $("#agent").html("Agent: " + agent);
    $("#phone").html(phone);
  }).done(function(){   
    $("#agentImg").attr("src","tours/"+pid+"/agent/agent.jpg");
  });

  //hover over Agent's Photo
  $("#agentImg").hover(function(){
    $("#info").fadeTo( "slow", .4 );
  },function(){
    setTimeout(function(){
      $("#info").fadeTo( "slow", 0 );
    },3000);
  });

  //click agent info box
  $("#agentInfo").click(function(){
    window.open(site, '_blank');
  });

  //click sphere info box
  $("body").on("click","#sphereInfo",function(){
    console.log("fbk");
    window.open("http://filmsbykris.com", '_blank');
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
