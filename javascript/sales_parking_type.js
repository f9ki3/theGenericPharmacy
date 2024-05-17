 // Data for the pie chart
 const pieData = {
    series: [900, 740, 520, 600, 750],
    labels:  ['2019', '2020', '2021', '2022', '2023']
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

