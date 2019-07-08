<div id="donutchart" style="width: 1200px; height: 900px;"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Budget', 'Category'],
            ['RIJKSSCHULD', 46699126],
            ['FOD SOCIALE ZEKERHEID', 18710216],
            ['DOTATIES', 13173253],
            ['LANDSVERDEDIGING', 12194205],
            ['FOD MOBILITEIT EN VERVOER', 3286693],
            ['EUROPESE UNIE', 3172020],
            ['FED. POLITIE & GEINT. WERKING', 2008551],
            ['FINANCIEN', 2000892],
            ['JUSTITIE', 1804283],
            ['BINNENLANDSE ZAKEN', 1482358],
            ['BUIT. ZAKEN & ONTW.-SAMENWERK.', 1404587],
            ['MAATSCHAPPELIJKE INTEGRATIE', 1324924],
            ['INTERDEPARTEMENTALE PROVISIES', 925939],
            ['REGIE DER GEBOUWEN + OP. AMBT', 728928],
            ['ECONOMIE', 592365],
            ['WETENSCHAPSBELEID', 489711],
            ['KANSELARIJ', 399295],
            ['VOLKSGEZONDHEID', 341429],
            ['WERKGELEGENHEID, ARBEID & S.O.', 219287],
            ['FOD BOSA', 153004],
            ['Onafhankelijke organen.', 8361]
        ]);

        var options = {
            title: 'Budget data per category',
            pieHole: 0.65,
            colors: ['#4ABEDF', '#FFDD0E', '#4ABEDF', '#FF3946', '#50504E'],
            enableInteractivity: true,
            /*pieSliceText: 'percentage'*/
            /*reverseCategories:true,*/
            tooltip:{textStyle: {color: 'black'}, showColorCode: true}
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
</script>
