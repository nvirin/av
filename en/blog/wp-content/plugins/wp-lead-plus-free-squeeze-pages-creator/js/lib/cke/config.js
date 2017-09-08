
CKEDITOR.editorConfig = function( config ) {
    config.toolbarGroups = [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'links', groups: [ 'links' ] },
        { name: 'colors', groups: [ 'colors' ] },
        { name: 'insert', groups: [ 'insert' ] },
        { name: 'forms', groups: [ 'forms' ] },
        { name: 'tools', groups: [ 'tools' ] },
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'others', groups: [ 'others' ] },
        '/',
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        { name: 'styles', groups: [ 'styles' ] },
        { name: 'about', groups: [ 'about' ] }
    ];

    config.removeButtons = 'Underline,Subscript,Superscript,Source,Maximize,HorizontalRule,SpecialChar,Anchor,Scayt,Undo,Redo,Cut,Copy,Paste,PasteText,PasteFromWord,RemoveFormat,Strike,NumberedList,BulletedList,Indent,Outdent,Blockquote,Styles,About,Image,Table';
    config.removeDialogTabs = 'link:advanced';
    config.extraPlugins = 'ckeditor-gwf-plugin';
    config.font_names = 'GoogleWebFonts;' + config.font_names;
};