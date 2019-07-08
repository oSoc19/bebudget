<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>oSoc19 - Budget Data</title>

    <?php echo pasStylesheetAan("bootstrap.css"); ?>
    <?php echo pasStylesheetAan("style.css"); ?>

    <?php echo haalJavascriptOp("scroll.js"); ?>
    <?php echo haalJavascriptOp("jquery-3.3.1.js"); ?>
    <?php echo haalJavascriptOp("bootstrap.bundle.js"); ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">

    <script>
        var site_url = '<?php echo site_url(); ?>';
        var base_url = '<?php echo base_url(); ?>';
    </script>
</head>

<body>

<?php echo $inhoud; ?>

</body>

</html>
