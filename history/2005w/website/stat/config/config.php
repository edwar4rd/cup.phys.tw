<?php

//保存最近記錄條數
$conf['record_limit'] = 50;

//管理員用戶名和密碼
$conf['admin_username'] = 'physcup';
$conf['admin_password'] = 'ckbear';

//統計服務提供
//可換成您的提供統計服務的網站的名字和連接
$conf['service_offer'] = '帝大物博 - 2005 冬季大物盃';
$conf['service_link']  = "http://st.phys.ntu.edu.tw/physcup/";

//統計系統所在URL
//注意：URL末不要加反斜線 '/'
$conf['stat_url'] = "http://st.phys.ntu.edu.tw/physcup/stat";


//是否使用防止重新整理功能
//   true:  使用
//   false: 不使用
$conf['avoid_refresh'] =true;

//防止重新整理功能的間隔時間,單位:秒.(即多少秒之內的重新整理不統計)
// $conf['refresh_cookietime'] = 180;
?>