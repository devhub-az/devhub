window.addEventListener("scroll", updatePosition, false);

function updatePosition(){
    if (window.pageYOffset > 20){
        document.getElementById('scroll-top').style.opacity = '0.2'
    } else {
        document.getElementById('scroll-top').style.opacity = '0'
    }
}

if (document.getElementById("sticky-block").lastElementChild){
    document.getElementById("sticky-block").lastElementChild.style.position = '-webkit-sticky'; /* Safari */
    document.getElementById("sticky-block").lastElementChild.style.position = 'sticky';
    document.getElementById("sticky-block").lastElementChild.style.top = '12px';
}

if (document.getElementById("sidebar")){
    document.getElementById("sidebar").style.position = '-webkit-sticky';
    document.getElementById("sidebar").style.position = 'sticky';
    document.getElementById("sidebar").style.top = 0;
    document.getElementById("sidebar").style.background = 'var(--background-default)';
}

function scrollToTop() {
    if (document.scrollingElement.scrollTop === 0) return;

    const totalScrollDistance = document.scrollingElement.scrollTop;
    let scrollY = totalScrollDistance, oldTimestamp = null;

    function step(newTimestamp) {
        if (oldTimestamp !== null) {
            scrollY -= totalScrollDistance * (newTimestamp - oldTimestamp) / 1000;
            if (scrollY <= 0) return document.scrollingElement.scrollTop = 0;
            document.scrollingElement.scrollTop = scrollY;
        }
        oldTimestamp = newTimestamp;
        window.requestAnimationFrame(step);
    }

    window.requestAnimationFrame(step);
}
