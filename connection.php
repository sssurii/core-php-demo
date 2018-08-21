<?php
    require_once('header.php');
    $host = getenv('DB_HOST')? getenv('DB_HOST') : 'localhost';
    $dbname = getenv('DB_NAME')? getenv('DB_NAME') :'test_db';
    $user = getenv('DB_USER')? getenv('DB_USER') :'postgres';
    $password = getenv('DB_PASSWORD')? getenv('DB_PASSWORD') : 'postgres';
    $port = getenv('DB_PORT')? getenv('DB_PORT') : '5432';

    $conn = pg_connect("host=".$host." dbname=".$dbname." user=".$user." password=".$password." port=".$port);
    
    if(!$conn) {
        Rollbar::log(Level::info(), 'Test info message');
        throw new Exception('Test exception');
        echo 'There has been an error connecting';
        die;
    }

    $create_table = pg_query($conn, "CREATE TABLE IF NOT EXISTS test_data (
                                        id SERIAL PRIMARY KEY,
                                        content CHARACTER VARYING(255) NOT NULL,
                                        created_at DATE NOT NULL
                                    );");