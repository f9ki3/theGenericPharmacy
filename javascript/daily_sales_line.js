var options = {
    chart: {
        type: 'line' // Set the chart type to 'line'
    },
    series: [{
        name: 'sales',
        data: [900, 740, 520, 600, 750], // Example sales data for the years 2019-2023
        color: '#FF0000' // Red color
    }],
    xaxis: {
        categories: ['2019', '2020', '2021', '2022', '2023'] // Years 2019 to 2023
    }
};

var chart = new ApexCharts(document.querySelector("#line"), options);

chart.render();
