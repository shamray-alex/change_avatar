<div class="container padding15">

    <div class="col-sm-8 padding15">

        <?php foreach ($answers as $key => $avatarAnswers) {
            $industry = '';
            $name = '';
            $avatarId = $avatarAnswers[0]->avatar_id;
            foreach ($avatarAnswers as $key => $answer) {
                if ($answer->avatar_question_id == 6) {
                    $industry = $answer->answer;
                }
                if ($answer->avatar_question_id == 1) {
                    $name = $answer->answer;
                }
            } ?>
            <div style="display: flex; padding: 20px;">
                <div class="padding15"
                     style="background-image: url(<?= base_url() ?>img/avatar_small.png); width: 118px; height: 129px;"></div>
                <div class="padding15" style="display: inline;">
                    <div>
                        <h3><?= $industry . ' (' . $name . ')' ?></h3>
                    </div>
                    <div>
                        <a class="btn btn-default" href="<?= base_url() ?>index.php/edit-avatar/<?= $avatarId ?>"
                           type="button" style="width: 100px;">Edit</a>
                        <button class="btn btn-danger" id="deleteButton" type="button" style="width: 100px;">Delete
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <div class="col-sm-4">
        <a class="btn btn-default" href="<?= base_url() ?>index.php/create-avatar">+ New Avatar</a>
    </div>
</div>