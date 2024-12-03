function loadDataDashboard(url) {
    // Show loading indicator and hide chart before making the request
    $('#chartWrapper,#chartWrapper2, #chartWrapper3, #chartWrapper4, #chartWrapper5').hide(); // Hide the chart wrapper initially
    $('#loadingIndicator, #loadingIndicator2, #loadingIndicator3, #loadingIndicator4, #loadingIndicator5').show(); // Show the loading indicator

    // Start the random animation instantly when the page reloads or category changes
    animateSoldAndSale();

    // Fetch data using AJAX
    $.ajax({
        url: url,
        dataType: 'json', // Expecting a JSON response
        success: function (data) {
            console.log("Data fetched successfully:", data); // Log the full response for debugging
    
            // Stop the random animation once the data is loaded
            stopSoldAndSaleAnimation();
    
            // Initialize total sales and transaction count
            let totalSales = 0;
            let totalTransactions = 0;
    
            // Prepare the data for ApexCharts
            let categories = [];
            let salesData = [];
    
            // Prepare data for yearly sales donut chart
            let yearlySalesData = {};
            let monthlyAggregatedData = {};
    
            // Prepare data for the top products (aggregating by product sales)
            let productSalesData = {};
    
            // Aggregate the sales and quantities by "Month and Year" and also by Year for the donut chart
            data.forEach(function(item) {
                let monthYear = item["Month and Year"];
                let year = new Date(monthYear).getFullYear();
                let month = new Date(monthYear).getMonth(); // Extract month
                let sales = parseFloat(item["Sales"]);
                let quantity = parseInt(item["Quantity"]);
                let productName = item["Name (item)"];
    
                // Accumulate total sales and transaction count
                totalSales += sales;
                totalTransactions += 1;
    
                // Monthly sales aggregation (by month and year)
                if (!monthlyAggregatedData[year]) {
                    monthlyAggregatedData[year] = [];
                }
                monthlyAggregatedData[year][month] = sales;
    
                // Yearly sales aggregation
                if (yearlySalesData[year]) {
                    yearlySalesData[year] += sales;
                } else {
                    yearlySalesData[year] = sales;
                }
    
                // Aggregate sales by product name
                if (productSalesData[productName]) {
                    productSalesData[productName] += sales; // Accumulate sales for each product
                } else {
                    productSalesData[productName] = sales; // Initialize sales if not already in the object
                }
            });
    
            // Prepare monthly sales data for the chart
            let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            // Create an array of months for each year
            for (let year in monthlyAggregatedData) {
                months.forEach(function(month, idx) {
                    let monthYear = month + " " + year;

                    // Add the month-year combination to categories
                    if (!categories.includes(monthYear)) {
                        categories.push(monthYear);
                    }

                    // Add sales for that month (default to 0 if no sales data for the month)
                    let sales = monthlyAggregatedData[year][idx] || 0;
                    salesData.push(sales);
                });
            }

            // Sort the categories (Month and Year) in descending order
            categories.sort(function(a, b) {
                return new Date(b) - new Date(a);
            });

            // Sort the sales data to match the sorted categories
            salesData = categories.map(function(monthYear) {
                let [month, year] = monthYear.split(" ");
                return monthlyAggregatedData[year][months.indexOf(month)] || 0;
            });

            // Hide loading indicator after processing
            $('#chartWrapper,#chartWrapper2, #chartWrapper3, #chartWrapper4, #chartWrapper5').show();
            $('#loadingIndicator, #loadingIndicator2, #loadingIndicator3, #loadingIndicator4, #loadingIndicator5').hide();

            // Update the total sales and transactions in the respective elements
            $('#sold').fadeOut(300, function() {
                $(this).text(totalTransactions).fadeIn(300);
            });
            $('#sale').fadeOut(300, function() {
                $(this).text(new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(totalSales)).fadeIn(300);
            });

            // Create the ApexCharts options for the monthly sales area chart with data labels
            var monthlyOptions = {
                chart: {
                    type: 'area', // Set chart type to 'area' for area chart
                    height: 250
                },
                series: [{
                    name: 'Sales',
                    data: salesData
                }],
                xaxis: {
                    categories: categories, // Set the months as categories
                    labels: {
                        show: false // Hide the labels on the x-axis
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return Math.round(value); // Ensure that the y-axis values are whole numbers
                        }
                    }
                },
                title: {
                    text: 'Monthly Sales',
                    align: 'left'
                },
                tooltip: {
                    x: {
                        format: 'dd MMM yyyy' // Tooltip format (optional)
                    },
                    y: {
                        formatter: function(value) {
                            return Math.round(value); // Round the tooltip values to whole numbers
                        }
                    }
                },
                dataLabels: {
                    enabled: true, // Enable data labels on the area chart
                    style: {
                        fontSize: '12px',
                        fontWeight: 'bold',
                        colors: ['#000'] // Color of the labels
                    },
                    formatter: function(value) {
                        return new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(value); // Format labels as currency
                    },
                    dropShadow: {
                        enabled: true,
                        top: 2,
                        left: 2,
                        blur: 3,
                        opacity: 0.6
                    }
                },
                fill: {
                    opacity: 0.3, // Set fill opacity to make the area chart more visible
                    colors: ['#1E90FF'] // Blue color for the area fill (light blue)
                },
                stroke: {
                    curve: 'smooth', // Smooth line
                    width: 3, // Increase the line width for visibility
                    colors: ['#1E90FF'] // Blue color for the line (dark blue)
                },
                markers: {
                    size: 0, // Remove the dots (markers)
                }
            };

            // Initialize ApexCharts with the provided options for monthly sales area chart
            var monthlySales = new ApexCharts(document.querySelector("#monthlysales"), monthlyOptions);
            monthlySales.render();

            // Prepare data for the yearly sales donut chart
            let yearlyCategories = Object.keys(yearlySalesData);
            let yearlySales = yearlyCategories.map(function(year) {
                return Math.round(yearlySalesData[year]);
            });

            // Create the ApexCharts options for the yearly sales donut chart
            var yearlyOptions = {
                chart: {
                    type: 'bar', // Change the chart type to 'bar' for a bar chart
                    height: 250
                },
                series: [{
                    name: 'Yearly Sales',
                    data: yearlySales // Yearly sales data for each year
                }],
                xaxis: {
                    categories: yearlyCategories, // Categories (Years)
                    title: {
                        text: 'Year' // Title for the x-axis
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(value); // Format the y-axis as currency
                        }
                    }
                },
                title: {
                    text: 'Yearly Sales', // Title for the chart
                    align: 'left'
                },
                tooltip: {
                    x: {
                        formatter: function(value) {
                            return value; // Display the year on the tooltip
                        }
                    },
                    y: {
                        formatter: function(value) {
                            return new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(value); // Format the tooltip as currency
                        }
                    }
                },
                dataLabels: {
                    enabled: true, // Enable data labels on the bars
                    formatter: function(value) {
                        return new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(value); // Format the data labels as currency
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false, // Set bars to be vertical
                        columnWidth: '60%' // Adjust the width of the bars
                    }
                }
            };

            // Initialize ApexCharts with the provided options for yearly sales donut chart
            var yearlySalesChart = new ApexCharts(document.querySelector("#yearlysales"), yearlyOptions);
            yearlySalesChart.render();

    
            // **Top 10 High Sale Products** (updated to vertical bar chart)
            let topHighSaleProducts = Object.keys(productSalesData)
            .map(function(productName) {
            return { name: productName, sales: productSalesData[productName] };
            })
            .sort(function(a, b) {
            return b.sales - a.sales; // Sort in descending order by sales (high to low)
            })
            .slice(0, 5); // Get the top 5 high sale products

            let topHighSaleProductNames = topHighSaleProducts.map(function(product) { return product.name; });
            let topHighSaleProductSales = topHighSaleProducts.map(function(product) { return product.sales; });

            // Create the ApexCharts options for the Top 5 High Sale Products Vertical Bar Chart
            var highSaleProductsOptions = {
            chart: {
            type: 'bar', // Change to bar for vertical bar chart
            height: 250
            },
            series: [{
            name: 'Sales',
            data: topHighSaleProductSales
            }],
            xaxis: {
            categories: topHighSaleProductNames, // Set categories as product names
            labels: {
                show: false // Hide x-axis labels
            }
            },
            yaxis: {
            title: {
                text: 'Sales (PHP)'
            },
            labels: {
                show: false // Hide y-axis labels
            }
            },
            title: {
            text: 'Top 5 High Sale Products',
            align: 'left'
            },
            tooltip: {
            y: {
                formatter: function(value) {
                return new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(value);
                }
            }
            },
            dataLabels: {
            enabled: true, // Enable data labels on bars
            style: {
                fontSize: '12px',
                fontWeight: 'bold',
                colors: ['#fff']
            },
            dropShadow: {
                enabled: true,
                top: 1,
                left: 1,
                blur: 1,
                opacity: 0.6
            }
            },
            legend: {
            position: 'bottom',
            floating: false,
            fontSize: '8px',
            labels: {
                useSeriesColors: true
            },
            itemMargin: {
                horizontal: 5,
                vertical: 2
            }
            }
            };

            // Initialize ApexCharts for Top 5 High Sale Products Vertical Bar Chart
            var highSaleProductsChart = new ApexCharts(document.querySelector("#top10HighSaleProducts"), highSaleProductsOptions);
            highSaleProductsChart.render();

            // **Top 5 Low Sale Products** (updated to vertical bar chart)
            let topLowSaleProducts = Object.keys(productSalesData)
            .map(function(productName) {
            return { name: productName, sales: productSalesData[productName] };
            })
            .sort(function(a, b) {
            return a.sales - b.sales; // Sort in ascending order by sales (low to high)
            })
            .slice(0, 5); // Get the top 5 low sale products

            let topLowSaleProductNames = topLowSaleProducts.map(function(product) { return product.name; });
            let topLowSaleProductSales = topLowSaleProducts.map(function(product) { return product.sales; });

            // Create the ApexCharts options for the Top 5 Low Sale Products Vertical Bar Chart
            var lowSaleProductsOptions = {
            chart: {
            type: 'bar', // Change to bar for vertical bar chart
            height: 250
            },
            series: [{
            name: 'Sales',
            data: topLowSaleProductSales
            }],
            xaxis: {
            categories: topLowSaleProductNames, // Set categories as product names
            labels: {
                show: false // Hide x-axis labels
            }
            },
            yaxis: {
            title: {
                text: 'Sales (PHP)'
            },
            labels: {
                show: false // Hide y-axis labels
            }
            },
            title: {
            text: 'Top 5 Low Sale Products',
            align: 'left'
            },
            tooltip: {
            y: {
                formatter: function(value) {
                return new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(value);
                }
            }
            },
            dataLabels: {
            enabled: true, // Enable data labels on bars
            style: {
                fontSize: '12px',
                fontWeight: 'bold',
                colors: ['#fff']
            },
            dropShadow: {
                enabled: true,
                top: 1,
                left: 1,
                blur: 1,
                opacity: 0.6
            }
            },
            legend: {
            position: 'bottom',
            floating: false,
            fontSize: '8px',
            labels: {
                useSeriesColors: true
            },
            itemMargin: {
                horizontal: 5,
                vertical: 2
            }
            }
            };

            // Initialize ApexCharts for Top 5 Low Sale Products Vertical Bar Chart
            var lowSaleProductsChart = new ApexCharts(document.querySelector("#top10LowSaleProducts"), lowSaleProductsOptions);
            lowSaleProductsChart.render();



        },
        error: function () {
            $('#loadingIndicator').hide();
            console.error('Failed to fetch data. Please try again.');
        }
    });
    
    
    
    
}



