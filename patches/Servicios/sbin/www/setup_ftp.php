<?
header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
/*
//read ftp port...
if (file_exists("/usr/local/etc/stupid-ftpd.conf")){
	$filename1 = "/usr/local/etc/stupid-ftpd.conf";
}else{
	$filename1 = "/usr/local/etc/stupid-ftpd.conf_stop";
}
$fp1 = fopen($filename1, 'r');
$fileData1 = fread($fp1, filesize($filename1));
fclose($fp1);

$line1 = explode("\n", $fileData1);
$i = 0;
while ($i <= 6) {
	   $dataPair1 = explode('=', $line1[$i]);
	   if ($dataPair1[0] == port) {
			$FTPPort = $dataPair1[1];
			break;
		}
	$i++;
}
*/
?>

<html>
<head>
<title><?echo $STR_Setup;?></title>
<link href="dlf/styles.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="0" marginwidth="0" leftmargin="0" topmargin="0" bgcolor="#012436" oncontextmenu="return false;" onload="ftpEnableDisable();document.forms.ftpport.ftpport.focus()">

<script language="javascript">
//NUMBER ONLY
var isIE = document.all?true:false;
var isNS = document.layers?true:false;
function onlyDigits(e) {
	var _ret = true;
	if (isIE) {
		if (window.event.keyCode < 48 || window.event.keyCode > 57 ) {
		window.event.keyCode = 0;
		_ret = false;
		}
	}
	if (isNS) {
		if (e.which < 48 || e.which > 57) {
		e.which = 0;
		_ret = false;
		}
	}
	return (_ret);
}

function changeftpport(){

	if(!document.ftpport.ftpport.value){
		alert('<?echo $STR_SpecifyFTPPort;?>');
		document.ftpport.ftpport.focus();
	}else if((document.ftpport.ftpport.value != 21) && !((document.ftpport.ftpport.value >= 2000) && (document.ftpport.ftpport.value <= 6000))){
		alert('<?echo $STR_FTPPortRange;?>');
	}else if(confirm('<?echo $STR_FTPPortChangeConfirm;?>')){
		document.ftpport.target = 'gframe';
		document.ftpport.action = 'ftpport.php';
		document.ftpport.submit();
	}
}

function ftpEnableDisable(){
	document.gframe.location.href = 'ftpEnableDisable.php';
}

function startps(){
	document.FTPservice.start.disabled=true;
	document.FTPservice.stop.disabled=false;
	document.ftpport.ftpport.disabled=false;
	document.ftpport.saveftpport.disabled=false;
	document.FTPservice.target = 'gframe';
	document.FTPservice.action = 'FTPstart.php';
	document.FTPservice.submit();
}

function stopps(){
	document.FTPservice.start.disabled=false;
	document.FTPservice.stop.disabled=true;
	document.ftpport.ftpport.disabled=true;
	document.ftpport.saveftpport.disabled=true;
	document.FTPservice.target = 'gframe';
	document.FTPservice.action = 'FTPstop.php';
	document.FTPservice.submit();
}

