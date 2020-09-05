import * as THREE from 'three';
import * as Honeycomb from 'honeycomb-grid';

export default class Hexmap {

    constructor(width, height) {
        this.width = width;
        this.height = height;
        this.geometry = null;
        this.Hex = Honeycomb.extendHex({ size: 5 })
        const Grid = Honeycomb.defineGrid(this.Hex)
        this.grid = Grid.rectangle({ width:  this.width, height: this.height });
        this.hexMaterial = new THREE.MeshLambertMaterial( { color: 0x00ff00 } );
    }

    buildHexGeometry() {

        var shape = new THREE.Shape();

        // separate the first from the other corners
        const [firstCorner, ...otherCorners] = this.Hex().corners();

        shape.moveTo( firstCorner.x, firstCorner.y );
        otherCorners.forEach(corner => shape.lineTo(corner.x, corner.y));
        shape.lineTo( firstCorner.x, firstCorner.y );

        var extrudeSettings = {
            steps: 2,
            depth: 16,
            bevelEnabled: true,
            bevelThickness: 1,
            bevelSize: 1,
            bevelOffset: 0,
            bevelSegments: 1
        };

        this.geometry = new THREE.ExtrudeBufferGeometry( shape, extrudeSettings );
        this.geometry.rotateX(Math.PI / 2);
        this.geometry.scale(0.8, 1, 0.8);
    }

    /**
     * @param scene
     */
    buildMeshes(scene) {

        this.grid.forEach(hex => {
            const point = hex.toPoint();

            var mesh = new THREE.Mesh( this.geometry, this.hexMaterial ) ;

            mesh.position.x = point.x;
            mesh.position.z = point.y;

            scene.add( mesh );
        });
    }

}