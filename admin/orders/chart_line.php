
<figure class="highcharts-figure" >
                <div id="container" style="width: 100%; height:auto ;" ></div>
                <p class="highcharts-description">
                    Chart line 
                </p>
            </figure>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
    <script>
        $(document).ready(function(){
            const days = 30;
            $.ajax({
                url: '../orders/get_san_pham.php',
                type:'GET',
                dataType: 'json',
                data: {days},
            })
            .done(function(response){
                const arrX=(Object.keys(response));
                const arrY=(Object.values(response));
                console.log(arrY)
                console.log(arrX)
                Highcharts.chart('container', {
                    title: {
                    text: '30 ngày gần nhất'
                    },
                    yAxis: {
                    title: {
                        text: 'Số tiền'
                    }
                    },

                    xAxis: {
                        categories: arrX 
                    },

                    legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                    },

                    plotOptions: {
                    series: {
                        label: {
                        connectorAllowed: false
                        },
                    }
                    },

                    series: [{
                    name: 'Doanh thu',
                    data: arrY
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                            maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });
            })
        })  

    </script> 