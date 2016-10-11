<?php
function mini_calendar($month,$year){
  if($month == NULL){$month = date("n");}
  if($year == NULL){$year = date("Y");}
  echo '
  <table>
    <th>M</th>
    <th>T</th>
    <th>W</th>
    <th>T</th>
    <th>F</th>
    <th>S</th>
    <th>S</th>
    <tr>
  ';
  $weekstart = date('N',mktime(0,0,0,$month,1,$year));
  $create_month = date('t',mktime(0,0,0,$month,1,$year));
  if($weekstart > 1){
    //populate gaps with days from previous month
    $prev_month_modif = $weekstart - 1;
    $prev_month_day = date('j',mktime(0,0,0,$month,(1-$prev_month_modif),$year));
    $prev_month_maxdays = date('t',mktime(0,0,0,$month,(1-$prev_month_modif),$year));
    for($x = $prev_month_day; $x <= $prev_month_maxdays; $x++) {
      echo '<td style="background-color: #999999;">'.$x.'</td>';
    }
  }
  //build this month
  for($x = 1; $x <= $create_month; $x++) {
    echo '<td>'.$x.'</td>';
    if($weekstart == 7) {
      $weekstart = 1;
      echo '</tr>';
    } else {
      $weekstart++;
    }
  }
  if($weekstart < 7){
    //populate gaps with days from next month
    for($x = 1; $weekstart <= 7; $x++) {
      echo '<td style="background-color: #999999;">'.$x.'</td>';
      $weekstart++;
    }
    echo '</tr>';
  } else {
    //last row ended perfectly on sunday
    echo '</tr>';
  }
  echo '</table>';
}


function calendar($month,$year){
  if($month == NULL){$month = date("n");}
  if($year == NULL){$year = date("Y");}
  echo '
  <table>
    <th>Monday</th>
    <th>Tuesday</th>
    <th>Wednesday</th>
    <th>Thursday</th>
    <th>Friday</th>
    <th>Saturday</th>
    <th>Sunday</th>
    <tr>
  ';
  $weekstart = date('N',mktime(0,0,0,$month,1,$year));
  $create_month = date('t',mktime(0,0,0,$month,1,$year));
  if($weekstart > 1){
    //populate gaps with days from previous month
    $prev_month_modif = $weekstart - 1;
    $prev_month_day = date('j',mktime(0,0,0,$month,(1-$prev_month_modif),$year));
    $prev_month_maxdays = date('t',mktime(0,0,0,$month,(1-$prev_month_modif),$year));
    for($x = $prev_month_day; $x <= $prev_month_maxdays; $x++) {
      echo '<td style="background-color: #999999;">'.$x.'</td>';
    }
  }
  //build this month
  for($x = 1; $x <= $create_month; $x++) {
    echo '<td>'.$x.'</td>';
    if($weekstart == 7) {
      $weekstart = 1;
      echo '</tr>';
    } else {
      $weekstart++;
    }
  }
  if($weekstart < 7){
    //populate gaps with days from next month
    for($x = 1; $weekstart <= 7; $x++) {
      echo '<td style="background-color: #999999;">'.$x.'</td>';
      $weekstart++;
    }
    echo '</tr>';
  } else {
    //last row ended perfectly on sunday
    echo '</tr>';
  }
  echo '</table>';
}

function week_calendar($date,$month,$year){
  if($date == NULL){$date = date("j");}
  if($month == NULL){$month = date('n');}
  if($year == NULL){$year = date('Y');}

$week_number = date('W', strtotime($date-$month-$year));

echo '
  <table>
  	 <th></th>
  ';
  
for($x = 1; $x <= 7; $x++) {
    $week = strtotime($year.'W'.$week_number.$x);
    echo '<th>';
    echo date("M d/y", $week);
    echo '</th>';
} 
for($x = 00; $x <= 23; $x++) {
	 $time  = sprintf('%02d', $x);
	 echo '<tr>';
    echo '<td>',$time,':00</td>';
    echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
    echo '</tr>';
    echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
}

echo '</table>';

}

function day_calendar($date,$month,$year){
  if($date == NULL){$date = date("j");}
  if($month == NULL){$month = date("n");}
  if($year == NULL){$year = date("Y");}

$day = date('l');
$the_month = date('M', strtotime($date-$month-$year));

echo '
  <table>
  	 <th></th>
  ';

echo '<th>',$day,', ',$date,' ',$the_month,' ',$year,'</th>';

for($x = 00; $x <= 23; $x++) {
	 $time  = sprintf('%02d', $x);
	 echo '<tr>';
    echo '<td>',$time,':00</td>';
    echo '<td></td>';
    echo '</tr><tr><td></td><td></td></tr>';
    
  }

echo '</table>';
}


mini_calendar();
calendar();
week_calendar();
day_calendar();

?>