


<div class="statisticsCont">

    <div class="">

        <li class="paperinfoHeader">
            Comparison of number of papers among Collegs
        </li>

        <li class="pdfpaperInfo">

            <b>Compare:</b>

            <br>

            <form>
                <div class="inputdataCont">
                    <div>
                        &nbsp Range 1: &nbsp
                        <select class="inputDesign" name="Range1monthA">
                               <option>marurary</option>
                        </select>
                        <input class="inputDesign" type="text" placeholder="year" name="Range1yearA">
                    </div>
                        
                    <div>
                        &nbsp to &nbsp
                        <select class="inputDesign" name="Range2monthB">
                            <option>marurary</option>
                        </select>
                        <input type="text" class="inputDesign" placeholder="year" name="Range1yearB">
                    </div>
                </div>

                <br>
                <b>with:</b>
                <br>

                <div class="inputdataCont">
                    <div>
                        &nbsp Range 2: &nbsp
                        <select class="inputDesign" name="Range2monthA">
                               <option>marurary</option>
                        </select>
                        <input class="inputDesign" type="text" placeholder="year" name="Range2A">
                    </div>
                        
                    <div>
                        &nbsp to &nbsp
                        <select class="inputDesign" name="Range2monthA">
                            <option>marurary</option>
                        </select>
                        <input type="text" class="inputDesign" placeholder="year" name="Range2B">
                    </div>
                </div>
                <br>
                <button class="redBtn" type="submit">Compare</button>
            </form>
        </li>
    </div>

    <div>
        <canvas id="myChart"></canvas>
    </div>

    <div class="">

        <li class="paperinfoHeader">
            Top 5 used keywords
        </li>

        <li class="pdfpaperInfo">
            <form>
                <div class="inputdataCont">
                    <div>
                        Input Keyword:
                        <input class="inputDesign" type="text" placeholder="Search Keyword" name="Range1yearA">
                    </div>
                        
                    <div>
                        &nbsp from &nbsp
                        <select class="inputDesign" name="Range2monthB">
                            <option>marurary</option>
                        </select>
                        <input type="text" class="inputDesign" placeholder="year" name="Range1yearB">
                    </div>
                    &nbsp&nbsp&nbsp<button class="redBtn" type="submit">Search</button>
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
                labels: ['Month', 'Year', 'asdasda'],
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