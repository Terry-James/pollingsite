<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="thisBody">
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
	</div>

	<div class="row">
		<div class="col"></div>
		<div class="col">
		<canvas id="aCanvas" width="500" height="500" style="border:1px solid #d3d3d3;"></canvas>
		<script>
			var c = document.getElementById("aCanvas");
			var ctx = c.getContext("2d");
			ctx.moveTo(50,0);
			ctx.lineTo(50,500);
			ctx.stroke();

			ctx.moveTo(0,450);
			ctx.lineTo(500,450);
			ctx.stroke();
		</script>
		</div>
		<div class="col"></div>
	</div>
</div>
</body>
</html>
