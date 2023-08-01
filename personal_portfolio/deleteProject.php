<?php
    include './functions.php';
    is_authorised(['admin']);
    include './classes/connectdb.php';
    include './classes/databaseQueries.php';

    $query = "DELETE FROM projects WHERE id = " . $_GET["id"] . "";
    var_dump($query);
    // var_dump($_GET);exit;
    if(mysqli_query($conn, $query)){
        header("Location: index.php?content=message&alert=deleteProject-success");
    }else{
        // var_dump($conn);exit();
        header("Location: index.php?content=message&alert=deleteProject-error");
    }

    mysqli_close($conn);