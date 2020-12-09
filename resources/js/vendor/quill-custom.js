$(function () {
    const testEditor = editormd("test-editormd", {
        width: "100%",
        height: 640,
        syncScrolling: "single",
        path: "/vendor/editor.md/lib/",
        htmlDecode : "style,script,sub,sup,embed|onclick,title,onmouseover,onmouseout,style", // Filter tags, and your custom attributes
        toolbarAutoFixed: false,
        theme : "dark",
        previewTheme : "dark",
        editorTheme : "pastel-on-dark",
        codeFold : true,
        //syncScrolling : false,
        saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
        searchReplace : true,
        //watch : false,                // 关闭实时预览
        //toolbar  : false,             //关闭工具栏
        //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
        emoji : true,
        taskList : true,
        tocm            : true,         // Using [TOCM]
        tex : true,                   // 开启科学公式TeX语言支持，默认关闭
        flowChart : true,             // 开启流程图支持，默认关闭
        sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
        //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
        //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
        //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
        //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
        //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
        imageUpload : true,
        imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
        imageUploadURL : "./php/upload.php",

    });
    $("#get-md-btn").bind('click', function(){
        alert(testEditor.getMarkdown());
    });
    /*
    // or
    testEditor = editormd({
        id      : "test-editormd",
        width   : "90%",
        height  : 640,
        path    : "../lib/"
    });
    */
    // const path = "/vendor/editor.md/languages/tr";
    // editormd.loadScript(path, function () {
    //     testEditor.lang = editormd.defaults.lang;
    //     // testEditor.recreate();
    // })
});
