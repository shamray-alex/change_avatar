<div class="container padding15">

    <div class="col-sm-8 padding15">

        <?php foreach ($avatars as $avatar) {
            $name = $avatar->answer_object[1]; ?>
            <div style="display: flex; padding: 20px;">
                <div class="padding15"
                     style="background-image: url(<?= base_url() ?>img/avatar_small.png); width: 118px; height: 129px;"></div>
                <div class="padding15" style="display: inline;">
                    <div>
                        <h3><?= $name ?></h3>
                    </div>
                    <div>
                        <a class="btn btn-default" href="<?= base_url() ?>index.php/edit-avatar/<?= $avatar->id ?>"
                           type="button" style="width: 100px;">Edit</a>
                        <a class="btn btn-danger" href="<?= base_url() ?>index.php/delete-avatar/<?= $avatar->id ?>"
                           type="button" style="width: 100px;">Delete
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <div class="col-sm-4">
        <a class="btn btn-default" href="<?= base_url() ?>index.php/create-avatar">+ New Avatar</a>
    </div>
</div>

<script type="text/javascript">
    $("a.btn-danger").on("click", function (e) {
        var link = this;
        e.preventDefault();
        var answer = confirm("Are you sure want to continue?")
        if (answer) {
            window.location = link.href;
        }
        else {
            return false;
        }
    });
</script>