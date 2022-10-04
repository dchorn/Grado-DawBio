<?php
function multiply(int $num1, int $num2):int {
    return $num1 * $num2;
}

function drawTable(int $tab) {
    echo "<table>";
    //first row
    echo "<tr>";
    echo "<th>",$tab,"</th>";
    echo "</tr>";
    //multiply rows
    for($row=0;$row<=10;$row++){
        echo "<tr>";
        echo "<td>", $row ,"</td>";
        echo "<td>", multiply($row,$tab),"</td>"; 
        echo "</tr>";
    }
        echo "</table>";
};
?>
