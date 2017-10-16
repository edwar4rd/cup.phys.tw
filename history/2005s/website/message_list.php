<? 	
    
    // 匯入兩個資料庫元件 BEGIN
	include("db_conn.php");
	include("db_func.php");
	// 匯入兩個資料庫元件 END

	// 取出依發布時間遞減排序的留言資料之 SQL 語法
	$SQLStr = "SELECT * FROM message ORDER BY m_time DESC";

	$res = db_query($SQLStr); // 執行 SQL 命令

?>

  <body background="images/bg1.gif">

  <p align="center">
	<img border="0" src="images/guestTitle.gif" width="471" height="62"></p>
	<hr>
	<p><font color="#800000">
我們希望知道您對我們舉辦的大物盃有何意見。因此請將您的意見留在訪客意見欄內，這樣我們才能將您的想法與其他訪客分享。</font></p>
	<hr>

  <p>　<?include("up.htm");?></p>

  <table width="750" border="0" align="center" cellpadding="0" cellspacing="1">
    <tr bgcolor="#0066CC"> 
      <td width="290" align="center">
        <font color="#FFFFFF">留言主題</font>
      </td>
      <td width="300" align="center"> 
        <font color="#FFFFFF">留言內容</font>
      </td>
      <td width="60"> 
        <font color="#FFFFFF">留言人</font>
      </td>
      <td width="100"> 
        <font color="#FFFFFF">留言時間</font>
      </td>
    </tr>
<?

	if (db_num_rows($res)>0) // 若資料表中有資料
	{

		$num = db_num_rows($res); // 取得資料筆數
		$check = $p+10; // 每頁抓取 10 筆資料

		// 呈現留言列表的欄位內容 BEGIN
		for ($i=0;$i<=$num;$i++) // 用來呈現多筆留言資料的迴圈
		{
		  $row = db_fetch_array($res);

		  // 選取第 $p 筆到 $check 筆資料
		  if ($i>=$p && $i<$check) 
		  {
			// 利用是否被整除來判斷欄位的背景顏色
			if ($i%2 == 0) 
			  echo "<tr bgcolor='#DDDDDD'>";
			else
			  echo "<tr>";

			// 判斷 m_title 欄位內字串值是否超過 15 字元
			if (strlen($row['m_title'])>15)
			{
			  echo "<td width='280'><a href='message_show.php?m_id=".$row['m_id']."'>";
			  echo substr($row['m_title'],0,30) . "...</a></td>";
			}
			else
			{
			  echo "<td width='280'><a href='message_show.php?m_id=".$row['m_id']."'>";
			  echo $row['m_title'] . "</a></td>";
			}
			// 判斷 m_content 欄位內字串值是否有包含 <br> 字串
			if (stristr($row['m_content'],"<br>"))
			{
			  echo "<td width='300'><a href='message_show.php?m_id=".$row['m_id']."'>";
			  echo substr($row['m_content'], 0, 0 - strlen(strstr($row['m_content'],"<br>"))) . "...</a></td>";
			}
			else
			{
			  echo "<td width='300'><a href='message_show.php?m_id=".$row['m_id']."'>";
			  echo $row['m_content'] . "</a></td>";
			}
			echo "<td width='60' align='center'><a href='mailto:". $row['m_mail'] . "'>" . $row['m_user'] . "</a></td>";

			// 僅選取 m_time 欄位內 16 個字元的資料 
			echo "<td width='130' align='center'>" . substr($row['m_time'],0,16) . "</td>";
			echo "</tr>";
			$j = $i+1;
		  }
		}
		// 呈現留言列表的欄位內容 END
	}
?>
  </table>
  <br>
  <table width="406" border="0" align="center">
    <tr>
      <td align="center">

	<!--- 將 p 值設為 0, 讓模組從第一筆資料開始抓取 ---->
        <a href="message_list.php?p=0">第一頁</a>
      </td>
      <td align="center">
<?	
	if ($p>9) // 判斷是否有上一頁
	{
	  $last = (floor($j/10)*10)-10;
	  echo "<a href='message_list.php?p=$last'>上一頁</a>";
	}
	else
	  echo "上一頁";
?>
      </td>
      <td align="center">
<?	
	if ($i>9 and $num>$check) // 判斷是否有下一頁
	  echo "<a href='message_list.php?p=$j'>下一頁</a>";
	else
	  echo "下一頁";
?>

      </td>
      <td align="center">
<?	
	if ($i>9) // 判斷目前呈現的筆數之後是否還有頁面
	{
	  // 取得最後一頁的第一筆資料
	  $final = floor($num/10)*10;
	  echo "<a href='message_list.php?p=$final'>最末頁</a>";
	}
	else
	  echo "最末頁";
	  include("down.htm");
?>
      </td>
    </tr>
  </table>
	<p><br>
Copyright(Physics) 2004 [NCKU]. All rights reserved.<br>
修訂日期： <!--webbot bot="TimeStamp" s-type="Edited" s-format="%Y 年 %m 月 %d 日" startspan -->2005 年 04 月 03 日<!--webbot bot="TimeStamp" i-checksum="9824" endspan -->。</p>

