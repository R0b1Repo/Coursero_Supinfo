<?php
    require "./db_cmd.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Coursero</title>
</head>
<body>
    <header class="header">
        <b><p>Welcome on Coursero !</p><p>Code an exercise and upload your answer to correct it !</p></b>
    </header>

    <?php
        require "./exercices.php"
    ?>

    <form class="form" method="POST" action="add_user()">
        <fieldset class="fieldset-form-1">
            <legend class="legend-form-1">Submit your work here</legend>

            <div class="group-input">
                <label for="name" id="label_name">Name</label>
                <input type="text" id="name" placeholder="John Doe">
            </div>

            <div class="group-input">
                <label for="language" id="language">Language</label>
                <select class="language" name="language">
                    <option selected>Choose...</option>
                    <option value="python">Python</option>
                    <option value="java">Java</option>
                </select>
            </div>

            <div class="group-input">
                <label for="ex_number" id="ex_number">Exercise</label>
                <select class="select_ex_number" id="ex_number">
                    <option selected>Choose...</option>
                    <option value="1">Ex 1</option>
                    <option value="2">Ex 2</option>
                </select>
            </div>

            <div class="group-input">
                <label for="upload_file" id="upload_file">File</label>
                <input type="file" id="upload_file">
            </div>

            <div class="group-input">
                <button type="submit" id="submit">Submit</button>
            </div>
        </fieldset>
    </form>

    <form class="result_form" method="POST" action="./display_result.php">
        <fieldset class="fieldset-form-2">
            <legend class="legeng-form-1">Get you results here</legend>

        <div class="group-input">
            <label for="result_name" id="result_name">Name</label>
            <input type="text" id="result_name" placeholder="John Doe">
        </div>

        <div class="group-input">
            <button type="submit" id="submit_results">Results !</button>
        </div>
        </fieldset>
    </form>
</body>
</html>