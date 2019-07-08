<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
    <div class="container h-100">
        <div class="container" id="lang">
            <p>NL</p>
            <p>EN</p>
            <p>FR</p>
        </div>
        <div class="container" id="nav">
            <p>Home</p>
            <p>Info</p>
            <p>Quiz</p>
            <p>Contact</p>
        </div>
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="display-4 font-weight-light">Do you know where your taxes are going?</h1>
                <p class="lead">
                <div id="buttons">
                    <a href="#content" class="js-scroll-trigger btn btn-outline-dark">Yes, test me</a>
                    <a href="#" class="btn btn-outline-dark">No, learn more</a>
                </div>
                </p>
            </div>
        </div>
    </div>
</header>

<!-- Page Content -->
<section class="py-5">
    <div class="container">
        <h2 id="content" class="font-weight-light">Page Content</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ab nulla dolorum autem nisi officiis
            blanditiis voluptatem hic, assumenda aspernatur facere ipsam nemo ratione cumque magnam enim fugiat
            reprehenderit expedita.</p>

        <div id="donutchart" style="width: 1200px; height: 700px;"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages: ["corechart"]});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Budget', 'Category'],
                    ['Sociale bescherming', 85846.5],
                    ['Gezondheid', 33684.3],
                    ['Algemeen bestuur', 31816.9],
                    ['Economische zaken', 27818.1],
                    ['Onderwijs', 27782.7],
                    ['Openbare orde en veiligheid', 7536.5],
                    ['Recreatie, cultuur en religie', 5532.3],
                    ['Milieubescherming', 4014.3],
                    ['Defensie', 3529.4],
                    ['Huisvesting en gemeenschapsvoorzieningen', 1424.8]
                ]);

                var options = {
                    title: 'Budget data per category',
                    pieHole: 0.65,
                    colors: ['#4ABEDF','#FFF728','#6A6A68',  '#FF5360',  '#BBAB8B','#C59EF6','#EF8275','#E7EB90','#9DC0BC','#C89F9C'],
                    /*colors: ['#4ABEDF', '#FFDD0E', '#FF3946', '#50504E','#4ABEDF', '#FFDD0E', '#FF3946','#4ABEDF', '#FFDD0E', '#FF3946',],*/
                    enableInteractivity: true,
                    /*pieSliceText: 'percentage'*/
                    /*reverseCategories:true,*/
                    tooltip: {textStyle: {color: 'black'}, showColorCode: true}
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
        </script>

    </div>
</section>