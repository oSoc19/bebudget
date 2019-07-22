<header class="masthead">
    <div class="container h-100">
        <div class="container" id="lang">
            <?php echo anchor('Home/switchLanguage/english','EN'); ?>
            <?php echo anchor('Home/switchLanguage/dutch','NL'); ?>
            <?php echo anchor('Home/switchLanguage/french','FR'); ?>
        </div>
        <div class="container" id="nav">
            <?php echo anchor("", $this->lang->line('landingpage_home')); ?>
            <a href="#quiz" class="js-scroll-trigger"><?php echo $this->lang->line('landingpage_quiz'); ?></a>
            <a href="#graph" class="js-scroll-trigger"><?php echo $this->lang->line('landingpage_info'); ?></a>
        </div>
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="display-4 font-weight-light"><?php echo $this->lang->line('landingpage_title'); ?></h1>
                <p class="lead">
                <div id="buttons">
                    <a href="#quiz" class="js-scroll-trigger btn btn-outline-dark"><?php echo $this->lang->line('landingpage_btn_quiz'); ?></a>
                    <a href="#graph" class=" js-scroll-trigger btn btn-outline-dark"><?php echo $this->lang->line('landingpage_btn_chart'); ?></a>
                </div>
                </p>
            </div>
        </div>
    </div>
</header>