<?php

    function find_import($line){
            if (strpos($line, 'import') !== false) {
                return False;
                }
        return True;
    }

    function find_if_is_path($line){
        $first_quote = strpos($line, '"');
        $last_quote = strpos($line, '"', $first_quote);
        $path = substr($line, $first_quote+1, $last_quote+1);
        echo "\$path =".$path."<br>";
        /*$path a la bonne valeur*/

        if (startsWith($path, "/")) {
            //echo "True";
            return True;
        }
        //echo "False";
        return False;
    }

    function startsWith( $line, $to_find ) {
        $length = strlen( $to_find );
        return substr( $line, 0, $length ) === $to_find;
    }


    function file_is_good($file){
        $input = fopen($file, "r");

        while(!feof($input)){
            $line = fgets($input)."<br>";
        
            if(find_import($line) == False){
                //echo "No library are allowed !!!";
                return False;
            } /*this works*/
        
            if (find_if_is_path($line) == True) {
                //echo "Path found";
                return False;
            } /*this works*/
            //echo $line;
        }
        return True;
    }


/* Get arguments from command */
$good_file = $argv[1];
$user_file = $argv[2];

if (file_is_good($user_file)) {
    //test_prog($good_file);
    $output = shell_exec("python3 $good_file $user_file");  
    echo $output;
}
else {
    echo -1;
}





        //$cmd = escapeshellcmd("python $file");
       //echo "\$cmd = $cmd <br>";

/*   #([\/]([a-zA-z0-9]*[.]*){2,}){2,}#gm   
'#(^[^$|\s+])(([\/]?([.0-9]*[.]*){2,}){2,})#'
*/

    /*function test_prog($user_file){
        exec("python3 $user_file", $output, $ret_value);
        echo "\$ret_value = $ret_value";
    }*/

        /*function test_prog($file){
        $output = shell_exec("python3 $file");
        echo "\$output = $output";
    }*/

?>