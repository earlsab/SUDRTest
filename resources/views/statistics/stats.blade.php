


<div class="statisticsCont">

    <div class="">

        <li class="paperinfoHeader">
            Comparison of number of papers
        </li>

        <li class="pdfpaperInfo">
            <form>
                <div class="inputdataCont">
                    <div>
                        &nbsp Compare: &nbsp
                        <select class="inputDesign">
                               <option>marurary</option>
                        </select>
                        <input class="inputDesign" type="text" placeholder="year" name="ContentAdviser">
                    </div>
                        
                    <div>
                        &nbsp with &nbsp
                        <select class="inputDesign">
                            <option>marurary</option>
                        </select>
                        <input type="text" class="inputDesign" placeholder="year" name="ContentAdviser">
                    </div>
                        
                    &nbsp &nbsp <button class="redBtn" type="submit">Compare</button>
                </div>

            </form>
        </li>
    </div>

    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var monthly = @json($result_monthly);
        var yearly = @json($result_yearly);

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Month', 'Year'],
                datasets: [{
                    label: 'Number of Papers Uploaded',
                    data: [monthly,yearly],
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
</div>