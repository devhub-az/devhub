$(function () {
    let raw_markdown = "";

    const toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],
        [{'header': 1}, {'header': 2}],               // custom button values
        [{'list': 'ordered'}, {'list': 'bullet'}],
        [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
        [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
        [{'align': []}],
        ['code'],
        ['link', 'image', 'video'],          // add's image support
        ['clean']
    ];

    let quill = new Quill("#content", {
        modules: {
            syntax: true,
            toolbar: {
                toolbarOptions,
            },
        },
        placeholder: "Compose an epic...",
        theme: "snow" // or 'bubble'
    });

    quill.keyboard.addBinding({
        key: 'B',
        shortKey: true
    }, function (range, context) {
        this.quill.formatText(range, 'bold', true);
    });

    const md = window.markdownit();
    md.set({
        html: true
    });

    const result = md.render(raw_markdown);

    quill.clipboard.dangerouslyPasteHTML(result + "\n");

    // Need to do a first pass when we're passing in initial data.
    const html = quill.container.firstChild.innerHTML;
    $("#markdown").text(toMarkdown(html));

    // text-change might not be the right event hook. Works for now though.
    quill.on("text-change", function (delta, source) {
        const html = quill.container.firstChild.innerHTML;
        const markdown = toMarkdown(html);
        $("#markdown").text(markdown);
    });

    // const data = new FormData(form);

});
function foo() {
    let text = document.getElementById('markdown').innerText
    const data = {
        title: document.getElementById("title").value,
        body: text,
        hubs: $('#hubs').val()
    };
    axios.post('/post/create-new-post', data)
        .then(response => {
            // window.location.href="/";
        })
}

$(document).ready(function () {
    $('#hubs').select2();
});
