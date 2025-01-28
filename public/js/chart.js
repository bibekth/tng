document.addEventListener('DOMContentLoaded', function () {
    const toggler = document.getElementById('themeToggle');
    const currentState = localStorage.getItem('theme') || 'light';
    var chartBCG = 'rgba(0, 0, 0, 0.4)';
    if (currentState === 'dark') {
        chartBCG = 'rgba(255, 255, 255, 0.4)';
    }

    const ctx = document.getElementById('chart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: "events per month",
                data: chartData,
                borderColor: 'rgba(123, 170, 247, 1)',
                borderWidth: 1,
                backgroundColor: chartBCG,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                title:{
                    display: true,
                    text: 'EVENTS PER MONTH',
                }
            }
        }
    });

    toggler.addEventListener('change', function () {
        const isDarkMode = toggler.checked;
        if (isDarkMode) {
            chartBCG = 'rgba(255, 255, 255, 0.4)';
        } else {
            chartBCG = 'rgba(0, 0, 0, 0.4)';
        }
        myChart.data.datasets[0].backgroundColor = chartBCG;
        myChart.update();
    });
});
