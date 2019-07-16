<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>oSoc19 - Budget Data</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <?php
        echo "<link rel=\"stylesheet\" href=\"" . base_url("assets/css/" . "quiz.css") . "\" />";
        echo "<link rel=\"stylesheet\" href=\"" . base_url("assets/css/" . "style.css") . "\" />";
        echo "<link rel=\"stylesheet\" href=\"" . base_url("assets/css/" . "upload.css") . "\" />";
    ?>


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

<body class="text-center">

    <?php
        echo isset($error) ? '<div class="alert alert-danger col-12">' . $error . '</div>' : NULL;
        echo isset($success) ? '<div class="alert alert-success col-12">' . $success . '</div>' : NULL;
        $attributes = array('name' => 'upload-form', 'class' => 'form-signin');
        echo form_open_multipart('upload/do_upload', $attributes);
    ?>

    <h1 class="h3 mb-3 font-weight-normal">Upload</h1>
    <input type="file" class="form-control" name="userfile" size="20" required="required"/>

    <br/>
    <div>
        <label>Year: </label>
        <input type="text" class="form-control" name="year" required="required" placeholder="Year"/>
    </div>
    <div class="languages">
        <label>Language: </label>

        <?php

            $options = array(
                'dutch' => 'Nederlands',
                'french' => 'Français',
                'english' => 'English',
            );

            $attributes = array(
              'class' => 'form-control'
            );

            echo form_dropdown('languages', $options, 'english', $attributes);
        ?>
    </div>

    <input class="btn btn-dark m-3" type="submit" value="Submit"/>

    <?php echo form_close(); ?>
</body>
</html>




