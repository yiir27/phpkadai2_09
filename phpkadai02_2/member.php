<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="member.css" rel="stylesheet">
    <title>アカウント作成</title>
</head>
<body>
    <form method="post" action="insert.php">
        <h3 class="circle">メールアドレス/ユーザーID/パスワード</h3>
        <table class="address" cellspacing="0" summary="memberInfomation1">
            <tbody>
                <tr>
                    <th id="email">
                        メールアドレス
                        <span class="essential">必須</span>
                    </th>
                    <td>
                        <br>
                        <em><半角英数字></em>
                        <br>
                        <em>他の会員が登録済みのメールアドレスは登録できません。</em>
                        <br>
                        <input type="text" name="email" maxlength="100" size="35" value onchange="email2.value='';" class="text email" title style="color: rgb(153,153,153);">
                        <br>
                        <!-- <em class>
                            確認のためもう一度入力してください(コピー･貼り付けはしないでください。)                    
                        </em>
                        <br>
                        <input type="text" name="email2" maxlength="100" size="35" value onkeydown="if(event.ctrlKey==true && event.keyCode==86)return false;" onfocus="this.setAttribute('oncontextmenu','return false;');" class="text email2" title style="color: rgb(153,153,153);">
                        <br> -->
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
                        <em class="top">会員向けサービスにログインします。</em>
                        <br>
                        <!-- <input type="radio" name="radio_mail" value="0" checked="checked">
                        メールアドレスをユーザIDとしてしよう
                        <br>
                        <br>
                        <input type="radio" name="radio_mail" value="1">
                        メールアドレス以外をユーザIDとして使用
                        <br> -->
                        <em>&lt;６文字以上･半角英数字&gt; 数字だけにすることはできません。</em>
                        <div class="user">
                            <input type="text" name="user" maxlength="100" size="50" value class="text userid" title="(例)good1234" style="color: rgb(153,153,153);">
                            
                        </div>
                        <br>
                        <!-- <script type="text/javascript" src="/com/js/id/rids_common.js"></script> -->
                    </td>
                </tr>
                <tr>
                    <th class="headRow" id="p" scope="row">
                        パスワード
                        <span class="essential">必須</span>
                    </th> 
                    <td>
                        <br>
                        <em>&lt;6文字以上半角英数字&gt;</em>
                        <br>
                        <em>「ユーザID」と同じものは登録できません。</em>
                        <br>
                        <em>第三者によるログインを防ぐために、できるだけ複雑なものを設定してください。</em>
                        <br>
                        <input type="password" name="pw" maxlength="128" size="20" value="" onkeydown="if(event.ctrlKey==true &amp;&amp; event.keyCode==86)return false;" onkeypress="pFlagOn()" onfocus="pFocus(this)" id="p_id" title="(例) 18f5ns1kzm">
                        <br>
                        <br>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="execMethod" value="確認する">
        </p>
    </form>
</body>
</html>