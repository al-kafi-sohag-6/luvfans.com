
$(document).ready(function () {
    CKEDITOR.ClassicEditor.create(document.getElementById("message"), {
        extraPlugins: ['Mention'],
        toolbar: ['bold', 'italic', 'link', '|', 'undo', 'redo'],
        link: {
            defaultProtocol: 'https://',
        },
        removePlugins: [
            'ExportPdf',
            'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            'MathType'
        ],
    })
        .then(editor3 => {
            window.editor3 = editor3;
            var variableName = "editor";
            var dynamicEditor = { variableName: editor3 };
            const submitBtn = document.querySelector('#button-reply-msg');

            dynamicEditor.variableName.model.document.on('change:data', () => {
                const data = dynamicEditor.variableName.getData();

                if (data.trim().length > 0) {
                    $('#message').val(data);
                    submitBtn.removeAttribute('disabled');
                } else {
                    submitBtn.setAttribute('disabled', true);
                }
            });

            document.querySelector('.message-emoji emoji-picker')
                .addEventListener('emoji-click', (event) => {
                    const emoji = event.detail.emoji.unicode;

                    dynamicEditor.variableName.model.change(writer => {
                        const selection = dynamicEditor.variableName.model.document.selection;
                        if (selection.isEmpty) {
                            // If there is no text selected, insert the emoji at the current position of the cursor
                            const position = dynamicEditor.variableName.model.document.selection.getFirstPosition();
                            writer.insertText(emoji, position);
                        } else {
                            // If there is text selected, replace it with the emoji
                            const range = selection.getFirstRange();
                            writer.remove(range);
                            writer.insertText(emoji, range.start);
                        }
                    });

                    $('.message-emoji.dropdown-menu').removeClass('show');
                });

        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error(error);
        });


});

function getMsgEditorData() {
    const data = editor3.getData();
    return data;
}

function setMsgEditorData(data) {
    editor3.setData(data)
}
