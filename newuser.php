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
        <div id="newuser">
            <form method="post" action="./newuserinput.php">
                <input type="text" name="userid" placeholder="ID"><br>
                <input type="password" name="password" id="pass" placeholder="PASSWORD"><br>
                <input type="submit" id="submit" value="新規登録">
            </form>
            <!-- submitはbuttonにして、onclickイベントでtextに入力されたIDを取得する。
                　PHPにてDBにアクセスし、IDの一覧を取得して、textのIDと照らし合わせる。
                　同じのがあったらアウト。エラー出力。
                  完全新規なら、次のページへ遷移。 -->
        </div>
    </body>
</html>