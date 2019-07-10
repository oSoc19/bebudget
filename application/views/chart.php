<div id="donutchart" style="width: 1200px; height: 700px;"></div>



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
                    <div id="subcatChart" style="width: 90%; height:50%;"></div>
                    <p></p>
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
    info = {
        "TOT": {
            "id": "TOT",
            "name": "Total",
            "government": "General government",
            "year": "2017",
            "value": "228985.8",
            "categories": [
                {
                    "id": "F01",
                    "name": "01 General public services",
                    "government": "General government",
                    "year": "2017",
                    "value": "31816.9",
                    "subcategories": [
                        {
                            "id": "F01_1",
                            "name": "01.1 Executive and legislative organs, financial and fiscal affairs, external affairs",
                            "value": "9400.3"
                        },
                        {
                            "id": "F01_2",
                            "name": "01.2 Foreign economic aid",
                            "value": "1046.5"
                        },
                        {
                            "id": "F01_3",
                            "name": "01.3 General services",
                            "value": "4930.1"
                        },
                        {
                            "id": "F01_4",
                            "name": "01.4 Basic research",
                            "value": "4960.3"
                        },
                        {
                            "id": "F01_5",
                            "name": "01.5 R&D General public services",
                            "value": "27.3"
                        },
                        {
                            "id": "F01_6",
                            "name": "01.6 General public services n.e.c.",
                            "value": "85.5"
                        },
                        {
                            "id": "F01_7",
                            "name": "01.7 Public debt transactions",
                            "value": "11367"
                        },
                        {
                            "id": "F01_8",
                            "name": "01.8 Transfers of a general character between different levels of government",
                            "value": "0"
                        }
                    ]
                },
                {
                    "id": "F02",
                    "name": "02 Defence",
                    "government": "General government",
                    "year": "2017",
                    "value": "3529.4",
                    "subcategories": [
                        {
                            "id": "F02_1",
                            "name": "02.1 Military defence",
                            "value": "3327.9"
                        },
                        {
                            "id": "F02_2",
                            "name": "02.2 Civil defence",
                            "value": "0"
                        },
                        {
                            "id": "F02_3",
                            "name": "02.3 Foreign military aid",
                            "value": "179.8"
                        },
                        {
                            "id": "F02_4",
                            "name": "02.4 R&D Defence",
                            "value": "21.5"
                        },
                        {
                            "id": "F02_5",
                            "name": "02.5 Defence n.e.c.",
                            "value": "0.2"
                        }
                    ]
                },
                {
                    "id": "F03",
                    "name": "03 Public order and safety",
                    "government": "General government",
                    "year": "2017",
                    "value": "7536.5",
                    "subcategories": [
                        {
                            "id": "F03_1",
                            "name": "03.1 Police services",
                            "value": "4472.9"
                        },
                        {
                            "id": "F03_2",
                            "name": "03.2 Fire-protection services",
                            "value": "841.5"
                        },
                        {
                            "id": "F03_3",
                            "name": "03.3 Law courts",
                            "value": "1158.9"
                        },
                        {
                            "id": "F03_4",
                            "name": "03.4 Prisons",
                            "value": "619.2"
                        },
                        {
                            "id": "F03_5",
                            "name": "03.5 R&D Public order and safety",
                            "value": "15.6"
                        },
                        {
                            "id": "F03_6",
                            "name": "03.6 Public order and safety n.e.c.",
                            "value": "428.3"
                        }
                    ]
                },
                {
                    "id": "F04",
                    "name": "04 Economic affairs",
                    "government": "General government",
                    "year": "2017",
                    "value": "27818.1",
                    "subcategories": [
                        {
                            "id": "F04_1",
                            "name": "04.1 General economic, commercial and labour affairs",
                            "value": "14076.8"
                        },
                        {
                            "id": "F04_2",
                            "name": "04.2 Agriculture, forestry, fishing and hunting",
                            "value": "275.6"
                        },
                        {
                            "id": "F04_3",
                            "name": "04.3 Fuel and energy",
                            "value": "783.5"
                        },
                        {
                            "id": "F04_4",
                            "name": "04.4 Mining, manufacturing and construction",
                            "value": "32.6"
                        },
                        {
                            "id": "F04_5",
                            "name": "04.5 Transport",
                            "value": "10553"
                        },
                        {
                            "id": "F04_6",
                            "name": "04.6 Communication",
                            "value": "312.2"
                        },
                        {
                            "id": "F04_7",
                            "name": "04.7 Other industries",
                            "value": "458.6"
                        },
                        {
                            "id": "F04_8",
                            "name": "04.8 R&D Economic affairs",
                            "value": "1231"
                        },
                        {
                            "id": "F04_9",
                            "name": "04.9 Economic affairs n.e.c.",
                            "value": "94.8"
                        }
                    ]
                },
                {
                    "id": "F05",
                    "name": "05 Environment protection",
                    "government": "General government",
                    "year": "2017",
                    "value": "4014.3",
                    "subcategories": [
                        {
                            "id": "F05_1",
                            "name": "05.1 Waste management",
                            "value": "2383"
                        },
                        {
                            "id": "F05_2",
                            "name": "05.2 Waste water management",
                            "value": "363.6"
                        },
                        {
                            "id": "F05_3",
                            "name": "05.3 Pollution abatement",
                            "value": "341.7"
                        },
                        {
                            "id": "F05_4",
                            "name": "05.4 Protection of biodiversity and landscape",
                            "value": "268"
                        },
                        {
                            "id": "F05_5",
                            "name": "05.5 R&D Environmental protection",
                            "value": "79.2"
                        },
                        {
                            "id": "F05_6",
                            "name": "05.6 Environmental protection n.e.c.",
                            "value": "578.9"
                        }
                    ]
                },
                {
                    "id": "F06",
                    "name": "06 Housing",
                    "government": "General government",
                    "year": "2017",
                    "value": "1424.8",
                    "subcategories": [
                        {
                            "id": "F06_1",
                            "name": "06.1 Housing development",
                            "value": "347.8"
                        },
                        {
                            "id": "F06_2",
                            "name": "06.2 Community development",
                            "value": "558"
                        },
                        {
                            "id": "F06_3",
                            "name": "06.3 Water supply",
                            "value": "189.3"
                        },
                        {
                            "id": "F06_4",
                            "name": "06.4 Street lighting",
                            "value": "273.2"
                        },
                        {
                            "id": "F06_5",
                            "name": "06.5 R&D Housing and community amenities",
                            "value": "2.2"
                        },
                        {
                            "id": "F06_6",
                            "name": "06.6 Housing and community amenities n.e.c.",
                            "value": "54.1"
                        }
                    ]
                },
                {
                    "id": "F07",
                    "name": "07 Health",
                    "government": "General government",
                    "year": "2017",
                    "value": "33684.3",
                    "subcategories": [
                        {
                            "id": "F07_1",
                            "name": "07.1 Medical products, appliances and equipment",
                            "value": "3465.8"
                        },
                        {
                            "id": "F07_2",
                            "name": "07.2 Outpatient services",
                            "value": "11674.9"
                        },
                        {
                            "id": "F07_3",
                            "name": "07.3 Hospital services",
                            "value": "17151"
                        },
                        {
                            "id": "F07_4",
                            "name": "07.4 Public health services",
                            "value": "549.9"
                        },
                        {
                            "id": "F07_5",
                            "name": "07.5 R&D Health",
                            "value": "77"
                        },
                        {
                            "id": "F07_6",
                            "name": "07.6 Health n.e.c.",
                            "value": "765.6"
                        }
                    ]
                },
                {
                    "id": "F08",
                    "name": "08 Recreation, culture and religion",
                    "government": "General government",
                    "year": "2017",
                    "value": "5532.3",
                    "subcategories": [
                        {
                            "id": "F08_1",
                            "name": "08.1 Recreational and sporting services",
                            "value": "1685.9"
                        },
                        {
                            "id": "F08_2",
                            "name": "08.2 Cultural services",
                            "value": "2287.5"
                        },
                        {
                            "id": "F08_3",
                            "name": "08.3 Broadcasting and publishing services",
                            "value": "914.5"
                        },
                        {
                            "id": "F08_4",
                            "name": "08.4 Religious and other community services",
                            "value": "394.3"
                        },
                        {
                            "id": "F08_5",
                            "name": "08.5 R&D Recreation, culture and religion",
                            "value": "50.8"
                        },
                        {
                            "id": "F08_6",
                            "name": "08.6 Recreation, culture and religion n.e.c.",
                            "value": "199.4"
                        }
                    ]
                },
                {
                    "id": "F09",
                    "name": "09 Education",
                    "government": "General government",
                    "year": "2017",
                    "value": "27782.7",
                    "subcategories": [
                        {
                            "id": "F09_1",
                            "name": "09.1 Pre-primary and primary education",
                            "value": "9017"
                        },
                        {
                            "id": "F09_2",
                            "name": "09.2 Secondary education",
                            "value": "10778.3"
                        },
                        {
                            "id": "F09_3",
                            "name": "09.3 Post-secondary non-tertiary education",
                            "value": "23.8"
                        },
                        {
                            "id": "F09_4",
                            "name": "09.4 Tertiary education",
                            "value": "3901.3"
                        },
                        {
                            "id": "F09_5",
                            "name": "09.5 Education not definable by level",
                            "value": "2509"
                        },
                        {
                            "id": "F09_6",
                            "name": "09.6 Subsidiary services to education",
                            "value": "1032.2"
                        },
                        {
                            "id": "F09_7",
                            "name": "09.7 R&D Education",
                            "value": "7.2"
                        },
                        {
                            "id": "F09_8",
                            "name": "09.8 Education n.e.c.",
                            "value": "514"
                        }
                    ]
                },
                {
                    "id": "F10",
                    "name": "10 Social protection",
                    "government": "General government",
                    "year": "2017",
                    "value": "85846.5",
                    "subcategories": [
                        {
                            "id": "F10_1",
                            "name": "10.1 Sickness and disability",
                            "value": "14440.8"
                        },
                        {
                            "id": "F10_2",
                            "name": "10.2 Old age",
                            "value": "40373.9"
                        },
                        {
                            "id": "F10_3",
                            "name": "10.3 Survivors",
                            "value": "7544.1"
                        },
                        {
                            "id": "F10_4",
                            "name": "10.4 Family and children",
                            "value": "9627"
                        },
                        {
                            "id": "F10_5",
                            "name": "10.5 Unemployment",
                            "value": "7246.7"
                        },
                        {
                            "id": "F10_6",
                            "name": "10.6 Housing",
                            "value": "927.5"
                        },
                        {
                            "id": "F10_7",
                            "name": "10.7 Social exclusion n.e.c.",
                            "value": "4965"
                        },
                        {
                            "id": "F10_8",
                            "name": "10.8 R&D Social protection",
                            "value": "22.9"
                        },
                        {
                            "id": "F10_9",
                            "name": "10.9 Social protection n.e.c.",
                            "value": "698.7"
                        }
                    ]
                }
            ]
        }
    };

    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(drawChartCategories);

    function drawChartCategories() {

        dataCat = setDataForChartCategories();
        options = setOptions();


        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(dataCat, options);

        showModalWithSubCategories(chart);

    }

    function setDataForChartCategories() {
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
        return data;
    }

    function setOptions() {
        var options = {
            title: 'Budget data per category',
            pieHole: 0.65,
            colors: ['#4ABEDF', '#FFF728', '#6A6A68', '#FF5360', '#BBAB8B', '#C59EF6', '#EF8275', '#E7EB90', '#9DC0BC', '#C89F9C'],
            enableInteractivity: true,
            /*pieSliceText: 'percentage'*/
            /*reverseCategories:true,*/
            tooltip: {textStyle: {color: 'black'}, showColorCode: true}
        };

        return options;
    }
    function setOptionsForSubCategories() {
        var options = {
            title: 'Budget data per category',
            /*pieHole: 0.65,*/
            colors: ['#4ABEDF', '#FFF728', '#6A6A68', '#FF5360', '#BBAB8B', '#C59EF6', '#EF8275', '#E7EB90', '#9DC0BC', '#C89F9C'],
            enableInteractivity: true,
            /*pieSliceText: 'percentage'*/
            /*reverseCategories:true,*/
            tooltip: {textStyle: {color: 'black'}, showColorCode: true}
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
                        $('#title').text(category.name);

                        drawChartSubCategories(category);

                        $('#myModal').modal('show');
                    }
                }


            }
        }
    }


    function drawChartSubCategories(category) {
        data = setDataForChartSubcategories(category);
        options = setOptionsForSubCategories();


        var chart = new google.visualization.PieChart(document.getElementById('subcatChart'));
        chart.draw(data, options);
    }

    function setDataForChartSubcategories(category) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Category');
        data.addColumn('number', 'Value');
        data.addRows(category.subcategories.length);
        var count = 0;
        for (var i = 0; i < category.subcategories.length; i++) {

            data.setCell(i, count, category.subcategories[i].name.substring(3));
            count++;
            data.setCell(i, count, category.subcategories[i].value);
            count = 0;
        }
        return data;
    }
</script>

<script>
    $(document).ready(function () {
        $('#getData').click(function () {
            getData();
        });

    });
    var getData = function () {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "http://84.195.17.11/api/2018.json",
            "method": "GET",
            "headers": {
                "content-type": "json",
                /*"x-apikey": "6afd147ab67ac142373bf898f75cef47af704",*/
                "cache-control": "no-cache"
            }
        };

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
    };
</script>