CKEDITOR.ClassicEditor.create(document.getElementById("updateDescription"), {


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
    mention: {
        feeds: [
            {
                marker: '@',
                feed: (query) => {
                    return new Promise((resolve, reject) => {
                        // make an Ajax request to fetch the feed data
                        $.ajax({
                            url: '/ajax/user-mentions',
                            data: {
                                query: query
                            },
                            success: function (response) {
                                const items = response.slice(0, 5).map(user => {
                                    return {
                                        id: `@${user.name}`,
                                        userId: user.id,
                                        name: user.name,
                                        avatar: user.avatar,
                                        verified: user.verified,
                                        username: user.username,
                                        link: user.url,
                                    };
                                });
                                resolve(items);
                            },
                            error: function (error) {
                                reject(error);
                            }
                        });

                    });
                },
                minimumCharacters: 1,
                dropdownLimit: 5,

                itemRenderer: (itemData) => {
                    var mentionItem = document.createElement('a');
                    mentionItem.href = itemData.link;
                    mentionItem.setAttribute('data-mention', JSON.stringify(itemData));

                    mentionItem.onclick = function (event) {
                        event.preventDefault();
                    };

                    const mentionAvatar = document.createElement('img');
                    const mentionName = document.createElement('span');
                    const mentionUsername = document.createElement('small');

                    mentionAvatar.setAttribute('src', itemData.avatar);
                    mentionAvatar.classList.add('rounded-circle', 'mr-2', 'mention-image');
                    mentionName.textContent = itemData.name;
                    mentionUsername.textContent = '@' + itemData.username;
                    mentionName.classList.add('mr-2', 'mention-name');
                    mentionUsername.classList.add('text-muted');

                    if (itemData.verified) {
                        const verifiedIcon = document.createElement('i');
                        verifiedIcon.classList.add('bi', 'bi-patch-check-fill', 'verified');
                        mentionName.appendChild(document.createTextNode(' ')); // add a space between the name and the icon
                        mentionName.appendChild(verifiedIcon);
                    }

                    mentionItem.appendChild(mentionAvatar);
                    mentionItem.appendChild(mentionName);
                    mentionItem.appendChild(mentionUsername);

                    return mentionItem;
                },
            }
        ],

    },


})
    .then(editor => {
        window.editor = editor;
















        const submitBtn = document.querySelector('#btnCreateUpdate');

        editor.model.document.on('change:data', () => {
            const data = editor.getData();

            if (data.trim().length > 0) {
                $('#updateDescription').val(editor.getData());
                submitBtn.removeAttribute('disabled');
            } else {
                submitBtn.setAttribute('disabled', true);
            }
        });


        editor.conversion.for('upcast').elementToAttribute({
            view: {
                name: 'a',
                key: 'data-mention',
                classes: 'mention',
                attributes: {
                    href: true,
                    'data-user-id': true
                }
            },
            model: {
                key: 'mention',
                value: viewItem => {
                    const mentionAttribute = editor.plugins.get('Mention').toMentionAttribute(viewItem, {
                        // Add any other properties that you need.
                        link: viewItem.getAttribute('href'),
                        userId: viewItem.getAttribute('data-user-id')
                    });

                    return mentionAttribute;
                }
            },
            converterPriority: 'high'
        });


        // Downcast the model 'mention' text attribute to a view <a> element.
        editor.conversion.for('downcast').attributeToElement({
            model: 'mention',
            view: (modelAttributeValue, { writer }) => {
                // Do not convert empty attributes (lack of value means no mention).
                if (!modelAttributeValue) {
                    return;
                }

                return writer.createAttributeElement('a', {
                    class: 'mention',
                    'data-mention': modelAttributeValue.id,
                    'data-user-id': modelAttributeValue.userId,
                    'href': modelAttributeValue.link
                }, {
                    // Make mention attribute to be wrapped by other attribute elements.
                    priority: 20,
                    // Prevent merging mentions together.
                    id: modelAttributeValue.uid
                });
            },
            converterPriority: 'high'
        });

        document.querySelector('emoji-picker')
            .addEventListener('emoji-click', (event) => {
                const emoji = event.detail.emoji.unicode;

                editor.model.change(writer => {
                    const selection = editor.model.document.selection;
                    if (selection.isEmpty) {
                        // If there is no text selected, insert the emoji at the current position of the cursor
                        const position = editor.model.document.selection.getFirstPosition();
                        writer.insertText(emoji, position);
                    } else {
                        // If there is text selected, replace it with the emoji
                        const range = selection.getFirstRange();
                        writer.remove(range);
                        writer.insertText(emoji, range.start);
                    }
                });
                $('.dropdown-menu').removeClass('show');
            });



    })
    .catch(error => {
        console.error('Oops, something went wrong!');
        console.error(error);
    });


function getEditorData() {
    const data = editor.getData();
    return data;
}

function setEditorData(data) {
    editor.setData(data)
}

function getPosition() {
    position = editor.model.document.selection.getFirstPosition();
    console.log(position);
    return position;
}

function setEmoji(position, emoji) {
    editor.model.change(writer => {
        writer.insertText(emoji, getPosition());
    });
}
