<?php
error_reporting(0);
echo'
<html>
<head>
<meta charset="utf-8">
<title>简单的命令，简单的包含</title>
</head>
<form method="get">
<label for="system">你了解powershell查看目录的命令吗？ ><label>
<select id="system" name="system">
	<option value="cd ../" >cd ..</option>
	<option value="dir" >dir</option>
	<option value="cls" >cls</option>
</select>
<br/>
<label for="file">查看指定文件的内容:<label><input type="text" id="file" name="file">
<br/>
<button type="submit">小按钮</button>
</form>
</html>
';
$system = $_GET["system"];
$file = $_GET["file"];
$whitelist=["ls","dir","Get-ChildItem"];
$index = 0;
if(isset($_GET["system"]))
{
	if($system!=="dir")
		die("命令选的不对哦");
	echo('<hr>');
	system($system);
}
if(stristr($file,"..")!==FALSE)
	die("不能倒退哦");
echo('<hr/>');
highlight_file($file);
system("ls");
?>