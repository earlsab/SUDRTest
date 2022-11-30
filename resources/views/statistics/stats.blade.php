<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var weekly = @json($result_weekly);
    var monthly = @json($result_monthly);
    var yearly = @json($result_yearly);

    var weeklyfiltered = (new StatsControllerCollegeFilter)->stats_weekly();

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Week', 'Month', 'Year'],
            datasets: [{
                label: 'Number of Papers Uploaded',
                data: [weeklyfiltered,monthly,yearly],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    }); 
</script>