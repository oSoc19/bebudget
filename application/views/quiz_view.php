<div class="upform">
    <form>
        <div class="upform-header">Test yourself</div>

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
                                            'value' => $answer->value,
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

        <h1 id="score"></h1>

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
                $('#score').text('Your score is: ' + score + '/' + amountOfQuestions);

                //TODO ask help for this
                for (let i = 0; i < questions.length; i++) {
                    let correctAnswer = correctAnswers[i];

                    let question = questions[i];

                    let buttons = $(question).find('.answerButton');

                    for (let i = 0; i < buttons.length; i++) {
                        let button = buttons[i];
                        console.log($(button)[0].innerText, correctAnswer);
                        if ($(button)[0].innerText === correctAnswer) {
                            $(button).addClass('green');
                        }
                    }


                }

                // TODO add text like "Scroll back up to see which were the correct answers"
            }
        })
        ;

    })
    ;

</script>

<script>
    $.fn.upform = function () {
        var $this = $(this);
        var container = $this.find(".upform-main");

        $($this).find("form").submit(function () {
            return false;
        });

        $(container)
            .find(".input-block")
            .not(".input-block input")
            .on("click", function () {
                rescroll(this);
            });

        $(container).find(".input-block input").keypress(function (e) {
            if (e.which == 13) {
                if ($(this).hasClass("required") && $(this).val() == "") {
                } else moveNext(this);
            }
        });

        $(container).find('.input-block input[type="radio"]').change(function (e) {
            moveNext(this);
        });

        $(window).on("scroll", function () {
            $(container).find(".input-block").each(function () {
                var etop = $(this).offset().top;
                var diff = etop - $(window).scrollTop();

                if (diff > 100 && diff < 300) {
                    reinitState(this);
                }
            });
        });

        function reinitState(e) {
            $(container).find(".input-block").removeClass("active");

            $(container).find(".input-block input").each(function () {
                $(this).blur();
            });
            $(e).addClass("active");
            /*$(e).find('input').focus();*/
        }

        function rescroll(e) {
            $(window).scrollTo($(e), 200, {
                offset: {left: 100, top: -200},
                queue: false
            });
        }

        function reinit(e) {
            reinitState(e);
            rescroll(e);
        }

        function moveNext(e) {
            $(e).parent().parent().next().click();
        }

        function movePrev(e) {
            $(e).parent().parent().prev().click();
        }
    };

    $(".upform").upform();
</script>

