<?php

$username = 'DDB\DK-773000';

$password = 'KPI_Index010914!';

$url = 'https://ws.webtrends.com/v3/Reporting/profiles/77611/reports/34awBVEP0P6/?start_period=current_day-7&end_period=current_day-1&language=en-US&format=html&suppress_error_codes=true';



$context = stream_context_create(array(
  'http' => array(
    'header' => "Authorization: Basic " . base64_encode("$username:$password"),
    'proxy' => 'tcp://172.18.0.40:8080',
    'request_fulluri' => true
  )
  ));

$data = file_get_contents($url, false, $context);

$doc = new DOMDocument();
$doc->loadHTML($data);
//echo $doc->saveHTML();

$trs = $doc->getElementsByTagName('tr');
foreach ($trs as $tr) {
  $nodes_to_remove = array();

  $tds = $tr->getElementsByTagName('td');
  $i = 0;

  foreach ($tds as $td) {
    if ($i < 1 || $i > 3) {
      $nodes_to_remove[] = $td;
    }
    $i++;
  }

  $ths = $tr->getElementsByTagName('th');
  $i = 0;

  foreach ($ths as $th) {
    if ($i < 1 || $i > 3) {
      $nodes_to_remove[] = $th;
    }
    $i++;
  }
  foreach ($nodes_to_remove as $node) {
    $tr->removeChild($node);
  }
}
//<style type="text/css">
$style = '
table {
	font-family: verdana,arial,sans-serif;
	font-size:14px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
';

$body_list = $doc->getElementsByTagName('body');
$style_element = $doc->createElement('style', $style);
$style_element->setAttribute('type', "text/css");
$body = $body_list->item(0);
  $body->appendChild($style_element);


echo $doc->saveHTML();
//echo $data;
?>
