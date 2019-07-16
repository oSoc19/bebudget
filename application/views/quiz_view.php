<div class="upform">
    <form>
        <div class="upform-header"><?php echo $this->lang->line('quiz_title'); ?></div>

        <div class="upform-main">
            <?php
                $count = 0;
                foreach ($questions as $key => $question) {
                    ?>
                    <div class="input-block">
                        <div class="label"><?php echo $question->question; ?>
                        </div>
                        <div class="input-control">
                            <?php
                                foreach ($question->answers as $answer) {
                                    if (is_object($answer)) {
                                        $dataRadio = array(
                                            'name' => "givenAnswer$key",
                                            'value' => $answer->name,
                                            'type' => 'radio',
                                            'class' => 'toggle',
                                            'id' => $count,
                                            'data-correctanswer' => $question->correctAnswer,
                                            'data-questionnumber' => $key
                                        );

                                        echo form_radio($dataRadio);
                                        echo form_label(ucfirst($answer->name), $count, array('class' => 'answerButton'));
                                    } else {
                                        $dataRadio = array(
                                            'name' => "givenAnswer$key",
                                            'value' => $answer,
                                            'type' => 'radio',
                                            'class' => 'toggle',
                                            'id' => $count,
                                            'data-correctanswer' => $question->correctAnswer,
                                            'data-questionnumber' => $key
                                        );

                                        echo form_radio($dataRadio);
                                        echo form_label($answer, $count, array('class' => 'answerButton'));
                                    }
                                    $count++;
                                } ?>
                        </div>
                    </div>
                <?php } ?>
        </div>

        <h1 id="score" class="hidden"><?php echo $this->lang->line('quiz_score'); ?></h1>

    </form>
</div>

<script>

    let score = 0;
    let correctAnswers = [];
    let lastQuestion = $('.upform-main').children().last();
    let questions = $('.upform-main').children();

    $(function () {
        // Get the amount of questions in the list
        let amountOfQuestions = $('.upform-main').children().length;

        $('.toggle').on('click', function () {
            // Get the question number
            let questionNumber = $(this).data('questionnumber');

            //Get the given answer and the correct answer
            let givenAnswer = $(this).val();
            let correctAnswer = $(this).data('correctanswer');

            // Check if the clicked answer is correct
            if (givenAnswer === correctAnswer) {
                score++;

                // Add check icon to question
                $(this).parent().parent().find('.label').append('<i class="far fa-check-circle hidden"></i>');
            } else{
                // Add wrong icon to question
                $(this).parent().parent().find('.label').append('<i class="far fa-times-circle hidden"></i>');
            }

            // Add the correct answer to the array
            correctAnswers.push(correctAnswer);

            // Disable buttons of the just answered question so you can't answer one question twice
            $(this).parent().children().attr("disabled", true);

            // Get current input block (= question)
            let current = $(this).parent().parent();

            // Check if the current input block is the last one
            if (current.is(lastQuestion)) {
                // Show the score
                $('#score').removeClass('hidden').append(score + '/' + amountOfQuestions);

                // Show the check or wrong icons
                $('i').removeClass('hidden');

                for (let i = 0; i < questions.length; i++) {
                    let correctAnswer = correctAnswers[i];
                    let question = questions[i];

                    // Get the buttons for this question
                    let buttons = $(question).find('.answerButton');

                    for (let i = 0; i < buttons.length; i++) {
                        let button = buttons[i];

                        // Check if the text of the button is the same as the correct answer for that question
                        if ($(button)[0].innerText === correctAnswer) {
                            $(button).addClass('correctAnswer');
                        } else {
                            $(button).addClass('fadedButton');
                        }
                    }
                }
            }
        })
    })

</script>