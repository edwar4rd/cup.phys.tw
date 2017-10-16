<?
	include("db_conn.php");
	include("db_func.php");

 	function ChangWord($NewWord){

		// 將 enter 符號換為 <br>
    		$NewWord=str_replace("\r\n","<br>",$NewWord);

		// 將 [']+ 符號,換為 `
   		$NewWord=ereg_replace("[']+", "`", $NewWord);
		return $NewWord;
 	}

	$time = date("Y-m-d g:i:s"); // 取得目前日期及時間
	$ip = $REMOTE_ADDR; // 取得使用者 IP

	    // 處理留言者發布留言的動作 BEGIN
	    if ($check==add)
	    {
		$SQLStr = "INSERT INTO message (m_title, m_content, m_time, m_user, m_mail, m_pass, m_ip) ";
		$SQLStr .= " VALUES('$title', '" . ChangWord($content) . "', '$time', '$user', '$email', '$pass', '$ip') ";
	      	$message = "新增留言完成！";
	    }
	    // 處理留言者發布留言的動作 END

	    // 處理留言者刪除留言的動作 BEGIN
	    if ($check==del)
	    {
		include("idcheck.php"); // 外掛身分檢查元件

		$SQLStr = "DELETE FROM message WHERE m_id = $m_id";
		$message = "刪除留言完成！";
	    }
	    // 處理留言者刪除留言的動作 END

	    // 處理留言者更新留言的動作 BEGIN
	    if ($check==upd)
    	    {
		include("idcheck.php"); // 外掛身分檢查元件

		$SQLStr = "UPDATE message SET m_title='$title', m_content='" . ChangWord($content) . "', m_time='$time', ";
		$SQLStr .= "m_mail='$email', m_ip='$ip' WHERE m_id = '$m_id'";
		$message = "更新留言完成！";
	    }
	    // 處理留言者更新留言的動作 END

	    db_query($SQLStr);
?>
<script>
alert("<?php echo $message; ?>");
location.href = "message_list.php?p=0";
</script>
