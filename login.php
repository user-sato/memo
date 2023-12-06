<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <title>memo-ログイン</title>
    </head>
    <body>
        <div id="title">
            <p>ログイン</p>
        </div>
        <div id="newuser">
            <form method="post" action="./newuser.php">
                <input type="submit" value="新規登録">
            </form>
        </div>
        <div id="login">
            <form method="post" action="./login_check.php">
                <input type="text" name="userid" placeholder="ID"><br>
                <input type="password" name="password" id="pass" placeholder="PASSWORD"><br>
                <input type="submit" id="submit" value="ログイン">
            </form>
        </div>
    </body>
</html>