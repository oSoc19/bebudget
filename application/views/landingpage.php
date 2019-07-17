<header class="masthead">
    <div class="container h-100">
        <div class="container" id="lang">
            <?php echo anchor('Home/switchLanguage/english','EN'); ?>
            <?php echo anchor('Home/switchLanguage/dutch','NL'); ?>
            <?php echo anchor('Home/switchLanguage/french','FR'); ?>
        </div>
        <div class="container" id="nav">
            <?php echo anchor("", "Home"); ?>
            <a href="#quiz" class="js-scroll-trigger">Quiz</a>
            <a href="#graph" class="js-scroll-trigger">Info</a>
        </div>
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <!--<h1 class="display-4 font-weight-light">Do you know where your taxes are going?</h1>-->
                <h1 class="display-4 font-weight-light"><?php  echo $title;?></h1>
                <p class="lead">
                <div id="buttons">
                    <a href="#quiz" class="js-scroll-trigger btn btn-outline-dark"><?php echo $btn_quiz; ?></a>
                    <a href="#graph" class=" js-scroll-trigger btn btn-outline-dark"><?php echo $btn_chart; ?></a>
                </div>
                </p>
            </div>
        </div>
    </div>
</header>