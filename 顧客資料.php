<?php

include_once('connect.php');

// 取得Customer表的資料，並存在data裡
$sql = "SELECT * FROM customer";
$data = mysqli_query($con, $sql);
?>


<html>
	<head>
		<title>會員管理系統-顧客關係管理</title>
    	<meta charset="UTF-8" />
    	<style>
    		*{
    			box-sizing: border-box;
    		}
    		.header{
    			overflow: hidden;
    			background-color: #000000;
    			padding: 20px 10px;
    		}
    		.header h1{
    			padding:10px;color:white;
    		}
    		.header a{
    			float: left;
    			color: white;
    			text-align: center;
    			padding: 12px;
    			text-decoration: none;
    			font-size: 18px;
    			line-height: 25px;
    			border-radius: 4px;
    		}
    		.header button{
    			background-color:#D26900;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;border-radius: 4px;
    		}
    		.header button:hover {
    			background-color: #FFBB77;color: black;
    		}
			
			th { 
  				background-color: #FFBB77;
  				padding:15px;
  				border:1px solid grey;
  				color: white;
				text-align: center;
			}
			td { 
  				border:1px solid grey;
  				padding:10px;
				text-align: center;
			} 

			tr:nth-child(even){
  				background: #F0F0F0;
			}

    	</style>
	</head>
	<body>
		<div class="header">
			<h1>會員關係管理</h1>
			<button class="button" onclick="window.location.href='顧客資料.php'">顧客資料</button>
			<button class="button" onclick="window.location.href='消費行為.html'">消費行為</button>
			<button class="button" onclick="window.location.href='圖表分析.html'">圖表分析</button>
			<button class="button" onclick="window.location.href='function.html';"style="float: right;padding: 12px 28px;font-size: 14px">回首頁</button>
		</div>
		<div class="content">
			<table border="1" width=100% class="userInfoList">
				<!-- 1231:要加一個每頁顯示幾欄表格的java script-->
				<tr>
					<th>CustomerId</th>
					<th>Name</th>
					<th>Sex</th>
					<th>Age</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Level</th>
					<th>JoinTime</th>					
				</tr>
				<?php 
					// 用fetch_row讀取陣列的資料(上面已經把customer的資料都撈出來並放在$data裡)，row是一列一列讀，並把它存在&命名為rs，資料型態為array
					// 當使用rs[0]的時候，表示我們要取得這一列的第一個值；當輸入rs[1]的時候，表示要取得這一列的第二個值，以此類推。
					//如果我們想要呈現第二列的資料，只需要在複製一次這短語法就可以了，當它第二次讀到mysql_fetch_row時，就會回傳第二列的資料，以此類推。
					//可以用回圈的方式，告訴它我們要執行幾次，如果有三列，我們就讓它到$i<=3就可以了，
					//而更簡單的作法，是直接請程式抓我們有幾列，透過mysqli_num_rows() -> 此data共有幾列資料，就可以達到
					for($i=0; $i <= mysqli_num_rows($data) ; $i++){
						$rs = mysqli_fetch_row($data);
					
				?>
				<tr>
				<!-- 如果超出範圍的話會變null，因此要設限制式查看array抓出來的東西是否是null -->
				<?php if(isset($rs[0]) && isset($rs[1]) && isset($rs[2]) && isset($rs[3]) && isset($rs[4]) && isset($rs[5]) && isset($rs[6]) && isset($rs[7])){?>
					<td><?php echo $rs[0];?></td>
					<td><?php echo $rs[1];?></td>
					<td><?php echo $rs[2];?></td>
					<td><?php echo $rs[3];?></td>
					<td><?php echo $rs[4];?></td>
					<td><?php echo $rs[5];?></td>
					<td><?php echo $rs[6];?></td>
					<td><?php echo $rs[7];?></td>
				<?php
				}
				?>				
				</tr>
				<?php
				}
				?>
			</table>
		</div>
		<!-- 1231表格要用iframe接 -->
		<!-- <iframe id="welc" src="welcome.php" style="width: 100% ;height:480px"></iframe> -->
		<script>
			function openpage1()
			{
        		document.getElementById("welc").setAttribute("src", "顧客資料系統.php");
			}
		</script>
		<script>
			function openpage2()
			{
				document.getElementById("welc").setAttribute("src", "消費行為.php");
			}
		</script>
		<script>
			function openpage3()
			{
				document.getElementById("firstpage").innerHTML="視覺化圖表插這";
			}
		</script>
		
	</body>
</html>