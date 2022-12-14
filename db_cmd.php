<?php

$db_name = $_ENV["DB_NAME"];
$db_user = $_ENV["DB_USER"];
$db_password = $_ENV["DB_PASSWORD"];

$submission_table = $_ENV["SUBMISSION_TABLE"];

function add_user(){ 
    $db_host = $GLOBALS['db_host'];
    $db_name = $GLOBALS['db_name'];
    $db_user = $GLOBALS['db_user'];
    $db_pass = $GLOBALS['db_pass'];
    $submission_table = $GLOBALS['submission_table'];
    
    $user_name = $_POST["name"];
    $user_language = $_POST["language"];
    $user_ex_number = $_POST["ex_number"];
    $user_upload_file = $_POST["upload_file"];
    
    $user_new_path = $_ENV["SUBMISSION_PATH"].$user_upload_file; /*TODO*/

    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "<br /><blockquote>This error is probably caused by a wrong database configuration. Check your .env file (username, password, database name, etc.)</blockquote>";
        exit();
    }

    $sql = "INSERT INTO $submission_table (name, language, exercice_number, path) VALUES (:user_name, :user_language, :user_ex_number, :user_new_path)"; /*  SQL OK */
    $stmt = $db->prepare($sql);

    /* add row to table*/
    try {
        $stmt->execute(['user_name' => $user_name,
                        'user_language' => $user_language,
                        'user_ex_number' => $user_ex_number,
                        'user_new_path' => $user_new_path]);
    } catch (PDOException $th) {
        echo $th->getMessage();
        echo "<br><lbockquote>Submission failed</lbockquote>";
        exit();
    }
}


function set_grade($user_idp, $gradep){
    /* Get usefull variables */
    $db_host = $GLOBALS['db_host'];
    $db_name = $GLOBALS['db_name'];
    $db_user = $GLOBALS['db_user'];
    $db_pass = $GLOBALS['db_pass'];

    $submission_table = $_ENV["SUBMISSION_TABLE"];

    /* Open connection to DB */
    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "<br /><blockquote>This error is probably caused by a wrong database configuration. Check your .env file (username, password, database name, etc.)</blockquote>";
        exit();
    }


    /* update grade after correction*/
    $sql = "UPDATE $submission_table SET grade=:grade WHERE id=:user_id";
    $stmt = $db->prepare($sql);  // Prepare statement avoid SQL injections
    try {
        $stmt->execute(['grade' => $gradep, 'user_id' => $user_idp]);
    } catch (PDOException $th) {
        echo $th->getMessage();
        echo "<br><lbockquote>Updating grade error</lbockquote>";
        exit();
    }
}


function get_user_infos($user_name){
    $db_host = $GLOBALS['db_host'];
    $db_name = $GLOBALS['db_name'];
    $db_user = $GLOBALS['db_user'];
    $db_pass = $GLOBALS['db_pass'];

    $submission_table = $_ENV["SUBMISSION_TABLE"];


    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "<br /><blockquote>This error is probably caused by a wrong database configuration. Check your .env file (username, password, database name, etc.)</blockquote>";
        exit();
    }


    /* update grade after correction*/
    $sql = "SELECT grade, language, exercice_number, date_time, file_path name FROM $submission_table where name=:name"; /* SQL OK */
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute(['name' => $user_name]);
    } catch (PDOException $th) {
        echo $th->getMessage();
        echo "<br><lbockquote>Updating grade error</lbockquote>";
        exit();
    }
    echo "echo from db_cmd.php function get_user_info $stmt";
    return $stmt;
}
?>