function newwindow(w,h,webaddress,name){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>

<center>
<table cellspacing="0" cellpadding="0" border="0" height="500" width="996">

<tr><td width=300>&nbsp</td>
	<td width=620>&nbsp</td>
	<td height="100" align="right" valign="bottom"><a href="index.php"><Img src="dlf/mvix_logo.png" width="300" height="72"></td>
</tr>


<tr><td width=350>&nbsp</td>
	<td width=620 valign="top">

	<table width=540 height="100"  cellspacing="0" cellpadding="0" border="0">
	<tr><td height=40></td></tr>
	<tr><td>
		<table cellspacing="0" cellpadding="0" border="0"><tr>
			<td><a href="register_form.php">
				<font face="arial" color="white" size="2"><b><?echo $STR_Login_Head;?> </b></font>
				<font face="arial" color="white" size="2">|&nbsp</td>
			<td><font face="arial" color="white" size="2">
				<a href="setup_ddns.php"><b><?echo $STR_DDNS_Head;?> </b>
				<font face="arial" color="white" size="2">|&nbsp</td>
			<td><font face="arial" color="white" size="2">
				<a href="setup_http.php"><b><?echo $STR_HTTP_Head;?> </b>
				<font face="arial" color="white" size="2">|&nbsp</td>
			<td><a href="setup_ftp.php">
				<font face="arial" color="#ff0000" size="2"><b><u><?echo $STR_FTP_Head;?></u> </b>
				<font face="arial" color="white" size="2">|&nbsp</td>
			<td><font face="arial" color="white" size="2">
				<a href="setup_live_keyword.php"><b><?echo $STR_LiveKeyword_Head;?> </b>
				<font face="arial" color="white" size="2">|&nbsp</td>
			<td><font face="arial" color="white" size="2">
				<a href="setup_backup.php"><b><?echo $STR_Backup_Head;?> </b>
				<font face="arial" color="white" size="2">|&nbsp</td>
		</tr></table>
	</td></tr>
	
	<tr><td>
		<table cellspacing="0" cellpadding="0" border="0"><tr>
			<td width="110"></td>
			<td><font face="arial" color="white" size="2">
				<a href="setup_language.php"><b><?echo $STR_Language_Head;?> </b>
				<font face="arial" color="white" size="2">|&nbsp</td>
			<td><font face="arial" color="white" size="2">
				<a href="setup_upnp_boost.php"><b><?echo $STR_NAS_Mode;?></b>
				<font face="arial" color="white" size="2">|&nbsp</td>
			<!--td><font face="arial" color="white" size="2">
				<a href="setup_time.php"><b>Time Server</b>
				<font face="arial" color="white" size="2">|&nbsp</td-->
			<td><font face="arial" color="white" size="2">
				<a href="setup_nfs.php"><b><?echo $STR_NFS_Client;?></b>
				<font face="arial" color="white" size="2">|&nbsp</td>
			<td><font face="arial" color="white" size="2">
				<a href="setup_Host_workgroup.php"><b>Workgroup/Hostname</b>
				<font face="arial" color="white" size="2">|&nbsp</td>
			<td><font face="arial" color="white" size="2">
				<a href="setup_Skin.php"><b><?echo $STR_Skin_Head;?></b></td>
		</tr></table>
	</td></tr>	
	</table>
	
	
	

	<table cellspacing="0" cellpadding="0" border="0">
	<tr><td height=100 width=100></td><td></td></tr>
<!--
	<tr><td width=100></td>
		<td>
		<form name="ftpport" method="post" action='javascript:changeftpport();'>
				  <table border="0" >

					  <tr><td width="70"><font face="Arial" color="white" size="2"><?echo $STR_FTPPortNo;?></td>
						<td width="170"><input type="text" name="ftpport" class="textbox" size="20" maxlength="4" onKeyPress="onlyDigits();" value=<?echo $FTPPort;?> ></td>
						<td><input type="button" class='btn_2' name="saveftpport" id="saveftpport" value="<?echo $STR_Apply;?>" onClick="javascript:changeftpport();"></td>
					  </tr>
				  </table>
		</form>
		</td>
-->
	<tr><td width=100></td>
		<td>
		<form name="FTPservice" method="post">
		  <table border="0">
			  <tr><td width="70"><font face="Arial" color="white" size="2"><?echo $STR_FTPServer;?></td>
				  <td><input type="button" class='btn_2' name="start" value="<?echo $STR_Start;?>" onClick="javascript:startps();"">
					  <input type="button" class='btn_2' name="stop" value="<?echo $STR_Stop;?>" onClick="javascript:stopps();"">
			  </tr>
	      </table>
		</form>
	</tr></td>


	</tr>
	</table>

	</td>
	<td width="337" align="right" valign="middle"><img src="dlf/pvr_img.png" width="337" height="250"></td>
</tr>
</table>


<iframe name='gframe' width=0 height=0 style="display:none"></iframe>

<table width="700"  border="0" cellspacing="0" cellpadding="0">
  <tr height=4><td></td></tr>	
  <tr>
    <td align="right" valign="top" style="border-top:solid 1px; border-top-color:#FFFFFF"><table width="900" border="0" cellspacing="0" cellpadding="0">
      <tr><td width=20></td>
        <td width=440 valign="middle"><font face="Arial" color="#748e94" size="2"><a href="index.php"><?echo $STR_Home;?></a> | <a href="register_form.php"><?echo $STR_Setup;?></a> 
		| <a href="#" onclick="newwindow(318, 356, 'rc', 'rc_1');";>RC</a> 
		| <a href="#" onclick="newwindow(250, 680, 'rc2', 'rc_2');";>RC2</a> 
		<?if (file_exists("/tmp/usbmounts/sda1/scripts/xJukebox/index.php")){?>
			| <a href="jukebox">Jukebox</a>
		<?}?>
		| <a href="logout.php"><?echo $STR_Logout;?></a></font></td>

		<td align=right>
			<table><tr><!--td align=right><font face="Arial" color="#000000" size="1"><b><?echo date('M, d Y | h:i A');?></td--></tr>
				   <tr><td align=right><font face="Arial" color="#000000" size="1"><b>Copyright ⓒ 2009 Xtreamer.net, All right reserved.</td></tr>
			</table>
		</td>

        <td align=right><img src="dlf/footer.png" width="175" height="51" usemap="#planetmap">
		<map name="planetmap">
		  <area shape="rect" coords="05,100,135,2" href='#' onclick="window.open('http://xtreamer.net/','MyVideo','height=675,width=987,left=100,top=100, toolbar=yes,location=yes,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no');";/>
		</map>
		</td>
      </tr>
    </table>
      </td>
  </tr>
</table>
</center>

</body>
</html>
