<?php

    foreach ($questions as $question) {
        ?>
        <div class='card card-custom' style='width: 75vw;'>
            <div class='card-body card-body-custom'>
                <?php echo form_open('quiz/checkAnswer'); ?>
                <h2 class='card-title card-title-custom'><?php echo $question->question ?></h2>
                <div class="buttons">
                    <?php
                        $attributes = array('class' => 'answer-button');
                        foreach ($question->answers as $answer) {
                            $data = array(
                                'name' => 'givenAnswer',
                                'id' => $answer->id,
                                'value' => $answer->name,
                                'type' => 'submit',
                                'content' => ucfirst($answer->name),
                                'class' => 'answer-button'
                            );

                            echo form_button($data);
                        }
                    ?>

                    <input type="hidden" name="correctAnswer" value="<?php echo $question->correctAnswer; ?>">
                </div>
            </div>
        </div>
    <?php } ?>
