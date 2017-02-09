<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url() ?>">AVATAR</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?= base_url() ?>index.php/my-avatars">My Avatars</a></li>
            <li><a href="<?= base_url() ?>index.php/choose-template">Templates</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Change Avatar Profile
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php foreach ($avatars as $avatar) {
                        $name = $avatar->answer_object[1]; ?>
                        <li><a href="#"><?= $name ?></a></li>
                    <?php } ?>
                    <li class="divider"></li>
                    <li><a href="<?= base_url() ?>index.php/create-avatar">Create a New Avatar</a></li>
                    <li><a href="<?= base_url() ?>index.php/my-avatars">Edit Existing Avatar</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>