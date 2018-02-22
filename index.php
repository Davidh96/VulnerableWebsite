<!DOCTYPE html>
<html>
<title>Security Example</title>
<body>
<h1 align="center"> A very Secure website!</h1>
<br>
<div align="center">

//a form where a user inputs the term they want to search, or an attacker can input malicious code!
<form action="index.php" method="get">
	<input type="text" name="search" placeholder="search" size="100"/>
	<input type="submit" value="Search" />
</form>

</div>
<div align="center">
<br>
<?php

$db_name = "database";
$mysql_username = "root";
$mysql_password = "";
$server_name = "localhost";
//connect to database
$conn = mysqli_connect($server_name,$mysql_username,$mysql_password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if(isset($_GET["search"]))
{
	echo "\nYou Typed: ".$_GET["search"];
	//search for term in the vulnerabilities table
	$sql = "SELECT id, name, exploit FROM database.vulnerabilities WHERE name LIKE '%" .$_GET["search"] . "%' ";

	//execute sql statement
	$result = $conn->query($sql);

	//if results are returned, place them in the table
	if ($result->num_rows > 0) {
		echo "<table>";
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	echo "<tr>";
	    	foreach ($row as $value) {

	    		echo "<td>" . $value . "</td>";
	    	}
	        echo "</tr>";
	    }

	    echo "</table>";

	} else {
	    echo "0 results";
	}

	$conn->close();
}
?>
</div>
</body>
</html>
