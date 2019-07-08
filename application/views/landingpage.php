<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="font-weight-light">Do you know where your taxes are going?</h1>
            <div id="buttons">
            <p class="btn btn-light">Yes, test me</p>
            <p class="btn btn-light">No, learn more</p>
            </div>
           <!-- <div style="height: 700px"></div>
            <p class="lead mb-0">You've reached the end!</p>-->
            <div id="donutchart" style="width: 1000px; height: 900px;"></div>
        </div>
    </div>
</div>
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
