<div id="myCarouselTemplate" class="carousel slide" data-ride="carousel">
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8">
            <div class="carousel-inner" role="listbox">
                <?php
                $active = ' active';
                foreach ($headlines as $key => $headline) {
                    ?>
                    <div class="item<?= $active ?>">
                        <div class="carousel-content">
                            <div>
                                <h3><?= $headline ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php
                    $active = '';
                }
                ?>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#myCarouselTemplate" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarouselTemplate" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<script>
    window.editorRef = null;
    var editorCount = 0;
    var synonyms = $.parseJSON('<?= $synonyms ?>');
    var synonymsArr = [];
    for (var s in synonyms) {
        synonymsArr.push(synonyms[s].synonym);
    }
    var synonymsStr = '';
    for (var s in synonyms) {
        synonymsStr += synonyms[s].synonym + ' ';
    }
    var synonymLock = false;

    //    var templates = $('#template .template-text-for-edit');
    var template = $('#template');
    var container = $(document.createElement('div'));
    container.attr('id', 'editableArea');
    //    container.className = 'container-for-edit';
    template.before(container);
    //    templates.each(function (index) {
    //        var div = document.createElement('textarea');
    //        div.innerHTML = $(this).html();
    //        div = $(div);
    //        div.attr('contentEditable', 'true');
    //        div.attr('spellcheck', 'true');
    //        div.attr('lang', 'en');
    //        div.insertBefore($('#template'));
    //        $(container).append(div);
    //    });

    var templateChild = $(template.children()[0]);
    container.html(templateChild.html());
    var headline = container.find('#headline');
    //    headline.attr('id', 'headlineTemp').hide();
    headline.remove();
    //    templateChildren.each(function (index) {
    //        var el = $(this);
    //        if (el.attr('id') != 'headline') {
    //            container.html(container.html() + el.html());
    //        }
    //    });

    var textareas = $('#editableArea textarea');
    textareas.each(function () {
        $(this).flexible();
    });

    tinymce.init({
//        selector: "textarea",
        selector: "#editableArea",
        menubar: false,
        statusbar: false,
        width: '100%',
        browser_spellcheck: true,
        trim_span_elements: false,
        verify_html: false,
        element_format: 'html',
//        valid_classes: {
//            'p': 'class4 class5' // Link specific classes
//        }
//        valid_elements: '@[id | class]',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media paste code'
//            'contextmenu'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//        contextmenu: "cut copy paste | link image inserttable | ",
        setup: function (editor) {
            editor.on('init', function () {
                window.editorRef = $(editor.editorContainer);
                $(window.editorRef.find('iframe').contents().find('body')).on('contextmenu', function (e) {
                    removeSynonymDropdown();
                    var self = $(e.target);
                    if (self.hasClass('marked-synonym')) {
                        e.preventDefault();

                        self.addClass('opened-context-menu');

                        var ul = createSynonymMenu(self.text());
                        $('<div class="dropdown open synonym-dropdown">' + ul + '</div>')
                                .appendTo("body")
                                .css({top: e.pageY + "px", left: e.pageX + "px"});
                    }
                });



                $(window.editorRef.find('iframe').contents().find('body')).on('click', function () {
                    removeSynonymDropdown();
                });

            });
            editor.on('input', function (e) {
                replaceContent(editor);
                if (!synonymLock) {
                    synonymLock = true;
                    setTimeout(function () {
                        var mce = $('.mce-tinymce.mce-container.mce-panel');
                        var marked = $('.marked-synonym', window.editorRef.find('iframe').contents());
                        marked.each(function () {
                            $(this).replaceWith($(this).html());
                        });
                        replaceContent(editor);
//                        window.editorRef.unmark({"iframes": true, "done": function () {
                        window.editorRef.mark(synonymsStr, {"element": "span",
                            "className": "marked-synonym",
                            "iframes": true,
//                                    "separateWordSearch": false,
                            "accuracy": "exactly",
//                                    "acrossElements": true,
                            "done": function () {
                                synonymLock = false;
                            }});
//                            }});
                    }, 1000);
                }
            });

        },
        content_css: '<?= base_url() ?>css/bootstrap.min.css, <?= base_url() ?>css/highlight.css',
        body_class: 'container'
    });

    $(document).on("click", function () {
        removeSynonymDropdown();
    });

    $(document).on("click", ".synonym-dropdown a", function (e) {
        e.preventDefault();
        var text = $(e.target).text();
        $(window.editorRef.find('iframe').contents().find('.opened-context-menu')).text(text);
    });

    function removeSynonymDropdown() {
        $('.synonym-dropdown').remove();
        $('.opened-context-menu', window.editorRef.find('iframe').contents()).removeClass('opened-context-menu');
    }


    function replaceContent(editor) {
        var content = $(editor.getContent());
        content.each(function () {
            var el = $(this);
            if (el.hasClass('before-headline')) {
                $('#template .before-headline').html(el.html());
            }
            if (el.hasClass('after-headline')) {
                $('#template .after-headline').html(el.html());
            }
        });
    }

    function createSynonymMenu(synonym) {
        var parent = null;
        var parentSelf = null;
        for (var i = 0; i < synonyms.length; i++) {
            if (synonym.toLowerCase() == synonyms[i].synonym.toLowerCase()) {
                parent = synonyms[i].id;
                parentSelf = synonyms[i].parent;
                break;
            }
        }
        var syn = [];
        var ul = '<ul class="dropdown-menu">';
        for (var j = 0; j < synonyms.length; j++) {
            if (parent == synonyms[j].parent || parentSelf == synonyms[j].id) {
                syn.push(synonyms[j].synonym);
                ul += '<li><a href="#">' + synonyms[j].synonym + '</a></li>';
            }
        }
        return ul;
    }

    function changeAvatar(avatarId) {
//        $('#loadingAnimationModal').modal({backdrop: 'static', keyboard: false});
//        $('#loadingAnimationModal').modal('hide');
        for (var i = 0; i < avatars.length; i++) {
            if (avatars[i].id == avatarId) {
                $(window.editorRef.find('iframe').contents().find('.avatar-answer')).each(function () {
                    $(this).text(avatars[i].answer_object[$(this).attr('answerId')]);
                });
                break;
            }
        }
    }

    $('.carousel').carousel({
        interval: false
    });

    $("#headline").html('');
    $(".carousel").appendTo("#headline");

</script>