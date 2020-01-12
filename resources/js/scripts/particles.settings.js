particlesJS("particles-js", {
    "particles": {
        "number": {"value": 20, "density": {"enable": true, "value_area": 800}},
        "color": {"value": "#ffffff"},
        "opacity": {
            "value": 0.12025590456491421,
            "random": false,
            "anim": {
                "enable": true,
                "speed": 0.9744926547616141,
                "opacity_min": 0.09744926547616141,
                "sync": true
            }
        },
        "size": {
            "value": 4.008530152163807,
            "random": false,
            "anim": {"enable": false, "speed": 17.053621458328248, "size_min": 0.1, "sync": false}
        },
        "line_linked": {"enable": true, "distance": 150, "color": "#ffffff", "opacity": 1, "width": 1},
        "move": {
            "enable": true,
            "speed": 1.5,
            "direction": "none",
            "random": true,
            "straight": false,
            "out_mode": "bounce",
            "bounce": false,
            "attract": {"enable": false, "rotateX": 600, "rotateY": 1200}
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {"enable": false, "mode": "repulse"},
            "onclick": {"enable": true, "mode": "push"},
            "resize": true
        },
        "modes": {
            "grab": {"distance": 400, "line_linked": {"opacity": 1}},
            "bubble": {"distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3},
            "repulse": {"distance": 200, "duration": 0.4},
            "push": {"particles_nb": 4},
            "remove": {"particles_nb": 2}
        }
    },
    "retina_detect": true
});
