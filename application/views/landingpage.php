<header class="masthead">
    <div class="container h-100">
       <div class="container" id="lang">
            <a href="#">NL</a>
            <a href="#">EN</a>
            <a href="#">FR</a>
        </div>
        <div class="container" id="nav">
            <?php echo anchor("","Home"); ?>
            <?php /*echo anchor("#graph","Info"); */?>
            <a href="#graph">Info</a>
            <?php /*echo anchor("#quiz","Quiz"); */?>
            <a href="#quiz">Quiz</a>
            <?php /*echo anchor("","Contact"); */?>
            <a href="#" data-toggle="modal" data-target="#upload-form"></a>
        </div>
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="display-4 font-weight-light">Do you know where your taxes are going?</h1>
                <p class="lead">
                <div id="buttons">
                    <a href="#quiz" class="js-scroll-trigger btn btn-outline-dark">Yes, test me</a>
                    <a href="#graph" class=" js-scroll-trigger btn btn-outline-dark">No, learn more</a>
                </div>
                </p>
            </div>
        </div>
    </div>
</header>