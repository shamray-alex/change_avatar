<div>
    <h1 class="text-center">Template Questionnaire</h1>
    <h1 class="text-center"><?= $template->name ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs">
                        <?php
                        $active = 'class="active"';
                        for ($i = 0; $i < count($template_questions); $i++) {
                            echo '<li ' . $active . '><a href="#step' . ($i + 1) . '" data-toggle="tab">Question ' . ($i + 1) . '</a></li>'; //
                            $active = '';
                        }
                        ?>
                    </ul>
                    <?php
                    $link = $pageType == 'create' ? 'edit-template/' . $template->id : 'preview-template/' . $template->id;
                    echo form_open($link)
                    ?>

                    <div class="tab-content">

                                <?php $active = ' active';
                                for ($i = 0; $i < count($template_questions); $i++) {
                                    ?>
                            <div class="tab-pane<?= $active ?>" id="step<?= ($i + 1) ?>">
                                <div class="avatar-question">
                                    <?php
                                    $active = '';
                                    $id = 'question_id_' . $template_questions[$i]->id;
                                    echo form_label($template_questions[$i]->question, $id, ['style' => 'display:block;']);
                                    if (isset($template_questions[$i]->predefined_answers)) {
                                        $predefined_answers = $template_questions[$i]->predefined_answers;
                                        ?>
                                        <div class="form-group">
                                            <select class="form-control" id="<?= $id ?>" name="<?= $id ?>">
                                                <?php
                                                foreach ($predefined_answers as $value) {
                                                    $selected = '';
                                                    if (isset($avatar) && $value == $avatar->answer_object[$template_questions[$i]->id]) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                    echo '<option ' . $selected . '>' . $value . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <?php
                                    } else {
                                        $data = [
                                            'name' => $id,
                                            'id' => $id,
                                            'value' => isset($template->answer_object[$template_questions[$i]->id]) ? $template->answer_object[$template_questions[$i]->id] : '',
                                            'class' => 'form-control',
                                            'size' => '100'
                                        ];
                                        if ($template_questions[$i]->id == 1) {
                                            $data['required'] = 'required';
                                        }
                                        echo form_input($data);
                                    }
                                    ?>
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
        var tabs = $('.nav-tabs li');
        for (var i = 0; i < tabs.length - 1; i++) {
            if ($(tabs[i]).hasClass('active')) {
                $(tabs[i + 1]).find('a').trigger('click');
                break;
            }
        }
    });
</script>