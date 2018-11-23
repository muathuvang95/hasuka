<?php
/*
 Cung cấp cá hàm dùng chung
 */
function spsdev_boolval($var) {
  # '1','-1','1.1','2','true' => true
  # '','0.0','0','false' => false
  return (bool)json_decode(strtolower($var));
}

function format_content($raw_string) {
  return do_shortcode( shortcode_unautop( wpautop( $raw_string ) ) );
}

function unautop($s) {
    //remove any new lines already in there
    $s = str_replace("\n", "", $s);

    //remove all <p>
    $s = str_replace("<p>", "", $s);

    //replace <br /> with \n
    $s = str_replace(array("<br />", "<br>", "<br/>"), "", $s);

    //replace </p> with \n\n
    $s = str_replace("</p>", "", $s);       

    return $s;      
}

function debug($var) {
  echo '<pre>'.print_r($var, true).'</pre>';
}
