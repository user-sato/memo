<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <title>memo-新規登録</title>
    </head>
    <body>
        <div id="title">
            <p>新規登録</p>
        </div>
        <?php

        try{
            $username = $_POST['userid'];
            $password = $_POST['password'];

            $username = htmlspecialchars($username,ENT_QUOTES,'UTF-8');
            $password = htmlspecialchars($password,ENT_QUOTES,'UTF-8');

            // DB接続
            $dsn = 'mysql:dbname=memo;host=localhost;charaset=utf8';
            $user = 'root';
            $dbpass = '';
            $dbh = new PDO($dsn,$user,$dbpass);
            //$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            // SQL作成
            $sql = 'INSERT INTO userinfo VALUES(?,?)';
            $stmt = $dbh->prepare($sql);
            $data[] = $username;
            $data[] = $password;
            $stmt->execute($data);

            // DB切断！
            $dhn = null;

            print '<p>ユーザーを追加しました。</p>';

        }catch(Exception $e){
            print 'ただいま障害により大変ご迷惑おかけしております。';
            exit;
        }
        ?>
        <input type="button" onclick="location.href = './login.php'" value="ログイン">
    </body>
</html>