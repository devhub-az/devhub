window.$ = window.jQuery = require('jquery');

(function () {
    $(document).ready(function () {
        $(document).keypress(function (e) {
            if (document.selection)
                var div = document.selection.createRange().parentElement();
            else
            {
                var selection = window.getSelection();
                if (selection.rangeCount > 0)
                    var div = selection.getRangeAt(0).startContainer.parentNode;
            }
            if ((e.ctrlKey === true) && (e.keyCode === 13 || e.keyCode === 10 || code === "13") && ($(window.getSelection().baseNode).closest("#markdown").attr("id") === "markdown" || $(div).closest("#markdown").attr('id') === 'markdown')) {
                const selected_text = window.getSelection();
                if (selected_text !== "") {
                    alert("В разработке...")
                }
            }
        });
    });


    let scroller = document.getElementById('scroller');
    let content = document.getElementById('content');
    let up = document.getElementById('mdi-chevron-up');
    let down = document.getElementById('mdi-chevron-down');
    let mark = 0;
    let clicked = false;

    function checkPosition() {
        if (window.pageYOffset > content.offsetTop) {
            scroller.classList.add("fixed");
            scroller.classList.remove("hidden");
            down.classList.add('hidden')
            up.classList.remove('hidden')
        } else if (window.pageYOffset === content.offsetTop) {
            down.classList.remove('hidden')
            up.classList.add('hidden')
        }
        if (window.pageYOffset < content.offsetTop) {
            scroller.classList.remove("fixed");
            scroller.classList.add("hidden");
        }
    }

    function doScroll() {
        clicked = true;
        if (window.pageYOffset > content.offsetTop) {
            mark = window.pageYOffset;
            window.scrollTo(0, content.offsetTop);
        } else {
            down.classList.add('hidden')
            up.classList.remove('hidden')
            window.scrollTo(0, mark);
            clicked = false;
        }
    }

    window.addEventListener('scroll', checkPosition);
    scroller.addEventListener('click', doScroll);

})();

// var num = 200; //number of pixels before modifying styles
//
// $(window).bind('scroll', function () {
//     if ($(window).scrollTop() > num) {
//         $('.menu').addClass('fixed');
//     } else {
//         $('.menu').removeClass('fixed');
//     }
// });

$(document).ready(function() {
    // grab the initial top offset of the navigation
    var stickyNavTop = $("header").offset().top;

    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var stickyNav = function(){
        var scrollTop = $(window).scrollTop(); // our current vertical position from the top

        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scrollTop > stickyNavTop) {
            $("header").addClass('sticky top-0 dark:border-gray-700 w-full backdrop-blur bg-opacity-25 dark:backdrop-blur border-b dark:bg-opacity-25 no-filter:bg-opacity-95 z-50');
        } else {
            $("header").removeClass('sticky top-0 dark:border-gray-700 backdrop-blur bg-opacity-25 dark:backdrop-blur dark:bg-opacity-25 border-b no-filter:bg-opacity-95 w-full');
        }
    };

    stickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        stickyNav();
    });
});
