<?php


foreach ($expenses as $expens) {
    /*if( strpos($expens->NFGOVCOFOG_FUNCTION,"F") ) {*/
    if (strlen($expens->NFGOVCOFOG_FUNCTION) === 3) {
       /* echo $expens->NFGOVCOFOG_FUNCTION;

        echo "                       ";
        echo "</br>";
        echo "</br>";*/

       /* echo "['" . substr($expens->Overheidsfunctie,3) . "', " . $expens->Value . "],";
        echo "</br>";*/
    }
    /*}*/


}
?>
<div id="donutchart" style="width: 1200px; height: 700px;"></div>

<!--<p>What does this mean?</p>
<p>if government has €100(0) ->  </p>-->

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
