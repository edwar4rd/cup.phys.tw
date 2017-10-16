<?
	include("up.htm"); // 外掛網頁上方功能列
	include("db_conn.php");
	include("db_func.php");

	// 取出指定的留言資料 BEGIN
	$SQLStr = "SELECT * FROM message WHERE m_id = '$m_id'";
	$res = db_query($SQLStr);
	// 取出指定的留言資料 END

	$row = db_fetch_array($res);
?>

<script>
function update()
{
var pass1 = document.form1.pass.value;
var m_id1 = document.form1.m_id.value;
window.open("message_update.php?m_id="+m_id1+"&pass="+pass1,"update","width=640,height=480,status=0,scrollbars=0,resizable=1,menubar=0,toolbar=0,location=0");
}
</script>

<body background="images/bg1.gif">

<form name="form1" method="post" action="message_process.php?check=del">
  <table width="550" border="1" cellspacing="1" cellpadding="1" align="center">
    <tr>
      <td>
        <div align="center">
        <table width="549" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr> 
	    <td bgcolor="#FFFFFF" align="center">
              <a href="message_reply.php?m_id=<?=$m_id?>">回覆留言</a>
            </td>
            <td colspan="3" bgcolor="#CCCCCC" align="center"><b><font size="4">
              訪客留言詳細內容</font></b>
            </td>
          </tr>
          <tr> 
            <td bgcolor="#99CCFF" align="center">留言人</td>
            <td colspan="3" align="center"><a href="mailto:<?=$row['m_mail']?>">
             <?=$row['m_user']?></a>
            </td>
          </tr>
          <tr> 
            <td height="21" bgcolor="#CC9999" align="center">留言主題</td>
            <td colspan="3" height="21" bgcolor="#FFFFFF" align="center">
              <?=$row['m_title']?>
            </td>
          </tr>
          <tr bgcolor="#FFCCCC"> 
            <td colspan="4" align="center">留言內容</td>
          </tr>
          <tr> 
            <td colspan="4" align="center"><?=$row['m_content']?></td>
          </tr>
          <tr> 
            <td bgcolor="#99CCCC" align="center">留言日期</td>
            <td bgcolor="#FFFFFF" align="center"><?=$row['m_time']?></td>
            <td bgcolor="#99CCCC" align="center">來源地</td>
            <td bgcolor="#FFFFFF" align="center"><?=$row['m_ip']?></td>
          </tr>
          <tr> 
            <td colspan="4" bgcolor="#CCCCCC" align="center"> 
                <input type="button" name="submit1" value="修改留言" onClick="update();">
                <input type="submit" name="Submit" value="刪除留言">
		<input type = "password" name="pass" size="10">
		<input type = "hidden" name="m_id" value="<?=$m_id?>">
                <font color="#FF0000">(需輸入此篇留言的密碼) </font>
            </td>
          </tr>
        </table>
      	</div>
      </td>
    </tr>
  </table>
</form>
<p><br>
Copyright(Physics) 2004 [NCKU]. All rights reserved.<br>
修訂日期： <!--webbot bot="TimeStamp" s-type="Edited" s-format="%Y 年 %m 月 %d 日" startspan -->2005 年 04 月 03 日<!--webbot bot="TimeStamp" i-checksum="9824" endspan -->。</p>
