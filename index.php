<?php require_once'con.php';?>
<!DOCTYPE html>
<html>
<head>
 <title>Resize Image</title>
 <meta content="width=device-width, initial-scale=1" name="viewport"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
<link href="//maxcdn.bootstrapcdn.com" rel="dns-prefetch"/>
 <style>
 *{margin:0;padding:0;}
 body{background:fff;color:#444444;font-size:16px;font-family:Roboto;}
 .top{width:100%;text-align:center;height:20px;padding:20px 0 33px 0;background:#efefef}
 .resize{max-width:1000px;width:100%;margin:0;padding:40px 45px;}
 .resize form{height:auto;width:50px;position:relative;text-align:left;}
 .resize input[type=submit]{border:none;padding:4px 0 4px 0;color:#444444;background:transparent;outline:none;}
 .clear{clear:both;}
 @media(max-width:468px){
 .resize{width:83%;padding:30px 0 0 30px;}
 .resize input[type=submit]{left:6.5%;top:40%;}
 }
 </style>
</head>
<body>
<h1 class="top"><i class="fa fa-heart" style="margin-right:5px;color:red;"></i> Tombol Suka</h1>
<div class="resize">
<h3>Cara membuat tombol like php</h3>
<br/>
<br/>
<p>Ini adalah contoh tombol suka dengan php, jika anda menerapkannya di situs ini bagus</p>
<br/>
<p>Apa anda suka dengan tombol like tentu ini bagus dan juga indah gitu loh</p>
<br/>
<br/>
<div class="clear"/>
<?php 
if(isset($_POST['submit'])){
$postTitle = $_POST['postTitle'];
$suka = $_POST['suka'];
$stmt =$db->prepare('INSERT INTO suka (postTitle,suka) VALUES (:postTitle,:suka)');
$stmt->execute(array(
':postTitle' => $postTitle,
':suka' => $suka
));
}
?>
<?php
 $stmt =$db->query("SELECT COUNT(*) FROM suka WHERE postTitle ='".$postTitle."'");
 while($row = $stmt->fetch()){
 echo'<i class="fa fa-heart" style="margin-right:5px;color:red;"></i>';
  echo''. $row['COUNT(*)'].'';
 }
 ?>
 <form method="POST">
 <input type="hidden" name="postTitle" value="hayang modol">
  <input type="hidden" name="suka" value="1">
 <input type="submit" name="submit" value="suka">
 </form>
 </div>
</body>
</html>
