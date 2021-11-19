<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart JS</title>
    <style>
    body {
        width: 550px;
        margin: 3rem auto;
    }

    #chart-container {
        width: 100%;
        height: auto;
    }
    </style>
</head>

<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
        <canvas id="graphCanvas2"></canvas>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
    $(document).ready(function() {
        showGraph();
    });

    function showGraph() {
        {
            $.post("alldata_in_dach.php", function(data) {
                console.log(data);
                let X1 = [];
                for (let i in data) {
                    X1.push({
                        x: data[i].x_c1,
                        y: data[i].y_c1
                    })
                }
                console.log('data => ', X1);
                let chartdata = {
                    datasets: [{
                        label: 'Score',
                        backgroundColor: '#49e2ff',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: X1,
                    }]
                };
                let graphTarget = $('#graphCanvas');
                let barGraph = new Chart(graphTarget, {
                    type: 'scatter',
                    data: chartdata
                })
                let asd = new Chart(graphCanvas2, {
                    type: 'scatter',
                    data: chartdata
                })
            })
        }
    }
    </script>
</body>

</html>