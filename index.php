<?php

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




calendar();

?>
