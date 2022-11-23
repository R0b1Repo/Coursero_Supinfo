<?php

    function find_import($line){
            if (strpos($line, 'import') !== false) { //Test if 'import' is in line
                return False;
                }
        return True;
    }

    function find_if_is_path($line){
        /* Search for path in file*/
        $first_quote = strpos($line, '"');
        $last_quote = strpos($line, '"', $first_quote);
        $path = substr($line, $first_quote+1, $last_quote+1);

        if (startsWith($path, "/")) {  //Regex can be used here
            return True;
        }
        return False;
    }

    function startsWith( $line, $to_find ) {
        $length = strlen( $to_find );
        return substr( $line, 0, $length ) === $to_find;
    }

    function file_is_good($file){
        /* Security test to find if the program have good intentions */
        $input = fopen($file, "r");

        while(!feof($input)){
            $line = fgets($input)."<br>";
        
            if(find_import($line) == False){
                echo "No library are allowed !!!";
                return False;
            }
        
            if (find_if_is_path($line) == True) {
                echo "Path found";
                return False;
            }
            echo $line;
        }
        return True;
    }

    function test_prog($good_file, $user_file, $arg1, $arg2, $nb_good){ // Call the correction program
        $output1 = shell_exec("java $good_file $arg1 $arg2");
        $output2 = shell_exec("java $user_file $arg1 $arg2");
        if ($output1 == $output2) {
            return $nb_good++;
        }
        return $nb_good;
    }


/* Get arguments from command */
$good_file = $argv[1];
$user_file = $argv[2];

if (file_is_good($user_file)) {
    /* In Java, user'program and good program are first called,
    then, there results are comparated to set the grade */
    $nb_good=0;
    $nb_good = test_prog($good_file, $user_file, 1, 2, $nb_good);
    $nb_good = test_prog($good_file, $user_file, 10, 2, $nb_good);
    $nb_good = test_prog($good_file, $user_file, -1, 2, $nb_good);
    $nb_good = test_prog($good_file, $user_file, -1, -2, $nb_good);
    $nb_good = test_prog($good_file, $user_file, 545145, 2254754, $nb_good);

    $grade = ($nb_good/5)*100;
    echo $grade;

    //echo "\$grade = $grade <br>";
}
else {
    echo -1;
}




    /*function test_prog($file){
        $output = shell_exec("python3 $file");
        echo "\$output = $output";
    }*/

        //$cmd = escapeshellcmd("python $file");
       //echo "\$cmd = $cmd <br>";

/*   #([\/]([a-zA-z0-9]*[.]*){2,}){2,}#gm   
'#(^[^$|\s+])(([\/]?([.0-9]*[.]*){2,}){2,})#'
*/

    /*function test_prog($user_file){
        exec("python3 $user_file", $output, $ret_value);
        echo "\$ret_value = $ret_value";
    }*/
?>