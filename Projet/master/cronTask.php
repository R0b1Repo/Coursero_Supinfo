<?php

require "./correct_java.php";
require "./correct_python.php";
require "./db_cmd.php";


$db_host = $_ENV["DB_HOST"];
$db_name = $_ENV["DB_NAME"];
$db_user = $_ENV["DB_USER"];
$db_password = $_ENV["DB_PASSWORD"];
$submission_table = $_ENV["SUBMISSION_TABLE"];

$py_1 = "/corrections/correction_python_1.py";
$py_2 = "/corrections/correction_python_2.py";
$java_1 = "/corrections/correction_java_1.java";
$java_1 = "/corrections/correction_java_2.java";

/* Connect to DB */
try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
    echo $e->getMessage();
    echo "<br /><blockquote>This error is probably caused by a wrong database configuration. Check your .env file (username, password, database name, etc.)</blockquote>";
    exit();
}


/* get latest not corrected file */
$sql = "SELECT id, file_path FROM sumbission WHERE grade is null ORDER BY id ASC LIMIT 1"; /* OK */
$stmt = $db->prepare($sql);
try {
    $stmt->execute();    
} catch (PDOException $th) {
    echo $th->getMessage();
    echo "<br><lbockquote>Error when getting file to be corrected</lbockquote>";
    exit();
}
echo "From cron task $stmt";

/* Execute the correction depends on the language and the exercise */
if ($stmt["language"]=="Python") {
    if ($stmt["exercice_number"]==1) {
        $new_grade = shell_exec("correct_python.php $py_1 ".$stmt["file_path"]);
    }
    else {
        $new_grade = shell_exec("correct_python.php $py_2 ".$stmt["file_path"]);
    }
}
else {
    if ($stmt["exercice_number"]==1) {
        $new_grade = shell_exec("correct_java.php $java_1 ".$stmt["file_path"]);
    }
    else {
        $new_grade = shell_exec("correct_java.php $java_2 ".$stmt["file_path"]);
    }
}

/* Update the DB */
if ($new_grade == -1) {
    set_grade($stmt["id"], $new_grade);
}
else if ($new_grade >= $stmt["grade"]) {
    set_grade($stmt["id"], $new_grade);
}

?>