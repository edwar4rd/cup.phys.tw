<?

	$DB_HOST		="localhost";
	$DB_LOGIN		="root";
	$DB_PASSWORD	="root";
	$DB_NAME		="flag";
	
	$conn = mysql_connect($DB_HOST , $DB_LOGIN , $DB_PASSWORD);
	mysql_select_db($DB_NAME);


?>
