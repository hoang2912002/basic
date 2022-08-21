
    <?php
        require '../connect.php';
    ?>
    <link rel="stylesheet" href="./chart_drill_down.css">
    <figure class="highcharts-figure">
      <div id="container1"></div>
      <p class="highcharts-description">
        Biểu đồ cột thống kê số lượng sản phẩm bán được
      </p>
    </figure>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
      $(document).ready(function(){
        const days = 50;
        $.ajax({
          url: 'get_amount_chart_drill_down.php',
          data: {days},
          dataType: 'json',
        })
        .done(function(response){
          const arr1 = Object.values(response[0]);
          const arrDetail = [];
          Object.values(response[1]).forEach((each)=>{
            each.data =Object.values(each.data);
            arrDetail.push(each);
          })
          console.log(arrDetail);
          console.log(arr1);
          setTimeout(function(){getChart(days,arr1,arrDetail)},2000);
        })
      })
      
      function getChart(days,arr1,arrDetail){// Create the chart
        Highcharts.chart('container1', {
          chart: {
            type: 'column'
          },
          title: {
            align: 'left',
            text: 'Tổng số sản phẩm bán được' + days,
          },
          accessibility: {
            announceNewData: {
              enabled: true
            }
          },
          xAxis: {
            type: 'category'
          },
          yAxis: {
            title: {
              text: 'Tổng số hàng bán được'
            }

          },
          legend: {
            enabled: false
          },
          plotOptions: {
            series: {
              borderWidth: 0,
              dataLabels: {
                enabled: true,
                format: '{point.y:f}'
              }
            }
          },

          tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> of total<br/>'
          },

          series: [
            {
              name: "Sản phẩm",
              colorByPoint: true,
              data: [arr1],
            }
          ],
          drilldown: {
            series: [arrDetail] ,
          }
        });
    }
    </script>