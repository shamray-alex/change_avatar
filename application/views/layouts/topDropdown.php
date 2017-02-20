<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url() ?>">AVATAR</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?= base_url() ?>index.php/my-avatars">My Avatars</a></li>
            <li><a href="<?= base_url() ?>index.php/choose-template">Templates</a></li>
            <li><a href="<?= base_url() ?>index.php/pages">My pages</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span id="choosedAvatar"></span><span
                        class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    foreach ($avatars as $avatar) {
                        $name = $avatar->answer_object[1];
                        ?>
                        <li><a class="changeAvatarLink" href="#" avatarId="<?= $avatar->id ?>"><?= $name ?></a></li>
                    <?php } ?>
                    <li class="divider"></li>
                    <li><a href="<?= base_url() ?>index.php/create-avatar">Create a New Avatar</a></li>
                    <li><a href="<?= base_url() ?>index.php/my-avatars">Edit Existing Avatar</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!--<form action="" method="post" id="hiddenForm">
    <input type="hidden" name="changeAvatarId">
</form>-->

<script>
    var avatars = $.parseJSON('<?= json_encode($avatars) ?>');

    function setAvatarName() {
        var avatarIdFromCookie = $.cookie("avatarId");
        var avatarName = 'Change Avatar Profile';
        if (avatarIdFromCookie) {
            var list = $('.dropdown-menu li a');
            for (var i = 0; i < list.length; i++) {
                if ($(list[i]).attr('avatarId') == avatarIdFromCookie) {
                    avatarName = $(list[i]).text();
                }
            }
        }
        $('#choosedAvatar').text(avatarName);
    }
    setAvatarName();



    $('.changeAvatarLink').click(function (e) {
        e.preventDefault();
        var avatarId = $(this).attr('avatarId');
        $.cookie('avatarId', avatarId, {path: '/'});
        setAvatarName();
        if (typeof changeAvatar === "function") {
            changeAvatar(avatarId);
        }

//        $('#hiddenForm input').val(avatarId);
//        var form = $('#hiddenForm');
//        form.attr('action', window.location.href);
//        form.submit();
    });
</script>