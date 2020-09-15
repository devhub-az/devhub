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
