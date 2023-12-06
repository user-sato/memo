<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="./main.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <title></title>
    </head>
    <body>

    <?php
        $userid = $_POST['userid'];
        $password = $_POST['password'];

        if($userid == '' || $password = ''){
            print '<p>IDかパスワードが入力されていません。</p>';
        }
        else
        {
            print '<p>ようこそ、'.$userid.'さん！</p>';
            // $password = md5($password);
            // print '<form method="post" action="./main.php">';
            // print '<input type="text" name="userid" placeholder="ID" value="'.$userid.'"><br>';
            // print '<input type="password" name="password" placeholder="PASSWORD"><br>';
            // print '<input type="submit" value="ログイン">';
            // print '</form>';
        }

        ?>
        <nav id="nav">
        
        </nav>
        <section>
            <!-- <form method="post" action="./write_db.php">
                <textarea name="memo" cols="100" rows="50" placeholder="メモを入力してください..."></textarea>
                <br>
                <input type="submit" value="保存">
            </form> -->
                <input type="text" id="title" placeholder="タイトル"><br>
                <textarea id="memo" cols="100" rows="50" placeholder="メモを入力してください..."></textarea>
                <br>
                <input type="button" value="保存" id="save">
                <br>
                <br>
                <div id="result"></div>
        </section>
        <script>
            $(document).ready(function (){                              // $(function(){}); でも同じ。こっちのが短縮形。これはHTMLが読み込まれた後処理開始しますよっていう記述。
                $('#save').click(function(){
                    $('#result').text('書き込み中...');
                    $.ajax({                                            // Ajaxでwrite.phpにデータ送信
                        url:'./write_db.php',
                        type:'post',                                    // POSTを指定し、送信
                        data:{                                          // 送信データ設定
                            "memo":$('#memo').val(),                    // 上記HTMLで入力された内容をデータとして送る。
                            "title":$("#title").val()                   // titleの入力値を取得
                        },
                        dataType:'json'                                 // JSON形式で送信する。
                    })
                    .done(function(){
                        $('#result').text('書き込み完了');
                        setTimeout((e)=>{
                            $('#result').text('');
                        },500)
                    })
                    .fail(function(data){
                        window.alert('なんかおかしいすよ。error:'.data);
                    });
                });
            });
        </script>
    </body>
</html>