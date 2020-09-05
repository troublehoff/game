/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../css/app.css';
import * as THREE from 'three';
import * as Honeycomb from 'honeycomb-grid';
import Hexmap from './modules/hexmap';
import $ from 'jquery';
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

// Configure renderer clear color
renderer.setClearColor("#000000");

// Configure renderer size
renderer.setSize( viewport.clientWidth, viewport.clientHeight );

// Append Renderer to DOM
viewport.appendChild( renderer.domElement );

// ------------------------------------------------
// FUN STARTS HERE
// ------------------------------------------------

// Create a Cube Mesh with basic material
var geometry = new THREE.BoxGeometry( 1, 1, 1 );
var material = new THREE.MeshLambertMaterial( { color: "#433F81" } );
var cube = new THREE.Mesh( geometry, material );

// Add cube to Scene
// scene.add( cube );

var light = new THREE.PointLight(0xff5050);
light.position.set(20, 5, 30);
light.intensity = 3;
scene.add(light);

var ambientLight = new THREE.AmbientLight(0x404040);
scene.add(ambientLight);

var axesHelper = new THREE.AxesHelper( 5000 );
scene.add( axesHelper );

const hexmap = new Hexmap(2, 3);
hexmap.buildHexGeometry();
hexmap.buildMeshes(scene);


// Render Loop
var render = function () {
    requestAnimationFrame( render );

    // cube.rotation.x += 0.01;
    // cube.rotation.y += 0.01;

    console.log(camera.position);

    controls.update();

    // Render the scene
    renderer.render(scene, camera);
};

render();