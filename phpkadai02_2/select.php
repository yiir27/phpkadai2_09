<?php
//1. DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=membership;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectEror01:'.$e->getMessage());
}

//２．データ表示
$sql = "SELECT * FROM membership_table ORDER BY id DESC LIMIT 1;";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view="";//なくてもいいらしい
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError".$error[2]);
}

// //全データ取得
$v =  $stmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC[カラム名のみで取得できるモード] 全データがオブジェクトで入ってくる
//JSONを渡す場合に使う この一文で全データをJSON化できる

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="select.css" rel="stylesheet">
    <title>確認</title>
</head>
<body>
    <form method="post" action="welcome.php">
        <h3 class="circle">メールアドレス/ユーザーID/パスワードを確認の上、登録ボタンを押してください</h3>
        <table class="address" cellspacing="0" summary="memberInfomation1">
            <tbody>
                <tr>
                    <th id="email">
                        メールアドレス
                    </th>
                    <td>
                        <br>
                        <?= $v["email"] ?>
                        <br>
                    </td>
                </tr>
                <tr>
                    <th id="u">
                        ユーザーID
                        <span class="essential">必須</span>
                    </th>
                    <td>
                        <br>
                        <?= $v["user"] ?>
                        <br>
                    </td>
                </tr>
                <tr>
                    <th class="headRow" id="p" scope="row">
                        パスワード
                        <span class="essential">必須</span>
                    </th> 
                    <td>
                        <br>
                        <?= $v["pw"] ?>
                        <br>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" value="登録">
        </p>
    </form>
</body>
</html>