<div id="donutchart"></div>


<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section id="content">
                    <div id="subcatChart" style="height:50%;"></div>
                    <p></p>
                    <!--<div id="linechart" style="width: 900px; height: 500px"></div>-->
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

    $.getJSON("uploads/2017.json", function(info) {
        
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawPieChartCategories);

        function drawPieChartCategories() {

            dataCat = setDataForPieChartCategories();
            options = setOptionsForPieChart();


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
            data.addRows(info.TOT.categories.length);
            var count = 0;
            for (var i = 0; i < info.TOT.categories.length; i++) {

                data.setCell(i, count, info.TOT.categories[i].name.substring(3));
                count++;
                data.setCell(i, count, info.TOT.categories[i].value);
                count = 0;
            }
            data.sort({column: 1, desc: true});
            return data;
        }

        function setOptionsForPieChart() {
            var options = {
                    title: 'Budget data per category',
                    pieHole: 0.65,
                    colors: ['#81AE9D', '#EDB458', '#BEA8AA', '#FB9F89', '#BBAB8B', '#C5DCA0', '#BF958D', '#CDD3D5', '#E2EB98', '#CD94A5'],
                    enableInteractivity: true,
                    tooltip: {textStyle: {color: 'black'}, showColorCode: true},
                    width: '100%',
                }
            ;

            return options;
        }

        function setOptionsForSmallPieChart() {
            var options = {
                title: 'Budget data per category',
                pieHole: 0.65,
                colors: ['#81AE9D', '#EDB458', '#BEA8AA', '#FB9F89', '#BBAB8B', '#C5DCA0', '#BF958D', '#CDD3D5', '#E2EB98', '#CD94A5'],
                enableInteractivity: true,
                tooltip: {textStyle: {color: 'black'}, showColorCode: true},
                width: '100%',
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
                            console.log(category);
                            $('#title').text(category.name.substring(3));


                            var width = $(window).width();
                            if (width <= 600) {
                                drawSmallPieChartSubCategories(category)
                            } else {
                                drawPieChartSubCategories(category);
                            }
                            $('#myModal').modal('show');
                        }
                    }


                }
            }
        }


        function drawPieChartSubCategories(category) {

            data = setDataForPieChartSubcategories(category);
            options = setOptionsForSubCategoriesPieChart();


            var chart = new google.visualization.PieChart(document.getElementById('subcatChart'));
            chart.draw(data, options);
        }

        function drawSmallPieChartSubCategories(category) {

            data = setDataForPieChartSubcategories(category);
            options = setOptionsForSmallSubCategoriesPieChart();


            var chart = new google.visualization.PieChart(document.getElementById('subcatChart'));
            chart.draw(data, options);
        }

        function setDataForPieChartSubcategories(category) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Category');
            data.addColumn('number', 'Value');
            data.addRows(category.subcategories.length);
            var count = 0;
            for (var i = 0; i < category.subcategories.length; i++) {

                data.setCell(i, count, category.subcategories[i].name.substring(5));
                count++;
                data.setCell(i, count, category.subcategories[i].value);
                count = 0;
            }
            data.sort({column: 1, desc: true});
            return data;
        }

        function setOptionsForSubCategoriesPieChart() {
            var options = {
                title: 'Budget data per category',
                colors: ['#81AE9D', '#EDB458', '#BEA8AA', '#FB9F89', '#BBAB8B', '#C5DCA0', '#BF958D', '#CDD3D5', '#E2EB98', '#CD94A5'],
                enableInteractivity: true,
                pieSliceText: 'none',
                tooltip: {textStyle: {color: 'black'}, showColorCode: true},
                width: '100%',
                height: 400
            };

            return options;
        }

        function setOptionsForSmallSubCategoriesPieChart() {
            var options = {
                title: 'Budget data per category',
                colors: ['#81AE9D', '#EDB458', '#BEA8AA', '#FB9F89', '#BBAB8B', '#C5DCA0', '#BF958D', '#CDD3D5', '#E2EB98', '#CD94A5'],
                enableInteractivity: true,
                pieSliceText: 'none',
                tooltip: {textStyle: {color: 'black'}, showColorCode: true},
                width: '100%',
                legend: 'right'
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
