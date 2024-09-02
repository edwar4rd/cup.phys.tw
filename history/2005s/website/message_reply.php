<?
	// 取出單篇留言內容 BEGIN
	include("db_conn.php");
	include("db_func.php");
	$SQLStr = "SELECT * FROM message WHERE m_id='$m_id'";
	$res = db_query("$SQLStr");
	$row = db_fetch_array($res);
	// 取出單篇留言內容 END
?>

<body background="images/bg1.gif">

<form name="form1" method="post" action="message_process.php?check=add">
  <table width="481" border="1" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td>
        <div align="center">
        <table width="480" border="0" cellspacing="1" bordercolor="#000099" bgcolor="#FFFFFF">
          <tr> 
            <td height="10" colspan="2" bgcolor="#006699">
              <div align="center"><font color="#EEEEEE" size="4">訪客留言板</font></div>
            </td>
          </tr>
          <tr> 
            <td height="30" bgcolor="#99CCFF" align="center">留言人</td>
            <td height="30" bgcolor="#99CCFF"> 
              <input type="text" name="user" size="20">
            </td>
          </tr>
          <tr> 
            <td height="23"> 
              <div align="center">e-mail</div>
            </td>
            <td height="23"> 
              <input type="text" name="email" size="36">
            </td>
          </tr>
          <tr> 
            <td height="23" bgcolor="#99CCFF"> 
              <div align="center">留言主題</div>
            </td>
            <td height="23" bgcolor="#99CCFF"> 
              <!--------- 取出留言標題並限制不得修改 ----------->
              <input type="text" name="title" size="36" value="&lt;?echo &quot;Re: &quot; . $row['m_title']?&gt;" disabled>
            </td>
          </tr>
          <tr> 
            <td height="80"> 
              <div align="center">留言內容</div>
            </td>
            <td height="80"> 
              <p> 
                <textarea name="content" rows="10" cols="35"></textarea>
                <br>
              </p>
              </td>
          </tr>
          <tr> 
            <td height="25" colspan="2" bgcolor="#006699"> 
              <div align="center"> 
                <input type="reset" name="Reset" value="清除重填">
                <input type="submit" name="Submit" value="送出留言">
              </div>
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

