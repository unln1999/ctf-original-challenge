<?php
echo'
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>勇者斗恶龙</title>
<style type="text/css">
.underline{
	border-bottom: 1px solid #000;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;}
</style>
<!--导入题库时下面的js引用需要修改-->
<script type="text/javascript" src="http://localhost/bisai/3/flag.js"></script>
<script>
var level = 1,powerbase = 1,power = 2,hexp = 0,nexp = 1;
const shilaimu = 1,elong = 10000;
//升级
function levelup()
{
	if(hexp>=nexp)
	{
		hexp -= nexp;
		level += 1;
		nexp = Math.floor(nexp*1.15)+1;
		powerbase += level;
		power = 2 * powerbase;
		levelup();
	}
	else
	{
	document.getElementById("level").innerHTML=level;
	document.getElementById("power").innerHTML=power;
	document.getElementById("exp").innerHTML=hexp+"/"+nexp;
	}
}
//打怪
function rush()
{
	var aexp = 0;
	var num = document.getElementById("num").value;
	var enemy = shilaimu;
	if(power>=enemy)
	{
		aexp = num*enemy;
		hexp += aexp;
		document.getElementById("reflection").innerHTML="战斗成功,获得经验值"+aexp+"!";
		levelup();
	}
	else
	{
		document.getElementById("reflection").innerHTML="你被打败了，对方的战斗力为"+enemy+",经验值损失一半！";
		hexp /= 2;
		hexp = Math.floor(hexp);
		levelup();
	}
}
//挑战恶龙
function boss()
{
	var aexp = 0;
	var num = 1;
	var enemy = elong;
	if(power>=enemy)
	{
		aexp = num*enemy;
		hexp += aexp;
		document.getElementById("reflection").innerHTML="战斗成功,获得经验值"+aexp+"!";
		levelup();
		flag();
	}
	else
	{
		document.getElementById("reflection").innerHTML="你被打败了，对方的战斗力为"+enemy+",经验值损失一半！";
		hexp /= 2;
		hexp = Math.floor(hexp);
		levelup();
	}
}
</script>
</head>
<body>
<h1>这个勇者明明很强却偏偏只打史莱姆升级</h1>
<hr/>
<div>
<p>职业：勇者<img src="worrior.png" style="float:left" width="240" height="240" /></p>
<label>等级：</label><p id="level">1</p>
<label>战斗力：</label><p id="power">2</p>
<label>经验值：</label><p id="exp">0/1</p>
</div>
<hr/>
<label for="num">今天要打几只史莱姆呢？</label><input name="num" id="num" maxlength=2 class="underline" />
<button onclick="rush()">练级</button>
<br/>
<label>准备好挑战恶龙了吗？</label><button onclick="boss()">挑战恶龙</button>
<p id="reflection"></p>
<p id="flag"></p>
</body>
</html>	
'
?>