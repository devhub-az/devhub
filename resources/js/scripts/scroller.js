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
