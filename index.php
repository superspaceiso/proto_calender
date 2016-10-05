<?php

$month = 12; //date('n');
$year = date('Y');

$leading_month = $month - 1;
$following_month = $month + 1;
$following_year = $year;
$leading_year = $year;

$mini_dayofweek = array('M','T','W','T','F','S','S');

$weekstart = date('N',mktime(0,0,0,$month,1,$year));
$create_month = date('t',mktime(0,0,0,$month,1,$year));

$month_before = date('t',mktime(0,0,0,$leading_month,1,$year));
$weekstart_before = date('N',mktime(0,0,0,$leading_month,1,$year));

$month_after = date('t',mktime(0,0,0,$following_month,1,$year));
$weekstart_after = date('N',mktime(0,0,0,$following_month,1,$year));

if($following_month == 13) {
  $following_year = $year + 1;
  $following_month = 1;
}
if($leading_month == 0) {
  $leading_year = $year - 1;
  $leading_month = 12;
}

foreach($mini_dayofweek as $day){
  //echo $day;
}

echo $leading_month,' ',$leading_year;

echo '<br><br>';

for($x = 1; $x <= $month_before; $x++) {
  echo $x,' ';

  if($weekstart_before == 7) {
    $weekstart_before = 1;
    echo '<br>';
  } else {
    $weekstart_before++;
  }
}


echo '<br><br>';

echo $month,' ',$year;

echo '<br><br>';

for($x = 1; $x <= $create_month; $x++) {
  echo $x,' ';

  if($weekstart == 7) {
    $weekstart = 1;
    echo '<br>';
  } else {
    $weekstart++;
  }
}

echo '<br><br>';

echo $following_month,' ',$following_year;

echo '<br><br>';

for($x = 1; $x <= $month_after; $x++) {
  echo $x,' ';

  if($weekstart_after == 7) {
    $weekstart_after = 1;
    echo '<br>';
  } else {
    $weekstart_after++;
  }
}



?>

