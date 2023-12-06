<?php
            try{
                $memo = $_POST['memo'];
                $title = $_POST['title'];
                $host = 'mysql:dbname=memo;host=localhost;charset=utf8';
                $user = 'root';
                $pass = '';
                $dbh = new PDO($host,$user,$pass);
    
                $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                if($title == ''){                             // titleがなかったら
                    $sql = 'INSERT INTO memodata(userid,memotime,memodata) VALUES(1,now(),"'.$memo.'");';    
                                                              // titleがDBのdefaultになるSQL
                }else{                                        // titleがあったら
                    $sql = 'INSERT INTO memodata(userid,memotime,title,memodata) VALUES(1,now(),"'.$title.'","'.$memo.'");';
                                                              // titleを設定してDB登録
                }
                $stmt = $dbh->prepare($sql);                 // SQL準備
                $stmt->execute();                            // SQL実行
                $dbh = null;                                 // DB切断

                // print '<script>
                //           document.getElementById("wait").in
                //           nerHTML = "登録が完了しました！";
                //        </script>';
                // print '<input type="button" value="戻る" onclick="history.back()">';

                header("Content-Type: application/json; charset=UTF-8"); //ヘッダー情報の明記。必須。
                $ret = json_encode('OK');                                // 戻り値設定。
                echo $ret;                                               // 戻り値を返却。

            }catch(Exception $e){
                echo json_encode($e->getMessage());
                
            }  
            exit;
?>