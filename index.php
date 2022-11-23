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
        Bienvenue sur Coursero. Fais un exercice et propose ton code pour le corriger !
    </header>

    <?php
        require "./exercices.php"
    ?>

    <form class="form">
        <label for="name" id="label_name">Nom</label>
        <input type="text" id="name" placeholder="John Doe">

        <label for="language" id="language">Langage</label>
        <select class="language" name="language">
            <option selected>Choose...</option>
            <option value="python">Python</option>
            <option value="java">Java</option>
        </select>

        <label for="ex_number" id="ex_number">Exercice</label>
        <select class="select_ex_number">
            <option selected>Choose...</option>
            <option value="1">Ex 1</option>
            <option value="2">Ex 2</option>
        </select>

        <label for="upload_file" id="upload_file">File</label>
        <input type="file" id="upload_file">

        <button type="submit" id="submit">Submit</button>
    </form>


    <div class="result">
        Les résultats sont là !
    </div>

    <form class="result_form">
        <label for="result_name" id="result_name">Name</label>
        <input type="text" id="result_name" placeholder="John Doe">

        <button type="submit" id="submit_results">Results !</button>
    </form>
</body>
</html>