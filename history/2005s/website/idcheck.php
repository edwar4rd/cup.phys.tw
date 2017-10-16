<?
	// 將使用者輸入的密碼與 message 資料表中的密碼欄
	// 位值做比對 BEGIN
	$SQLStr = "SELECT * FROM message WHERE m_id='$m_id' AND m_pass='$pass'";
	$res = db_query($SQLStr);
	// 將使用者輸入的密碼與 message 資料表中的密碼欄
	// 位值做比對 END

	if (!(db_num_rows($res)>0)) // 若密碼比對不正確
	{
		echo "<script>";
		echo "alert(\"密碼錯誤\");";
		echo "location.href = \"message_show.php?m_id=". $m_id ."\";";
		echo "</script>";
		break; // 結束執行, 不再執行後續的程式
	}

?>