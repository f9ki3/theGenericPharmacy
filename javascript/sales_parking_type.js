 // Data for the pie chart
 
 $(document).ready(function() {
  $.ajax({
      url: '../server/get_sales_data.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
          var years = data.map(function(item) {
              return item.year;
          });
          var sales = data.map(function(item) {
              // Convert each sales value to number format
              return Number(item.total_sales);
          });
          
          const pieData = {
            series: sales,
            labels:  years
          };
        
          // Options for the pie chart
          const pieOptions = {
            chart: {
              type: 'pie'
            },
            labels: pieData.labels,
            series: pieData.series,
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          };
        
          // Initialize the pie chart with options and data
          const pieChart = new ApexCharts(document.querySelector("#pie"), pieOptions);
        
          // Render the chart
          pieChart.render();
      },
      error: function(xhr, status, error) {
          $('#sales-data').html('Error: ' + xhr.status + ' - ' + xhr.statusText);
      }
  });
});



