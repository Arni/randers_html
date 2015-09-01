<?php

$username = 'DDB\DK-773000';

$password = 'KPI_Index010914!';

$url = 'https://ws.webtrends.com/v3/Reporting/profiles/77611/reports/34awBVEP0P6/?start_period=current_day-7&end_period=current_day-1&language=en-US&format=html&suppress_error_codes=true';



$context = stream_context_create(array(

'http' => array(

'header' => "Authorization: Basic " . base64_encode("$username:$password")

)

));

$data = file_get_contents($url, false, $context);

echo $data;
?>
