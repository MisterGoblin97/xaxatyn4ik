window.addEventListener("load", function () {
    setTimeout(function () {
        document.querySelector(".loader").classList.add("loader--hidden");
    }, 2e3);
});

mouse = new THREE.Vector2(),
target = new THREE.Vector2(),
windowHalf = new THREE.Vector2(window.innerWidth / 5, window.innerHeight / 5),
scene = new THREE.Scene(),
camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 1, 0),
renderer = new THREE.WebGLRenderer({ alpha: !0 });
document.addEventListener("mousemove", onMouseMove, !1), renderer.setClearColor(0, 0), renderer.setSize(window.innerWidth, window.innerHeight), document.body.appendChild(renderer.domElement);

let geometry = new THREE.SphereGeometry(1, 15, 15),
    material = new THREE.MeshBasicMaterial({ wireframe: !0, color: 16777215 }),
    object = new THREE.Mesh(geometry, material);

function onMouseMove(e) {
    (mouse.x = e.clientX - windowHalf.x), (mouse.y = e.clientY - windowHalf.x);
}

function animate() {
    requestAnimationFrame(animate),
        (target.x = 8e-5 * (1 - mouse.x)),
        (target.y = 8e-5 * (1 - mouse.y)),
        (camera.rotation.x += 0.05 * (target.y - camera.rotation.x)),
        (camera.rotation.y += 0.05 * (target.x - camera.rotation.y)),
        (object.rotation.x += 8e-4),
        (object.rotation.y += 0.002),
        renderer.render(scene, camera);
}

scene.add(object), object.position.set(2, 0.5, 0), (camera.position.z = 4), animate();