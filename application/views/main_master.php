<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>oSoc19 - Budget Data</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="/bebudget/assets/css/quiz.css">
    <link rel="stylesheet" href="/bebudget/assets/css/style.css">
    <?php
/*    echo "<link rel=\"stylesheet\" href=\"" . base_url("assets/css/" . "quiz.css") . "\" />";
    echo "<link rel=\"stylesheet\" href=\"" . base_url("assets/css/" . "style.css") . "\" />";
    */?>


    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.js"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito|Poppins&display=swap" rel="stylesheet">

    <script>
        var site_url = '<?php echo site_url(); ?>';
        var base_url = '<?php echo base_url(); ?>';

    </script>
</head>

<body>
<?php echo $landingspage; ?>
<div id="quiz">
    <?php echo $quiz; ?>
</div>
<div id="graph">
    <?php echo $graph; ?>
</div>
<?php echo $footer; ?>

<div id="upload-form" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Please enter a password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $attributes = array('name' => 'upload-form'); ?>
            <?php echo form_open('upload/checkPassword', $attributes) ?>
            <div class="modal-body">
                <input type="password" name="password-input"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Go to upload</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


<?php
/*echo "<script src=\"" . base_url("assets/js/" . "scroll.js") . "\"></script>";
echo "<script src=\"" . base_url("assets/js/" . "quiz-scroll.js") . "\"></script>";
*/?>

<script src="/bebudget/assets/js/scroll.js"></script>
<script src="/bebudget/assets/js/quiz-scroll.js"></script>

</body>
</html>
