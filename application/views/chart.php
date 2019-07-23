<div style="width: 70%; margin: auto; text-align: center;">
    <h2><?php echo $this->lang->line('chart_title'); ?></h2>
    <medium><?php echo $this->lang->line('chart_clickme'); ?></medium>
    <br/>
    <medium><?php echo $this->lang->line('chart_subtitle'); ?></medium>
</div>
<div id="donutchart"></div>

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section id="content">
                    <h4> <?php echo $this->lang->line('chart_bar_title'); ?>  <span></span></h4>
                    <small><?php echo $this->lang->line('chart_subtitle'); ?></small>
                    <div id="subcatChart" style="height:50%;"></div>
                    <p></p>
                    <small><?php echo $this->lang->line('chart_abbreviation_nec'); ?></small>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    $.getJSON("uploads/<?php echo $this->lang->line('chart_file'); ?>", function (info) {

        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawPieChartCategories);

        function drawPieChartCategories() {

            dataCat = setDataForPieChartCategories();

            var width = $(window).width();
            if (width <= 600) {
                options = setOptionsForSmallPieChart();
            } else {
                options = setOptionsForPieChart();
            }

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(dataCat, options);

            showModalWithSubCategories(chart);
        }

        function drawSmallPieChartCategories() {

            dataCat = setDataForPieChartCategories();
            options = setOptionsForSmallPieChart();


            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(dataCat, options);

            showModalWithSubCategories(chart);

        }

        function setDataForPieChartCategories() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Category');
            data.addColumn('number', 'Value');
            /*data.addColumn({'type': 'string', 'role': 'tooltip', 'p': {'html': true}});*/
            data.addRows(info.TOT.categories.length);
            var count = 0;
            for (var i = 0; i < info.TOT.categories.length; i++) {

                data.setCell(i, count, info.TOT.categories[i].name.substring(3));
                count++;
                /*data.setCell(i, count, info.TOT.categories[i].value);*/
                data.setCell(i, count, info.TOT.categories[i].value);
/*                count++;
                data.setCell(i, count, '€ ' + info.TOT.categories[i].value + ' million </br>' + info.TOT.categories[i].name.substring(3));*/
                count = 0;
            }
            data.sort({column: 1, desc: true});
            return data;
        }

        function setOptionsForPieChart() {
            var options = {
                    pieHole: 0.6,
                colors: ['#0a0839', '#36345D', '#636181', '#797893','#00493A', '#005F4B','#2CA37F','#34C498','#7DD9BD','#8ED5BF'],
                    enableInteractivity: true,
                    tooltip: {textStyle: {color: 'black'}, showColorCode: true, isHtml: true},
                width:'100%'
                }
            ;

            return options;
        }

        function setOptionsForSmallPieChart() {
            var options = {
                pieHole: 0.5,
                colors: ['#0a0839', '#36345D', '#636181', '#797893','#00493A', '#005F4B','#2CA37F','#34C498','#7DD9BD','#8ED5BF'],
                enableInteractivity: true,
                tooltip: {textStyle: {color: 'black'}, showColorCode: true, isHtml: true},
                width: '100%',
                height: 350,
                legend: 'bottom'
            };

            return options;
        }



        function showModalWithSubCategories(chart) {
            google.visualization.events.addListener(chart, 'click', clickHandler);

            function clickHandler(e) {
                var selectedItem = chart.getSelection()[0];

                if (selectedItem) {
                    var categoryname = dataCat.getValue(selectedItem.row, 0);
                    // alert('this was clicked: ' + categoryname);
                    for (var i = 0; i < info.TOT.categories.length; i++) {
                        if (info.TOT.categories[i].name.substring(3) == categoryname) {
                            var category = info.TOT.categories[i];
                            $('#title').text(category.name.substring(3));
                            $('#content h4 span').text(category.name.substring(3));


                            var width = $(window).width();
                            if (width <= 600) {
                                drawSmallBarChartSubCategories(category)
                            } else {
                                drawBarChartSubCategories(category);

                            }
                            $('#myModal').modal('show');
                        }
                    }


                }
            }
        }


        function drawBarChartSubCategories(category) {

            data = setDataForBarChartSubcategories(category);
            options = setOptionsForSubCategoriesBarChart();


            var chart = new google.visualization.BarChart(document.getElementById('subcatChart'));
            chart.draw(data, options);
        }

        function drawSmallBarChartSubCategories(category) {

            data = setDataForBarChartSubcategories(category);
            options = setOptionsForSmallSubCategoriesBarChart();


            var chart = new google.visualization.BarChart(document.getElementById('subcatChart'));
            chart.draw(data, options);
        }

        function setDataForBarChartSubcategories(category) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Category');
            data.addColumn('number', 'Value');
            data.addColumn({'type': 'string', 'role': 'annotation', 'p': {'html': true}});
            data.addRows(category.subcategories.length);
            var count = 0;
            for (var i = 0; i < category.subcategories.length; i++) {

                data.setCell(i, count, category.subcategories[i].name.substring(5));
                count++;
                data.setCell(i, count, Math.round(category.subcategories[i].value));
                count++;
                data.setCell(i, count, '€ ' + Math.round(category.subcategories[i].value) + ' ' + category.subcategories[i].name.substring(5));
                count = 0;
            }
            data.sort({column: 1, desc: true});
            return data;
        }

        function setOptionsForSubCategoriesBarChart() {
            var options = {
                /*colors: ['#81AE9D', '#EDB458', '#BEA8AA', '#FB9F89', '#BBAB8B', '#C5DCA0', '#BF958D', '#CDD3D5', '#E2EB98', '#CD94A5'],*/
                colors: ['#0a0839'],
                enableInteractivity: true,
                tooltip: {textStyle: {color: 'black'}, showColorCode: true, isHtml: true},
                width: 600,
                height: 400,
                annotations: {alwaysOutside: true},
                series: {
                    0: {
                        annotations: {
                            textStyle: {fontSize: 12, color: 'black'}
                        }
                    }
                },
                hAxis: {format: 'decimal'},
                vAxis: {textPosition: 'out'},
                legend: 'none'
            };

            return options;
        }

        function setOptionsForSmallSubCategoriesBarChart() {
            var options = {
                /*colors: ['#81AE9D', '#EDB458', '#BEA8AA', '#FB9F89', '#BBAB8B', '#C5DCA0', '#BF958D', '#CDD3D5', '#E2EB98', '#CD94A5'],*/
                colors: ['#0a0839'],
                enableInteractivity: true,
                tooltip: {textStyle: {color: 'black'}, showColorCode: true, isHtml: true},
                width: '100%',
                height: 400,
                annotations: {alwaysOutside: true},
                series: {
                    0: {
                        annotations: {
                            textStyle: {fontSize: 12, color: 'black'}
                        }
                    }
                },
                hAxis: {format: 'decimal', title: 'in millions'},
                vAxis: {textPosition: 'out'},
                legend: 'none'
            };

            return options;
        }

        $(window).resize(function () {
            var width = $(window).width();
            if (width <= 600) {
                drawSmallPieChartCategories();
            } else {
                drawPieChartCategories();
            }
        });

    });

</script>


<script>
    function prettifyNumber(number) {
        if (number.indexOf('.') ||number.indexOf(',') ) {
            number = number.replace(',','');
            number = number.replace('.','');
            number += "00000";
        }
        else {
            number += "00000";
        }
        if (!$.isNumeric(number)) return false;

        if (number > 1000000000000) return Math.round((number / 1000000000000), 2) + ' trillion';
        else if (number > 1000000000) return Math.round((number / 1000000000), 2) + ' billion';
        else if (number > 1000000) return Math.round((number / 1000000), 2) + ' million';
        else if (number > 1000) return number;

        return numberFormat(number);
    }
</script>
