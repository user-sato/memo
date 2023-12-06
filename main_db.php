<?php
    $dsn = 'mysql:dbname=memo;host=localhost;charset=utf8';
    $user = 'root';
    $pass = '';

    $dbh = new PDO($dsn,$user,$pass);

    try{
        
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // 条件セット
        $sql = "SELECT mamoid,title FROM memodata;";                  // SQL文
        $stmt = $dbh->prepare($sql);                                  // SQLセット
        $stmt->execute();                                             // SQL実行

        $rec = $stmt->fetchAll();

        $dbh = null;                                                  // DB切断

        echo json_encode($rec);                                      // 取得データの返却
    }catch(Exception $e){
        print 'エラーっす。エラー：'.$e->getMessage();
        echo json_encode($e->getMessage());                           // 取得データの返却
    }
    exit;
?>