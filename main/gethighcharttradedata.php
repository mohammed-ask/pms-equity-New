<?php
include "session.php";
$exch = $_POST['exch'];
$type = $_POST['type'];
$scriptcode = $_POST['scriptcode'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$interval = $_POST['interval'];
$symbol = '';
if (isset($_POST['symbol'])) {
    $symbol = $_POST['symbol'];
}

$chartdata = $obj->getcandledata($scriptcode, $exch, $type, $interval, $startdate, $enddate);
$data = $chartdata['candles'];

$chart_data = array();

foreach ($data as $row) {
    $dateString = $row[0];
    $date = DateTime::createFromFormat('Y-m-d\TH:i:s', $dateString, new DateTimeZone('UTC'));
    $utcTimestamp = $date->getTimestamp() * 1000;
    $chart_data[] = array($utcTimestamp, $row[1], $row[2], $row[3], $row[4], $row[5]);
}
$title = $scriptcode === '999920000' ? 'Nifty Index' : $symbol;
echo "Highcharts.chart('container', {
        title: {
            text: '" . $title . "'
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                hour: '%H:%M',
                day: '%e. %b',
                week: '%e. %b',
                month: '%b \'%y',
                year: '%Y'
            }
        },
        yAxis: {
            title: {
                text: 'Price'
            }
        },
        series: [{
            name: 'Open',
            data: " . json_encode($chart_data) . ",
            type: 'line',
            tooltip: {
                valueDecimals: 2
            }
        }]
    });
      ";
