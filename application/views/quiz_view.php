<?php

    foreach ($questions as $key => $question) {
        ?>
        <div class='card card-custom' style='width: 75vw;'>
            <div class='card-body card-body-custom'>
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
                                    'class' => 'answerButton'
                                );
                            } else {
                                $data = array(
                                    'name' => 'givenAnswer',
                                    'value' => $answer,
                                    'type' => 'submit',
                                    'content' => $answer,
                                    'class' => 'answerButton'
                                );
                            }
                            echo form_button($data);
                        }
                    ?>

                    <input type="hidden" id="correctAnswer" value="<?php echo $question->correctAnswer; ?>">
                    <input type="hidden" id="questionNumber" value="<?php echo $key; ?>">
                </div>

                <label><?php echo $question->correctAnswer; ?></label>
                <label class="score"></label>
                <div class="alert alert-success alert-success-custom hidden question-success-<?php echo $key; ?>" role="alert">
                    Well done, that is the correct answer!
                </div>
                <div class="alert alert-danger alert-danger-custom hidden question-danger-<?php echo $key; ?>" role="alert">
                    Unfortunately, that is not the right answer...
                </div>
                <a href="#" class="hidden readMore">Want to read more? ></a>
            </div>
        </div>
    <?php } ?>

<script>

    let score = 0;

    $(function () {
        $('.score').text("Score: " + score);

        $('.answerButton').on('click', function () {
            let givenAnswer = $(this).val();
            let correctAnswer = $(this).parent().find('#correctAnswer').val();
            let questionNumber = $(this).parent().find('#questionNumber').val();

            if (givenAnswer === correctAnswer) {
                score++;
                $('.score').text("Score: " + score);
                $('.question-success-' + questionNumber).removeClass('hidden');
            } else {
                $('.question-danger-' + questionNumber).removeClass('hidden');
            }

            $(this).parent().children().attr("disabled", true);
            $(this).parent().parent().find('.readMore').removeClass('hidden');

            //TODO scroll up animation and show next question
        });
    });

</script>
