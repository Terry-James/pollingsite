
<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'pollvoting';

$pollNumber = $_POST['search'];

$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

$retrieve = ("SELECT * FROM polls, pollsanswered WHERE polls.pollNum = $pollNumber and pollsanswered.pollNum = $pollNumber");
$myQuery = mysqli_query($db, $retrieve);

if (mysqli_num_rows($myQuery) > 0){
    echo "<div style = 'top: 200pt; margin:0 auto; background-color: lightgreen'>\n";
    echo "<table border = '1' style='border-color: white'>";
    echo "<tr><th style ='padding: 25px; text-align: left'> Poll Question </th>   
        <th style ='padding: 15px; text-align: center'> Answer1 </th>
        <th style ='padding: 15px; text-align: center'> Answer2 </th>
        <th style ='padding: 15px; text-align: center'> Answer3 </th>
        <th style ='padding: 15px; text-align: center'> Answer4 </th>
        <th style ='padding: 15px; text-align: center'> Answer5 </th>
        <th style ='padding: 15px; text-align: center'> Answer6 </th></tr>\n";
    while($rows = mysqli_fetch_assoc($myQuery)){
        echo '<tr><td style ="padding: 15px; text-align: left">'.$rows['pollQuestion'].'</td>';
        echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer1'].'<br>'.$rows['ans1chs'].'</td>';
        echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer2'].'<br>'.$rows['ans2chs'].'</td>';
        echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer3'].'<br>'.$rows['ans3chs'].'</td>';
        echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer4'].'<br>'.$rows['ans4chs'].'</td>';
        echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer5'].'<br>'.$rows['ans5chs'].'</td>';
        echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer6'].'<br>'.$rows['ans6chs'].'</td></tr>';
    }
    echo "</table>\n";
    echo "</div>";
}
?>