<?php
// Terry James CS396 Project2

// sets sessions so this page can not be viewed without a valid email
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.html"); // return to login if email is not set
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    
</head>
<body class="thisBody">
	<!--another nav bar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logOut.php">Log Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createPoll.php">Create a Poll</a>
                </li>
			</ul>
			<!--form for searching for polls created-->
            <form class="form-inline my-2 my-lg-0" action="searchPoll.php" method="POST">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search for a poll" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</nav>

<div class="container">
	<div class="row">
	<?php
	// variables
	$db_host = 'localhost';
	$db_username = 'root';
	$db_pass = '';
	$db_name = 'pollvoting';

	$pollNumber = $_POST['search'];

	// connect to the database
	$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

	// retrieve the information of the poll selected including number of times its choices where answered
	$retrieve = ("SELECT * FROM polls, pollsanswered WHERE polls.pollNum = $pollNumber and pollsanswered.pollNum = $pollNumber");
	$myQuery = mysqli_query($db, $retrieve);
	$rows = mysqli_fetch_assoc($myQuery);
	// displays results in a table
	if (mysqli_num_rows($myQuery) > 0){ // check if query is empty
		echo "<div style = 'top: 200pt; margin:0 auto; background-color: lightgreen'>\n";
		echo "<table border = '1' style='border-color: white'>";
		echo "<tr><th style ='padding: 25px; text-align: left'> Poll Question </th>   
			<th style ='padding: 15px; text-align: center'> Answer1 </th>
			<th style ='padding: 15px; text-align: center'> Answer2 </th>
			<th style ='padding: 15px; text-align: center'> Answer3 </th>
			<th style ='padding: 15px; text-align: center'> Answer4 </th>
			<th style ='padding: 15px; text-align: center'> Answer5 </th>
			<th style ='padding: 15px; text-align: center'> Answer6 </th></tr>\n";
		echo '<tr><td style ="padding: 15px; text-align: left">'.$rows['pollQuestion'].'</td>';
		echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer1'].'<br>'.$rows['ans1chs'].'</td>';
		echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer2'].'<br>'.$rows['ans2chs'].'</td>';
		echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer3'].'<br>'.$rows['ans3chs'].'</td>';
		echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer4'].'<br>'.$rows['ans4chs'].'</td>';
		echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer5'].'<br>'.$rows['ans5chs'].'</td>';
		echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer6'].'<br>'.$rows['ans6chs'].'</td></tr>';
		echo "</table>\n";
		echo "</div>";
	}
	?>
	</div>
	<div class="mx-auto" style="width: 450px">
	<div class="row mt-3">
		<div class="col">
			<!--creates a canvas to display the graph-->
		<canvas id="aCanvas" width="500" height="250" style="border:1px solid #d3d3d3;"></canvas>
		<script>
			// variables to hold the php variable information then convert to an integer
			var counter1 = "<?php echo $rows['ans1chs']?>";
			var number1 = parseInt(counter1, 10);

			var counter2 = "<?php echo $rows['ans2chs']?>";
			var number2 = parseInt(counter2, 10);

			var counter3 = "<?php echo $rows['ans3chs']?>";
			var number3 = parseInt(counter3, 10);

			var counter4 = "<?php echo $rows['ans4chs']?>";
			var number4 = parseInt(counter4, 10);

			var counter5 = "<?php echo $rows['ans5chs']?>";
			var number5 = parseInt(counter5, 10);

			var counter6 = "<?php echo $rows['ans6chs']?>";
			var number6 = parseInt(counter6, 10);

			var total = (number1 + number2 + number3 + number4 + number5 + number6);
			var percent1 = Math.round((number1/total)*100);
			var percent2 = Math.round((number2/total)*100);
			var percent3 = Math.round((number3/total)*100);
			var percent4 = Math.round((number4/total)*100);
			var percent5 = Math.round((number5/total)*100);
			var percent6 = Math.round((number6/total)*100);

			// retrieve the canvas and the context which is in 2d
			var c = document.getElementById("aCanvas");
			var ctx = c.getContext("2d");
			// create a header
			ctx.font = "20px Arial";
			ctx.fillText("Number of times each answer was chosen", 80, 20);
			// draw bottom line
			ctx.moveTo(0,200);
			ctx.lineTo(500,200);
			ctx.stroke();
			// Each is the title for each bar
			ctx.font = "10px Arial";
			ctx.fillText("Answer1", 55, 215);
			ctx.fillText("Answer2", 130, 215);
			ctx.fillText("Answer3", 205, 215);
			ctx.fillText("Answer4", 280, 215);
			ctx.fillText("Answer5", 355, 215);
			ctx.fillText("Answer6", 430, 215);

			ctx.fillText(percent1 +"%", 65, 230);
			ctx.fillText(percent2 +"%", 140, 230);
			ctx.fillText(percent3 +"%", 215, 230);
			ctx.fillText(percent4 +"%", 290, 230);
			ctx.fillText(percent5 +"%", 365, 230);
			ctx.fillText(percent5 +"%", 440, 230);

			// Each like this creates the bar for each answer
			ctx.beginPath();
			ctx.rect(50,200,50, -(percent1));
			ctx.fillStyle = "green";
			ctx.fill();
			ctx.lineWidth = 2;
			ctx.strokeStyle = 'black';
			ctx.stroke();

			ctx.beginPath();
			ctx.rect(125,200,50, -(percent2));
			ctx.fillStyle = "green";
			ctx.fill();
			ctx.lineWidth = 2;
			ctx.strokeStyle = 'black';
			ctx.stroke();

			ctx.beginPath();
			ctx.rect(200,200,50, -(percent3));
			ctx.fillStyle = "green";
			ctx.fill();
			ctx.lineWidth = 2;
			ctx.strokeStyle = 'black';
			ctx.stroke();

			ctx.beginPath();
			ctx.rect(275,200,50, -(percent4));
			ctx.fillStyle = "green";
			ctx.fill();
			ctx.lineWidth = 2;
			ctx.strokeStyle = 'black';
			ctx.stroke();

			ctx.beginPath();
			ctx.rect(350,200,50, -(percent5));
			ctx.fillStyle = "green";
			ctx.fill();
			ctx.lineWidth = 2;
			ctx.strokeStyle = 'black';
			ctx.stroke();

			ctx.beginPath();
			ctx.rect(425,200,50, -(percent6));
			ctx.fillStyle = "green";
			ctx.fill();
			ctx.lineWidth = 2;
			ctx.strokeStyle = 'black';
			ctx.stroke();
		</script>
		</div>
		<div class="col"></div>
	</div>
</div>
</div>
</body>
	<script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</html>
