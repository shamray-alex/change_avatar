<div>
    <h1 class="text-center">Create Avatar</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#a" data-toggle="tab">STEP 1</a></li>
                        <li><a href="#b" data-toggle="tab">STEP 2</a></li>
                        <li><a href="#c" data-toggle="tab">STEP 3</a></li>
                    </ul>
                    <?= form_open('avatar_controller/create_avatar') ?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="a">
                            <?php for ($i = 0; $i < count($avatar_questions); $i++) { ?>
                                <div class="avatar-question">
                                    <?php
                                    $id = 'question_id_' . $avatar_questions[$i]->id;
                                    echo form_label($avatar_questions[$i]->question, $id, ['style' => 'display:block;']);
                                    if ($avatar_questions[$i]->defined_answers) {
                                        $defined_answers = json_decode($avatar_questions[$i]->defined_answers, true);
                                        if ($avatar_questions[$i]->question == "Gender") {
                                            for ($j = 0; $j < count($defined_answers); $j++) {
                                                ?>
                                                <label class="radio-inline" style="margin:10px 10px 10px 0;">
                                                <?= '<input value="' . $defined_answers[$j] . '" type="radio" name="' . $id . '">' . $defined_answers[$j] ?>
                                                </label>
                                            <?php }
                                        } else {
                                            ?>
                                            <div class="form-group">
                                                <select class="form-control" id="<?= $id ?>" name="<?= $id ?>">
                                                    <?php
                                                    for ($j = 0; $j < count($defined_answers); $j++) {
                                                        echo '<option>' . $defined_answers[$j] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        echo form_input([
                                            'name' => $id,
                                            'id' => $id,
                                            'value' => '',
                                            'class' => 'form-control',
                                            'size' => '100',
//                                            'required' => 'required'
                                            ]);
                                    }
                                    ?>
                                </div>
<?php } ?>
                        </div>
                        <div class="tab-pane" id="b">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                            Aliquam in felis sit amet augue.</div>
                        <div class="tab-pane" id="c">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            Quisque mauris augue, molestie tincidunt condimentum vitae. </div>
                    </div>
                    <div class="pull-right container-fluid" style="padding: 10px;">
                        <button class="btn" id="nextButton" type="button" style="width: 100px;">Next</button>
                        <button class="btn btn-success" id="saveButton" type="submit" style="width: 100px;">Save</button>
                    </div>
<?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>