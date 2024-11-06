function loadDataDashboard(url) {
    // Show loading indicator and hide chart before making the request
    $('#chartWrapper,#chartWrapper2, #chartWrapper3, #chartWrapper4').hide(); // Hide the chart wrapper initially
    $('#loadingIndicator, #loadingIndicator2, #loadingIndicator3, #loadingIndicator4').show(); // Show the loading indicator

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
            $('#chartWrapper,#chartWrapper2, #chartWrapper3, #chartWrapper4').show();
            $('#loadingIndicator, #loadingIndicator2, #loadingIndicator3, #loadingIndicator4').hide();
    
            // Update the total sales and transactions in the respective elements
            $('#sold').fadeOut(300, function() {
                $(this).text(totalTransactions).fadeIn(300);
            });
            $('#sale').fadeOut(300, function() {
                $(this).text(new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(totalSales)).fadeIn(300);
            });
    
            // Create the ApexCharts options for the monthly sales bar chart
            var monthlyOptions = {
                chart: {
                    type: 'area', // You can change to 'bar' if you prefer a bar chart
                    height: 350
                },
                series: [{
                    name: 'Sales',
                    data: salesData
                }],
                xaxis: {
                    categories: categories, // Set the months as categories
                    title: {
                        text: 'Month and Year'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Sales ($)'
                    },
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
                    enabled: false // Disable labels inside the bars
                }
            };
    
            // Prepare data for the yearly sales donut chart
            let yearlyCategories = Object.keys(yearlySalesData);
            let yearlySales = yearlyCategories.map(function(year) {
                return Math.round(yearlySalesData[year]);
            });
    
            // Create the ApexCharts options for the yearly sales donut chart
            var yearlyOptions = {
                chart: {
                    type: 'donut', // Donut chart type
                    height: 350
                },
                series: yearlySales, // Sales data for each year
                labels: yearlyCategories, // Categories (Years)
                title: {
                    text: 'Yearly Sales',
                    align: 'left'
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return Math.round(value); // Round the tooltip values to whole numbers
                        }
                    }
                },
                dataLabels: {
                    enabled: false, // Disable labels inside the donut chart
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '60%' // Adjust donut size
                        }
                    }
                }
            };
    
            // Initialize ApexCharts with the provided options for monthly sales bar chart
            var monthlySales = new ApexCharts(document.querySelector("#monthlysales"), monthlyOptions);
            monthlySales.render();
    
            // Initialize ApexCharts with the provided options for yearly sales donut chart
            var yearlySalesChart = new ApexCharts(document.querySelector("#yearlysales"), yearlyOptions);
            yearlySalesChart.render();
    
            // **Top 10 High Sale Products** (already implemented)
            let topHighSaleProducts = Object.keys(productSalesData)
                .map(function(productName) {
                    return { name: productName, sales: productSalesData[productName] };
                })
                .sort(function(a, b) {
                    return b.sales - a.sales; // Sort in descending order by sales (high to low)
                })
                .slice(0, 10); // Get the top 10 high sale products
    
            let topHighSaleProductNames = topHighSaleProducts.map(function(product) { return product.name; });
            let topHighSaleProductSales = topHighSaleProducts.map(function(product) { return product.sales; });
    
            // Create the ApexCharts options for the Top 10 High Sale Products Donut Chart
            var highSaleProductsOptions = {
                chart: {
                    type: 'donut', // Donut chart type
                    height: 350
                },
                series: topHighSaleProductSales, // Sales data for the top 10 high sale products
                labels: topHighSaleProductNames, // Product names as labels
                title: {
                    text: 'Top 10 High Sale Products',
                    align: 'left'
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(value); // Show sales in currency format
                        }
                    }
                },
                dataLabels: {
                    enabled: false, // Disable labels inside the donut chart
                },
                legend: {
                    position: 'bottom', // Position the labels (product names) at the bottom
                    floating: false, // Keep the legend in a normal flow
                    fontSize: '8px',
                    labels: {
                        useSeriesColors: true // Use the series colors for the labels
                    },
                    itemMargin: {
                        horizontal: 0, // Add some horizontal spacing between legend items
                        vertical: 0 // Add vertical spacing between legend items
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '60%' // Adjust donut size
                        }
                    }
                }
            };
    
            // Initialize ApexCharts with the options for the Top 10 High Sale Products Donut Chart
            var highSaleProductsChart = new ApexCharts(document.querySelector("#top10HighSaleProducts"), highSaleProductsOptions);
            highSaleProductsChart.render();
    
            // **Top 10 Low Sale Products**
            let topLowSaleProducts = Object.keys(productSalesData)
                .map(function(productName) {
                    return { name: productName, sales: productSalesData[productName] };
                })
                .sort(function(a, b) {
                    return a.sales - b.sales; // Sort in ascending order by sales (low to high)
                })
                .slice(0, 10); // Get the top 10 low sale products
    
            let topLowSaleProductNames = topLowSaleProducts.map(function(product) { return product.name; });
            let topLowSaleProductSales = topLowSaleProducts.map(function(product) { return product.sales; });
    
            // Create the ApexCharts options for the Top 10 Low Sale Products Donut Chart
            var lowSaleProductsOptions = {
                chart: {
                    type: 'donut', // Donut chart type
                    height: 350
                },
                series: topLowSaleProductSales, // Sales data for the top 10 low sale products
                labels: topLowSaleProductNames, // Product names as labels
                title: {
                    text: 'Top 10 Low Sale Products',
                    align: 'left'
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(value); // Show sales in currency format
                        }
                    }
                },
                dataLabels: {
                    enabled: false, // Disable labels inside the donut chart
                },
                legend: {
                    position: 'bottom', // Position the labels (product names) at the bottom
                    floating: false, // Keep the legend in a normal flow
                    fontSize: '8px',
                    labels: {
                        useSeriesColors: true // Use the series colors for the labels
                    },
                    itemMargin: {
                        horizontal: 0, // Add some horizontal spacing between legend items
                        vertical: 0// Add vertical spacing between legend items
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '60%' // Adjust donut size
                        }
                    }
                }
            };
    
            // Initialize ApexCharts with the options for the Top 10 Low Sale Products Donut Chart
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

$(document).ready(function () {
    // Event listener for category selection change
    $('#categorySelectDashboard').on('change', function() {
        var category = $(this).val(); // Get the selected category
        var url = '../server/sales_dashboard_categories.php?type=' + category; // Build URL based on selection
        
        // Load data for the selected category
        loadDataDashboard(url);
    });

    // Initial load with default selection (first category)
    var defaultCategory = $('#categorySelectDashboard').val();
    var initialUrl = '../server/sales_dashboard_categories.php?type=' + defaultCategory;
    loadDataDashboard(initialUrl);
});
