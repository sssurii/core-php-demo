<?php
    $insert = false;
    if(isset($_POST['submit']) && !empty($_POST['content'])){
        $host = getenv('DB_HOST')? getenv('DB_HOST') : 'localhost';
        $dbname = getenv('DB_NAME')? getenv('DB_NAME') :'test_db';
        $user = getenv('DB_USER')? getenv('DB_USER') :'postgres';
        $password = getenv('DB_PASSWORD')? getenv('DB_PASSWORD') : 'postgres';
        $port = getenv('DB_PORT')? getenv('DB_PORT') : '5432';

        $conn = pg_connect("host=".$host." dbname=".$dbname." user=".$user." password=".$password." port=".$port);
        if(!$conn) {
            echo 'There has been an error connecting';
            die;
        }

        $create_table = pg_query($conn, "CREATE TABLE IF NOT EXISTS test_data (
                                            id SERIAL PRIMARY KEY,
                                            content CHARACTER VARYING(255) NOT NULL,
                                            created_at DATE NOT NULL
                                        );");
        $insert = pg_query($conn, "INSERT INTO test_data (content, created_at) VALUES('".strip_tags($_POST['content'])."', '".date('Y-m-d H:i:s')."')");
    }
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP Demo</title>
</head>

<body >
    <?php 
      if($insert){
        echo 'Record added successfully! <br> <a href="/show.php" title="Show"> Check it</a>';
      }
    ?>
    <form action="" method="POST">
        <input type="text" name="content" placeholder="Add something here">
        <button type="submit" name="submit" value="submit">Save</button>
    </form>
</body>

</html>