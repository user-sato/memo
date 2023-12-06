<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>メモ一覧</title>
        <meta charset="utf8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    </head>
    <body>
        <header>

        </header>
        <nav>
            <form action="./main_db.php" method="post">
                <ul id="memotop">
                    <script>
                        function memoout(data,checkCnt){
                            let getSlect = document.getElementById('memotop');           // 親要素取得
                            let element1 = document.createElement('li');                 // 追加する子要素生成(li)
                        
                            element1.innerHTML = '<input type="checkbox" name=check[]" value="'+checkCnt+'">'+data;
                                                                                         // 子要素内のデータ設定
                            getSlect.insertBefore(element1, null);                       // 親要素へ子要素追加
                        
                            //document.getElementById('memotop').innerHTML = '<li>'+ data +'</li>';
                        }
                    </script>
                </ul>
                <input type="submit" name="delete" id="delete" value="削除">
            </form>
        </nav>
        <script>
            $(function(){
                $.ajax({
                    type:'post',
                    url:'./main_db.php',
                    dataType:'json'
                })
                .done(function(data){
                    console.log(data);
                    console.log(data[1].mamoid);
                    for(let i=0;i < data.length;i++){
                        memoout(data[i].title,data[i].mamoid);
                    }
                })
                .fail(function(data){

                });
            });
        </script>
    </body>
</html>