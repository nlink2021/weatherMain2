<?php

$cache_file = 'data.json';
$api_url = 'http://api.weatherunlocked.com/api/current/51.50,-0.12?app_id=dfc6d55f&app_key=9b6238a47f10fee8bc8bc7bf41fa9771';
$data = file_get_contents($api_url);
file_put_contents($cache_file, $data);
$data = json_decode($data);
$current = $data

?>

<?php

$cache_file_2 = 'data2.json';
$api_url2 = 'http://api.weatherunlocked.com/api/forecast/51.50,-0.12?app_id=dfc6d55f&app_key=9b6238a47f10fee8bc8bc7bf41fa9771';
$data2 = file_get_contents($api_url2);
file_put_contents($cache_file_2, $data2);
$data2 = json_decode($data2);
$forecast = $data2

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="900"> 
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>San Antonio Weather</title>
</head>

<body>
    <div class="mainContainer">
        <h1>Hello, San Antonio!</h1>
        <p class="desc"><?php echo $current->wx_desc;?></p>
        <p><strong>Wind Speed: </strong><?php echo $current->windspd_mph;?><span>mph</span><span> &nbsp; | &nbsp; </span><strong>Wind Direction: </strong><?php echo $current->winddir_compass;?></p>
        <div class="boxes">
            <div class="subContainer">
                <h3>Today</h3>
                <div class="box">
                    <p class="mainTemp"><?php echo $current->temp_f;?><span>&#176;</span></p>
                </div>
                
                <p><strong>Precipitation %: </strong><?php echo $forecast->Days[0]->prob_precip_pct;?><span>%</span></p>
                <p><strong>Sunset Time: </strong><?php echo $forecast->Days[0]->sunset_time;?></p>
            </div>
            <div class="subContainer">
                <h3>Tomorrow</h3>
                <div class="box">
                    <p class="nextTemp"><?php echo $forecast->Days[1]->temp_min_f;?><span>&#176;</span>- <?php echo $forecast->Days[1]->temp_max_f;?><span>&#176;</span></p>
                </div>
                
                <p><strong>Precipitation %: </strong><?php echo $forecast->Days[1]->prob_precip_pct;?><span>%</span></p>
                <p><strong>Sunset Time: </strong><?php echo $forecast->Days[1]->sunset_time;?></p>
            </div>
            <div class="subContainer">
                <h3>The Next Day</h3>
                <div class="box">
                    <p class="nextTemp"><?php echo $forecast->Days[2]->temp_min_f;?><span>&#176;</span>- <?php echo $forecast->Days[2]->temp_max_f;?><span>&#176;</span></p>
                </div>

                <p><strong>Precipitation %: </strong><?php echo $forecast->Days[2]->prob_precip_pct;?><span>%</span></p>
                <p><strong>Sunset Time: </strong><?php echo $forecast->Days[2]->sunset_time;?></p>
            </div> 
        </div>

        <p>Last updated: <span id="datetime"></span></p>

        <script>
        var dt = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
</script>

    </div>
</body>

</html>