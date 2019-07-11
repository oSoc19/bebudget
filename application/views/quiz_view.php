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

<div class="upform">


    <form>

        <div class="upform-header"></div>

        <div class="upform-main">


            <div class="input-block">
                <div class="label">Q1. If we give you a proven system to make at least $7,500 per month online, would you follow it to a tee?</div>
                <div class="input-control">
                    <input id="toggle-on-q1" class="toggle toggle-left" name="q1" value="yes" type="radio">
                    <label for="toggle-on-q1" class="btn"><span>A</span> Yes</label>
                    <input id="toggle-off-q1" class="toggle toggle-right" name="q1" value="no" type="radio">
                    <label for="toggle-off-q1" class="btn"><span>B</span> No</label>
                </div>
            </div>

            <div class="input-block">
                <div class="label">Q2. Would you be willing to invest at least 30 minutes per day to make it work?</div>
                <div class="input-control">
                    <input id="toggle-on-q2" class="toggle toggle-left" name="q2" value="yes" type="radio">
                    <label for="toggle-on-q2" class="btn"><span>A</span> Yes</label>
                    <input id="toggle-off-q2" class="toggle toggle-right" name="q2" value="no" type="radio">
                    <label for="toggle-off-q2" class="btn"><span>B</span> No</label>
                </div>
            </div>

            <div class="input-block">
                <div class="label">Q3. Would you like to get started NOW?</div>
                <div class="input-control">
                    <input id="toggle-on-q3" class="toggle toggle-left" name="q3" value="yes" type="radio">
                    <label for="toggle-on-q3" class="btn"><span>A</span> Yes</label>
                    <input id="toggle-off-q3" class="toggle toggle-right" name="q3" value="no" type="radio">
                    <label for="toggle-off-q3" class="btn"><span>B</span> No</label>
                </div>
            </div>

            <div class="input-block">
                <div class="label">What is your name?</div>
                <div class="input-control">
                    <input type="text" class="required" autocomplete="off">
                </div>
            </div>

        </div>

        <div class="upform-footer">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>

    </form>


</div>

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

<script>
    $.fn.upform = function () {
        var $this = $(this);
        var container = $this.find(".upform-main");

        $(document).ready(function () {
            $(container).find(".input-block").first().click();
        });

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
    $.fn.upform = function () {
        var $this = $(this);
        var container = $this.find(".upform-main");

        $(document).ready(function () {
            $(container).find(".input-block").first().click();
        });

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

