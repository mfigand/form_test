<?php

include ('db_connection.php');

getDataFromDB($connect);

function getDataFromDB($connect){

    $sqlget = "SELECT * FROM form_data";

    $sqldata = mysqli_query($connect, $sqlget) or die('error');

    echo '<div class="table-responsive">';
    echo '<table class="table" id="table_to_export">';
     echo   '<thead>';
     echo   '<tr>';
     echo       '<th>ID</th>';
     echo       '<th>NAME</th>';
     echo       '<th>LASTNAME</th>';
     echo       '<th>EMAIL</th>';
     echo       '<th>TEL</th>';
     echo       '<th>DAY_BIRTH</th>';
     echo       '<th>MONTH_BIRTH</th>';
     echo       '<th>YEAR_BIRTH</th>';
     echo       '<th>CP</th>';
     echo       '<th>INSTAGRAM</th>';
     echo   '</tr>';
     echo   '</thead>';
     while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
     echo   '<tbody>';
     echo       '<tr>';
     echo           '<td>' . $row['id'] . '</td>';
     echo           '<td>' . $row['name'] . '</td>';
     echo           '<td>' . $row['lastname'] . '</td>';
     echo           '<td>' . $row['email'] . '</td>';
     echo           '<td>' . $row['tel'] . '</td>';
     echo           '<td>' . $row['id'] . '</td>';
     echo           '<td>' . $row['id'] . '</td>';
     echo           '<td>' . $row['id'] . '</td>';
     echo           '<td>' . $row['cp'] . '</td>';
     echo           '<td>' . $row['instagram_user'] . '</td>';
     echo       '</tr>';
     echo   '</tbody>';
     }
    echo '</table>';
    echo '</div>';

}



?>