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
    var editorCount = 0;

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

    var templateChildren = template.children();
    templateChildren.each(function (index) {
        var el=$(this);
        if(el.attr('id')!='headline') {
            container.html(container.html() + el.html());
        }
    });

    var textareas = $('#editableArea textarea');
    textareas.each(function () {
        $(this).flexible();
    });
    textareas.on("input", function (e) {
        var textarea = $(e.currentTarget);
        var i = 0;
        for (i; i < textareas.length; i++) {
            if ($(textareas[i]).is(textarea)) {
                break;
            }
        }
        templates[i].innerHTML = textarea.val();
    });

    tinymce.init({
//        selector: "textarea",
        selector: "#editableArea",
        menubar: false,
        width: '100%',
        browser_spellcheck : true,
        trim_span_elements: false,
        verify_html: false,
        element_format : 'html',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media paste code',
//            'contextmenu'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//        contextmenu: "cut copy paste | link image inserttable | ",
        setup: function (editor) {
            editor.on('init', function (a) {
                console.log('bla-bla');
            });
        },
    });

    $('.carousel').carousel({
        interval: false
    });

    $("#headline").html('');
    $(".carousel").appendTo("#headline");

</script>