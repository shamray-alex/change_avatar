<div>
    <h1 class="text-center"><?= $pageType == 'create' ? 'Create Avatar' : 'Edit Avatar' ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs">
                        <?php $active = 'class="active"';
                        for ($i = 0; $i < count($avatar_questions); $i++) {
                            echo '<li ' . $active . '><a href="#step' . ($i + 1) . '" data-toggle="tab">STEP ' . ($i + 1) . '</a></li>';//
                            $active = '';
                        } ?>
                    </ul>
                    <?php
                    $link = $pageType == 'create' ? 'create-avatar' : 'edit-avatar/' . $avatar->id;
                    echo form_open($link) ?>

                    <div class="tab-content">


                        <?php $active = ' active';
                        for ($i = 0; $i < count($avatar_questions); $i++) { ?>
                            <div class="tab-pane<?= $active ?>" id="step<?= ($i + 1) ?>">
                                <div class="avatar-question">
                                    <?php $active = '';
                                    $id = 'question_id_' . $avatar_questions[$i]->id;
                                    echo form_label($avatar_questions[$i]->question, $id, ['style' => 'display:block;']);
                                    if (isset($avatar_questions[$i]->predefined_answers)) {
                                        $predefined_answers = $avatar_questions[$i]->predefined_answers; ?>
                                        <div class="form-group">
                                            <select class="form-control" id="<?= $id ?>" name="<?= $id ?>">
                                                <?php foreach ($predefined_answers as $value) {
                                                    $selected = '';
                                                    if (isset($avatar) && $value == $avatar->answer_object[$avatar_questions[$i]->id]) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                    echo '<option ' . $selected . '>' . $value . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                    <?php } else {
                                        $data = [
                                            'name' => $id,
                                            'id' => $id,
                                            'value' => isset($avatar->answer_object[$avatar_questions[$i]->id]) ? $avatar->answer_object[$avatar_questions[$i]->id] : '',
                                            'class' => 'form-control',
                                            'size' => '100',
                                            'spellcheck'=>'true',
                                            'lang'=>'en'
                                        ];
                                        if ($avatar_questions[$i]->id == 1) {
                                            $data['required'] = 'required';
                                        }
                                        echo form_input($data);
                                    } ?>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                    <div class="pull-right container-fluid" style="padding: 10px;">
                        <button class="btn" id="nextButton" type="button" style="width: 100px;">Next</button>
                        <button class="btn btn-success" id="saveButton" type="submit" style="width: 100px;">Save
                        </button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#nextButton").click(function (e) {
        var tabs=$('.nav-tabs li');
        for(var i=0; i<tabs.length-1;i++){
            if ($(tabs[i]).hasClass('active')){
                $(tabs[i+1]).find('a').trigger('click');
                break;
            }
        }
    });
</script>