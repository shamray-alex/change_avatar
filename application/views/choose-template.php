<div class="container padding15">
    <h2 class="text-center">Choose a Page Template</h2>
    <div class="row">
        <?php foreach ($templates as $template) { ?>
            <div class="col-md-4">
                <div class="template-tile">
                    <h3 class="text-center"><?= $template->name ?></h3>
                    <div class="template-image "
                         style="background-image: url(<?= base_url() ?>img/default.png)"></div>
                    <a href="<?= base_url() ?>index.php/preview-template/<?= $template->id ?>" class="btn btn-default preview-template-button">Preview This Theme</a>
                    <a href="<?= base_url() ?>index.php/edit-template/<?= $template->id ?>" class="btn btn-default choose-template-button">Choose This Theme</a>
                    <a href="<?= base_url() ?>index.php/clear-template-answers/<?= $template->id ?>" class="btn btn-default clear-answers-button">Clear Answers</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    $(".template-tile").hover(function () {
        $(this).find('a.btn').fadeIn(100);
    });
    $(".template-tile").on('mouseleave', function () {
        $(this).find('a.btn').fadeOut(200);
    });
    $("a.clear-answers-button").on("click", function (e) {
        e.preventDefault();
        var answer = confirm("Are you sure want to continue?")
        if (answer) {
            window.location = this.href;
        } else {
            return false;
        }
    });
</script>