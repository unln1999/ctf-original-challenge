<?php
#html头与script
echo '
<html>

<head>
<meta charset="utf-8">
<title>一百万猜数</title>

</head>

<body>
<script type="text/javascript" src="http://localhost/flag.js"></script>
<script>
document.onkeydown=function (e)
{
   var currKey=0,evt=e||window.event;
    currKey=evt.keyCode||evt.which||evt.charCode;
    if (currKey == 123) 
	{
        window.event.cancelBubble = true;
        window.event.returnValue = false;
    }
}
var num = Math.floor(Math.random()*1000000);
var times = 0;
var finish = 0;
var solve = 0;
function check()
{
	var guess = document.getElementById("guess").value;
	times += 1;
	if(finish == 1)
		return;
	if(times == 2)
		return;
	if(guess == num)
		{
			finish = 1;
			solve = 1;
			flag();
		}
	if(times == 1 && finish != 1)
		{
			document.getElementById("respond").innerHTML="很遗憾你没有猜对，答案是"+num;
			finish = 1;
		}
}
</script>
<h1>猜数</h1>
';

#xss bug 用get的话本题容易一些
if(!isset($_GET["username"]))
{
echo '
<form method="get">
<label for="username">输入你的昵称以开始猜数：</label><input type="text" name="username">
<button type="submit">OK</button>
</form>
';
}

if(isset($_GET["username"]))
{
echo'
<p>欢迎游戏！'.$_GET["username"].'</p>
<p>猜一个0~1000000的数，<b>只有1次机会</b>，猜对了就有flag哦！</p>
<label for="guess">我猜是：</label><input type="text" id="guess">
<button onclick="check()">开猜！</button>
<p id="respond"></p>
<hr>
</body>
</html>
';
}


?>