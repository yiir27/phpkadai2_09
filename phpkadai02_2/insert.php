<?php
//1. DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=membership;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectEror01:'.$e->getMessage());
  }

//2.データ取得
$email = $_POST["email"];
$user = $_POST["user"];
$pw = $_POST["pw"];

//３．データ登録SQL作成
$sql = "INSERT INTO membership_table(email,user,pw,indate)VALUE(:email, :user, :pw, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':pw', $pw, PDO::PARAM_STR);
 //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

$check1 = "SELECT COUNT(*) as cnt1 FROM membership_table WHERE email=?";
$member = $pdo->prepare($check1);
$member->execute(array($_POST["email"]));
$result = $member->fetch();
if($result['cnt'] > 0) {
    $error['email'] = 'duplicate1;';
}

$check2 = "SELECT COUNT(*) as cnt2 FROM membership_table WHERE user=?";
$member = $pdo->prepare($check2);
$member->execute(array($_POST["user"]));
$result = $member->fetch();
if($result['cnt'] > 0) {
    $error['user'] = 'duplicate2';
}

//４．データ登録処理後
if(empty($status)){
    $error = $stmt->errorInfo();
    exit("記入が抜けているところがあります。".$error[2]);
}else if (!empty($status === $check1)){
    $error = $stmt->errorInfo();
    exit("すでに利用されているメールアドレスです".$error[3]);
}else if (!empty($status === $check1)){
    $error = $stmt->errorInfo();
    exit("すでに利用されているユーザーIDです".$error[3]);
}else{
    //５．***.phpへリダイレクト
    header("Location: select.php");//***.phpの前は半角スペースは必須
    exit();
}

// if($status==false){
//     //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//     $error = $stmt->errorInfo();
//     exit("SQLError:".$error[2]);
//   }else{
//     //５．***.phpへリダイレクト
//     header("Location: select.php");//***.phpの前は半角スペースは必須
//     exit();
//   }
?>