// Function to animate the sold and sale values randomly
function animateSoldAndSale() {
    // Start random number animation instantly for "sold"
    window.soldInterval = setInterval(function () {
        let randomSold = Math.floor(Math.random() * 1000); // Random number for "sold"
        $('#sold').text(randomSold);
    }, 50); // Update every 50ms (faster updates)

    // Start random number animation instantly for "sale"
    window.saleInterval = setInterval(function () {
        let randomSale = Math.floor(Math.random() * 10000); // Random number for "sale"
        $('#sale').text(new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(randomSale));
    }, 75); // Update every 75ms (faster updates)
}

// Function to stop the random number animation once data is loaded
function stopSoldAndSaleAnimation() {
    clearInterval(window.soldInterval); // Stop "sold" animation
    clearInterval(window.saleInterval); // Stop "sale" animation
}

// Store the chart globally so we can destroy it before re-rendering
var forecastChart = null;

function loadDataDashboardForecast(url2) {
    // Fetch data using AJAX
    $.ajax({
        url: url2,
        dataType: 'json', // Expecting a JSON response
        success: function (data) {
            console.log("Data fetched successfully:", data); // Log the full response for debugging

            // Extract labels and values from the response data
            var labels = data.map(function (item) {
                return item.Date; // Extracting "Date" for the x-axis
            });

            var values = data.map(function (item) {
                return parseFloat(item.Quantity); // Extracting "Quantity" for the y-axis and converting to float
            });

            // If a chart already exists, destroy it before creating a new one
            if (forecastChart) {
                forecastChart.destroy(); // Destroy the existing chart
            }

            // Define the chart options with data labels enabled
            var options = {
                chart: {
                    type: 'line',
                    height: 250
                },
                series: [{
                    name: 'Forecast Quantity',
                    data: values // Use the fetched data for the line series
                }],
                xaxis: {
                    categories: labels // Use the labels for the x-axis
                },
                title: {
                    text: 'Forecasted Sales',
                    align: 'left'
                },
                dataLabels: {
                    enabled: true, // Enable data labels
                    style: {
                        colors: ['#000'], // Optional: set the color of the data labels
                        fontSize: '12px', // Optional: adjust the font size of the data labels
                    },
                    formatter: function (val) {
                        return val.toFixed(2); // Optional: format the data labels to 2 decimal places
                    }
                }
            };

            // Initialize and render the new chart
            forecastChart = new ApexCharts(document.querySelector("#forecastQuantity"), options);
            forecastChart.render();

        },
        error: function () {
            $('#loadingIndicator5').hide();
            console.error('Failed to fetch data. Please try again.');
        }
    });
}

$(document).ready(function () {
    // Event listener for category selection change
    $('#categorySelectDashboard').on('change', function() {
        var category = $(this).val(); // Get the selected category
        var url = '../server/sales_dashboard_categories.php?type=' + category; // Build URL based on selection
        var url2 = '../server/sales_dashboard_forecast.php?type=' + category; // Build URL for forecast
        
        // Load data for the selected category
        loadDataDashboard(url);
        loadDataDashboardForecast(url2);
    });

    // Initial load with default selection (first category)
    var defaultCategory = $('#categorySelectDashboard').val();
    var initialUrl = '../server/sales_dashboard_categories.php?type=' + defaultCategory;
    loadDataDashboard(initialUrl);

    // Initial load with default selection (first category)
    var initialUrl2 = '../server/sales_dashboard_forecast.php?type=' + defaultCategory;
    loadDataDashboardForecast(initialUrl2);
});
