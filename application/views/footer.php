<footer class="section footer-classic context-dark bg-image text-light p-3">
    <div class="container">
        <div class="row row-30">
            <div class="col-md-4 col-sm-12">
                <div class="pr-xl-4">
                    <p>The data used in this website is from the year 2017.</p>
                    <p>Last updated on: <?php /*echo $this->config->config['date']; */?></p>
                    <p><a href="#" data-toggle="modal" data-target="#upload-form">Upload new data</a></p>
                </div>
            </div>

            <div class="col-md-8 col-sm-12 row">

                <div class="col-md-4 col-sm-12 logo">
                    <a href="https://2019.summerofcode.be/">
                        <?php
                        echo "<img src=\"" . base_url("assets/images/" . "osoc.svg") . "\" />";
                        ?>
                    </a>
                    <p>Made with love at <a href="https://2019.summerofcode.be/">oSoc</a></p>
                </div>
                <div class="col-md-4 col-sm-12 logo">
                    <a href="https://bosa.belgium.be/nl">
                        <?php
                        echo "<img src=\"" . base_url("assets/images/" . "bosa.svg") . "\" />";
                        ?>
                    </a>
                    <p>In partnership with <a href="https://bosa.belgium.be/nl">BOSA</a></p>
                </div>
                <div class="col-md-4 col-sm-12 logo">
                    <a href="https://stat.nbb.be/">
                        <?php
                        echo "<img src=\"" . base_url("assets/images/" . "nbb.svg") . "\" />";
                        ?>
                    </a>
                    <p> Source: <a href="https://stat.nbb.be/">NBB.Stat</a> - National Bank of Belgium</p>
                </div>
            </div>
        </div>
    </div>
</footer>