<script>
    var templates=$('#template pre');
    var template=$('#template');
    var container=document.createElement('div');
    container.id='editableArea';
    container.className='container';
   template.before(container);
    templates.each(function (index) {
        var div=document.createElement('div');
        div.innerHTML=$(this).text();
        div=$(div);
        div.attr('contentEditable', 'true');
        div.attr('spellcheck', 'true');
        div.attr('lang', 'en');
//        div.insertBefore($('#template'));
        $(container).append(div);
    });
    template.css('margin-top', '100px');

    template.change(function(e){
        console.log(e);
    })
</script>