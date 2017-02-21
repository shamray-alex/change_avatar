<div class="container padding15">
    <div class="row">
        <?php foreach ($pages as $page) { ?>
            <div class="col-md-4">
                <div class="template-tile">
                    <h3 class="text-center">Page #<?= $page->id ?></h3>
                    <div class="template-image "
                         style="background-image: url(<?= base_url() ?>img/default-page.png)"></div>
                    <a href="<?= base_url() ?>index.php/pages/<?= $page->id ?>" class="btn btn-default preview-page-button">Preview</a>
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
</script>