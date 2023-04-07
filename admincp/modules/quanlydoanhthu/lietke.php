
<div class="card shadow mb-4">
    <div class="card-header py-3 form-inline">
        <h6 class="m-0 font-weight-bold text-primary">Danh thu</h6>
        <div class="ml-auto">
          <form action="" id="thongke-doanhthu" method="POST">
            <select name="chon-nam" id="chon-nam">
              <?php
              $year=date('Y');
                for($i=2023;$i<=$year;$i++){
                    echo '<option value="'.$i.'" name=nam'.($_POST['chon-nam']==$i ? ' selected':'').'>'.$i.'</option>';
                }
              ?>
              
              </select>
              </form>
        </div>
    </div>
    <div class="card-body">
        <div class="chart-bar">
            <canvas id="myBarChart"></canvas>
        </div>
        <!-- <hr>
        Styling for the bar chart can be found in the
        <code>/js/demo/chart-bar-demo.js</code> file. -->
    </div>
</div>
<?php
        $sql = "SELECT EXTRACT(MONTH FROM ngay_dathang) AS month, SUM(CAST(REPLACE(tong_tien, '.', '') AS UNSIGNED)) AS Total FROM tbl_donhang ".(isset($_POST['chon-nam'])? "WHERE EXTRACT(YEAR FROM ngay_dathang)=".$_POST['chon-nam']."" :'')."  GROUP BY EXTRACT(MONTH FROM ngay_dathang)";
        $result = mysqli_query($mysqli, $sql);
        $sales = array();
        $labels = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $labels[]='Tháng ' . $row['month'];
            // array_push($labels,$labels);
           $sales[] = $row['Total'];
        //    array_push($sales,$sale);
           
        }
      
?>
<script>
  const selectElement = document.getElementById('chon-nam');
  selectElement.addEventListener('change', (event) => {
    document.getElementById('thongke-doanhthu').submit();
  });
</script>
<script src="js/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    // labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],
    labels: <?php echo json_encode($labels); ?>,
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: <?php echo json_encode($sales); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo (intval(max($sales))); ?>,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return  new Intl.NumberFormat('de-DE', { minimumFractionDigits: 0 }).format(value) + ' ₫';
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return  new Intl.NumberFormat('de-DE', { minimumFractionDigits: 0 }).format(tooltipItem.yLabel)+' ₫';
        }
      }
    },
  }
});
</script>
