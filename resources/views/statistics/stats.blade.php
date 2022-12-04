


<div class="statisticsCont">

    <div class="">

        <li class="paperinfoHeader">
            Comparison of number of papers among Colleges
        </li>

        <li class="pdfpaperInfo">

            <b>Compare:</b>

            <br>

            <form class="dateRange" method="get" action="{{route('compareRange')}}">
                <div class="inputdataCont">
                    <div>
                        &nbsp Range 1: &nbsp
                        <select class="inputDesign" name="Range1monthA">
                            <option selected disabled>Select Month</option>
                            <?php
                                for ($i = 0; $i < 12; $i++) {
                                    $time = strtotime(sprintf('%d months', $i));   
                                    $label = date('F', $time);   
                                    $value = date('n', $time);
                                    echo "<option value='$value'>$label</option>";
                                }
                            ?>
                        </select>
                        <input class="inputDesign" type="text" placeholder="year" name="Range1yearA">
                    </div>
                        
                    <div>
                        &nbsp to &nbsp
                        <select class="inputDesign" name="Range1monthB">
                            <option selected disabled>Select Month</option>
                            <?php
                                for ($i = 0; $i < 12; $i++) {
                                    $time = strtotime(sprintf('%d months', $i));   
                                    $label = date('F', $time);   
                                    $value = date('n', $time);
                                    echo "<option value='$value'>$label</option>";
                                }
                            ?>
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
                            <option selected disabled>Select Month</option>
                            <?php
                                for ($i = 0; $i < 12; $i++) {
                                    $time = strtotime(sprintf('%d months', $i));   
                                    $label = date('F', $time);   
                                    $value = date('n', $time);
                                    echo "<option value='$value'>$label</option>";
                                }
                            ?>
                        </select>
                        <input class="inputDesign" type="text" placeholder="year" name="Range2yearA">
                    </div>
                        
                    <div>
                        &nbsp to &nbsp
                        <select class="inputDesign" name="Range2monthB">
                            <option selected disabled>Select Month</option>
                            <?php
                                for ($i = 0; $i < 12; $i++) {
                                    $time = strtotime(sprintf('%d months', $i));   
                                    $label = date('F', $time);   
                                    $value = date('n', $time);
                                    echo "<option value='$value'>$label</option>";
                                }
                            ?>
                        </select>
                        <input type="text" class="inputDesign" placeholder="year" name="Range2yearB">
                    </div>
                </div>
                <br>
                <button class="redBtn" type="submit">Compare</button>
            </form>
        </li>
    </div>

    <div class="chartCont">
        <canvas id="myChart"></canvas>
    </div>

    <div class="">

        <li class="paperinfoHeader">
            Top 3 used keywords
        </li>

        <li class="pdfpaperInfo">
            <form method="get" action="{{route('Top3Keywords')}}">
                <div class="inputdataCont">
                    <div>
                        &nbsp From &nbsp
                        <select class="inputDesign" name="keyMonth">
                            <option selected disabled>Select Month</option>
                            <?php
                                for ($i = 0; $i < 12; $i++) {
                                    $time = strtotime(sprintf('%d months', $i));   
                                    $label = date('F', $time);   
                                    $value = date('n', $time);
                                    echo "<option value='$value'>$label</option>";
                                }
                            ?>
                        </select>
                        <input type="text" class="inputDesign" placeholder="year" name="keyYear">
                    </div>
                    &nbsp&nbsp&nbsp<button class="redBtn" type="submit">Search</button>

                </div>
            </form>
        </li>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var range1_data = @json($range1_chartdata);
        var range2_data = @json($range2_chartdata);

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['CAS','CBA','CCS','COE','CED','COL','CMC','CON','COPVA','DIV'
                        ,'GRAD','ICLS','IEMS','IRS','ISL','MED','SAITE','SBE','SPAG'],
                datasets: [{
                    label: 'Date Range 1',
                    data: range1_data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                },{
                    label: 'Date Range 2',
                    data: range2_data,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                },
                
                ]
            },
            options: {
                indexAxis: 'y',
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each horizontal bar to be 2px wide
                elements: {
                bar: {
                    borderWidth: 2,
                }
                },
                responsive: true,
                plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Chart.js Horizontal Bar Chart'
                }
                }
            }
        }); 
    </script>
</div>