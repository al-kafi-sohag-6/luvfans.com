(function ($) {
    "use strict";

    // CKEDITOR
    CKEDITOR.replace('story', {
        // Define the toolbar groups as it is a more accessible solution.
        extraPlugins: 'wordcount',
        removePlugins: 'resize',
        embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
        enterMode: CKEDITOR.ENTER_BR,
        wordcount: {
            showWordCount: true,
            showCharCount: true,
            countSpacesAsChars: true,
            countHTML: false,
            countLineEndings: false
        },

        // Toolbar adjustments to simplify the editor.
        toolbar: [{
            name: 'document',
            items: ['Undo', 'Redo']
        },
        {
            name: 'basicstyles',
            items: ['Bold', 'Italic', 'Underline']
        },
        {
            name: 'links',
            items: ['Link']
        }
        ],

        // Upload dropped or pasted images to the CKFinder connector (note that the response type is set to JSON).
        // filebrowserImageUploadUrl : url_file_upload,
        // filebrowserUploadMethod: 'xhr',

        // Remove the redundant buttons from toolbar groups defined above.
        removeButtons: 'Subscript,Superscript,Specialchar',
    });

    var data = CKEDITOR.instances.content.getData();

})(jQuery);
