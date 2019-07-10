<?php

    foreach ($questions as $question) {
        $count = 0;
        ?>
        <div class='card card-custom' style='width: 75vw;'>
            <div class='card-body card-body-custom'>
                <?php echo form_open('quiz/checkAnswer', array('onsubmit' => 'return checkAnswer()', 'id' => "question-$count")); ?>
                <h2 class='card-title card-title-custom'><?php echo $question->question ?></h2>
                <div class="buttons">
                    <?php
                        $attributes = array('class' => 'answer-button');
                        foreach ($question->answers as $answer) {
                            if (is_object($answer)) {
                                $data = array(
                                    'name' => 'givenAnswer',
                                    'value' => $answer->value,
                                    'type' => 'submit',
                                    'content' => ucfirst($answer->name),
                                    'class' => 'answer-button',
                                    'onclick' => 'checkAnswer'
                                );
                            }
                            echo form_button($data);
                        }
                    ?>

                    <input type="hidden" name="correctAnswer" value="<?php echo $question->correctAnswer; ?>">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    <?php } ?>

<script>


    function checkAnswer() {
        console.log('hi');

        return false;
    }
</script>
