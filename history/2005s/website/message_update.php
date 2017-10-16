<?
	// 取出單篇留言內容 BEGIN
	include("db_conn.php");
	include("db_func.php");
	$SQLStr = "SELECT * FROM message WHERE m_id='$m_id'";
	$res = db_query("$SQLStr");
	$row = db_fetch_array($res);
	echo $pass;
	// 取出單篇留言內容 END
?>

<!------ 傳送更新留言資料的參數 upd 給留言處理功能------>
<body background="images/bg1.gif">

<form name="form1" method="post" action="message_process.php?check=upd">
  <table width="481" border="1" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td>
        <div align="center">
        <table width="480" border="0" bordercolor="#000099" bgcolor="#FFFFFF">
          <tr> 
            <td height="10" colspan="2" bgcolor="#006699" align="center">
              <font color="#EEEEEE" size="4">訪客留言板</font>
            </td>
          </tr>
          <tr> 
            <td height="30" bgcolor="#99CCFF" align="center">
			<font color="#008000">留言人</font></td>
            <td height="30" bgcolor="#99CCFF"> 
              <input type="text" name="user" size="20" value="<?=$row['m_user']?>" disabled>
            </td>
          </tr>
          <tr> 
            <td height="23" align="center"><font color="#008000">e-mail</font></td>
            <td height="23"> 
              <input type="text" name="email" size="36" value="<?=$row['m_mail']?>">
            </td>
          </tr>
          <tr> 
            <td height="23" bgcolor="#99CCFF" align="center">
			<font color="#008000">留言主題</font></td>
            <td height="23" bgcolor="#99CCFF"> 
              <input type="text" name="title" size="36" value="<?=$row['m_title']?>">
            </td>
          </tr>
          <tr> 
            <td height="80" align="center"><font color="#008000">留言內容</font></td>
            <td height="80"> 
              <p> 
                <textarea name="content" rows="10" cols="35"><?=$row['m_content']?></textarea>
                <br>
              </p>
              </td>
          </tr>
          <tr> 
            <td height="25" colspan="2" bgcolor="#006699" align="center"> 
              <input type="reset" name="Reset" value="清除重填">
              <input type="submit" name="Submit" value="送出留言">
            </td>
          </tr>
        </table>
        </div>
        &nbsp;&nbsp; 請輸入密碼 <font color="#008000">&nbsp; </font>
        <input type = "password" name="pass" size="10 " value="<?=$pass?>">
	<input type="hidden" name="m_id" value="<?=$m_id?>">
	<font color="#FF0000">(需輸入此篇留言的密碼) </font>
      </td>
    </tr>
  </table>
  </form>
<p><br>
Copyright(Physics) 2004 [NCKU]. All rights reserved.<br>
修訂日期： <!--webbot bot="TimeStamp" s-type="Edited" s-format="%Y 年 %m 月 %d 日" startspan -->2005 年 04 月 03 日<!--webbot bot="TimeStamp" i-checksum="9824" endspan -->。</p>

