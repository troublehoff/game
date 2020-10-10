import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../css/app.css';
import * as THREE from 'three';
import Hexmap from './modules/hexmap';
import {OrbitControls} from "three/examples/jsm/controls/OrbitControls";


// Create an empty scene
var scene = new THREE.Scene();

// Create a basic perspective camera
var camera = new THREE.PerspectiveCamera( 75, window.innerWidth/window.innerHeight, 0.1, 1000 );
camera.position.set(4,4,4);

// Create a renderer with Antialiasing
var renderer = new THREE.WebGLRenderer({antialias:true});
var viewport = document.getElementById('viewport');

var controls = new OrbitControls( camera, viewport );
controls.update();

renderer.setClearColor("#000000");
renderer.setSize( viewport.clientWidth, viewport.clientHeight );
viewport.appendChild( renderer.domElement );

// lighting...
var light = new THREE.PointLight(0xff5050);
light.position.set(20, 5, 30);
light.intensity = 3;
scene.add(light);

var ambientLight = new THREE.AmbientLight(0x404040);
scene.add(ambientLight);

var axesHelper = new THREE.AxesHelper( 5000 );
scene.add( axesHelper );

// map///
const hexmap = new Hexmap(2, 3);
hexmap.buildHexGeometry();
hexmap.buildMeshes(scene);

// render loop...
var render = function () {
    requestAnimationFrame( render );
    controls.update();
    renderer.render(scene, camera);
};

render();