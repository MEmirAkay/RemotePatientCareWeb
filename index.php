<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="style.css" rel="stylesheet">
</head>
<script>
    var labelData = [];
    var serumData = [];
    var lightData = [];
    var temperatureData = [];
    var data;

    function updateData(resp){
        data = resp;
        for (let x in data) {
                labelData[x] = x;
                serumData[x] = data[x].serum;
                lightData[x] = data[x].light;
                temperatureData[x] = data[x].temperature;
            }
            
           
    }
    function fetchData() {
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            
            var resp = JSON.parse(this.responseText);
            updateData(resp);
        };
        xmlhttp.open("POST", "http://mustafaemirakay.com/pages/projects/webtek/api/fetchData.php?q=data",true);
        xmlhttp.send();
        
        

    }

    function command(command) {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("POST", "http://mustafaemirakay.com/pages/projects/webtek/api/sendCommand.php?command=" + command);
        xmlhttp.send();
    }
</script>

<body onload="fetchData()">
    <div class="">

        
        <div class="row">
            <iframe class="videoframe" src="http://localhost:8030/"></iframe>
        </div>
        <div class="row">
            <div class="col col-md-3 box align-self-stretch ">
                <div class="row display-6">Serum Chart</div>
                <canvas id="serumChart" width="200" height="200"></canvas>
            </div>
            <div class="col col-md-3 box align-self-stretch">
                <div class="row display-6">Light Chart</div>
                <canvas id="lightChart" width="200" height="200"></canvas>
            </div>
            <div class="col col-md-3 box align-self-stretch">
                <div class="row display-6">Temperature Chart</div>
                <canvas id="temperatureChart" width="200" height="200"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-3 box align-self-stretch ">
                <div class="row display-6">Serum Mangement</div>
                <div class="row mx-auto">
                    <div class="col col-md-6 mx-auto">
                        <button class="row col-md-12 fill-button mx-auto mt-3">Fill %100</button>
                        <button class="row col-md-12 fill-button mx-auto mt-3">Fill %50</button>
                        <button class="row col-md-12 fill-button mx-auto mt-3">Fill %25</button>
                    </div>
                    <div class="col col-md-6 mx-auto">
                        <button class="row col-md-12 drain-button mx-auto mt-3">Drain %100</button>
                        <button class="row col-md-12 drain-button mx-auto mt-3">Drain %50</button>
                        <button class="row col-md-12 drain-button mx-auto mt-3">Drain %25</button>
                    </div>
                </div>
            </div>
            <div class="col col-md-3 box align-self-stretch">
                <div class="row display-6 mx-auto">Light Management</div>
                <div class="row mx-auto">
                    <div class="col col-md-6 lightStatus display-3 mx-auto">
                        Off
                    </div>
                    <div class="col col-md-6 lightButtonContainer mx-auto">
                        <button onclick="command('LightHigh')" class="row col-md-12 btn-success lightButton mx-auto mt-3">
                            High
                        </button>
                        <button onclick="command('LightMed')" class="row col-md-12 btn-warning lightButton mx-auto mt-3">
                            Medium
                        </button>
                        <button onclick="command('LightLow')" class="row col-md-12 btn-primary lightButton mx-auto mt-3">
                            Low
                        </button>
                        <button onclick="command('LightOff')" class="row col-md-12 btn-danger lightButton mx-auto mt-3">
                            Off
                        </button>
                    </div>
                </div>
            </div>

            <div class="col col-md-3 box align-self-stretch">
                <div class="row display-6">Temperature Management</div>
                <div class="row pb-3">
                <div class="col col-md-6 lightButtonContainer mx-auto">
                    <h1 class="display-5" style="text-align: center;">Heater</h1>
                        <button class="row col-md-12 btn-success lightButton mx-auto mt-3">
                            On
                        </button>
                        <button class="row col-md-12 btn-danger lightButton mx-auto mt-3">
                            Off
                        </button>
                    </div>
                    <div class="col col-md-6 lightButtonContainer mx-auto">
                    <h1 class="display-5" style="text-align: center;">Fan</h1>
                        <button class="row col-md-12 btn-success lightButton mx-auto mt-3">
                            High
                        </button>
                        <button class="row col-md-12 btn-warning lightButton mx-auto mt-3">
                            Medium
                        </button>
                        <button class="row col-md-12 btn-primary lightButton mx-auto mt-3">
                            Low
                        </button>
                        <button class="row col-md-12 btn-danger lightButton mx-auto mt-3">
                            Off
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 box">
                <textarea class="col-md-12 text-area" name="" id="" cols="30" rows="10"></textarea>
                <button class=" col-md-12 btn btn-success voice-command">Submit</button>
            </div>
        </div>
    </div>
</body>
<script>
    // SERUM CHART
    const sChart = document.getElementById('serumChart');
    const serumChart = new Chart(sChart, {
        type: 'line',
        data: {
            labels: [1, 2, 3, 4, 5],
            datasets: [{
                label: 'Serum Level',
                data: serumData,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)'
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

    // LIGHT CHART

    const lChart = document.getElementById('lightChart');
    const lightChart = new Chart(lChart, {
        type: 'line',
        data: {
            labels: [1, 2, 3, 4, 5],
            datasets: [{
                label: 'Light Level',
                data: lightData,
                backgroundColor: [
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
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

    // TEMPERATURE CHART

    const tChart = document.getElementById('temperatureChart');
    const temperatureChart = new Chart(tChart, {
        type: 'line',
        data: {
            labels: [1, 2, 3, 4, 5],
            datasets: [{
                label: 'Temperature Level',
                data: temperatureData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 2
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>