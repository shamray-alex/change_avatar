<div class="container">
    <div class="dropdown pull-right">
        <button class="btn dropdown-toggle btn-default" type="button" data-toggle="dropdown">Change Avatar Profile
            <span class="caret"></span></button>
        <ul class="dropdown-menu">

            <?php foreach ($answers as $key => $avatarAnswers) {
                $industry = '';
                $name = '';
                foreach ($avatarAnswers as $key => $answer) {
                    if ($answer->avatar_question_id == 6) {
                        $industry = $answer->answer;
                    }
                    if ($answer->avatar_question_id == 1) {
                        $name = $answer->answer;
                    }
                } ?>
                <li><a href="#">
                        <?= $industry . ' (' . $name . ')' ?>
                    </a></li>
            <?php } ?>

            <li class="divider"></li>
            <li><a href="<?= base_url() ?>index.php/create-avatar">Create a New Avatar</a></li>
            <li><a href="<?= base_url() ?>index.php/my-avatars">Edit Existing Avatar</a></li>
        </ul>
    </div>
</div>