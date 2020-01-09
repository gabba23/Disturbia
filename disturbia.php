<?php
/*
    Plugin Name: Disturbia
    Plugin URI:
    Description: Random disturbing fact generator using API
    Version: 13.2.012
    Author: Gabe and Dori
    Author URI:
    License: GPL2
*/


defined( 'ABSPATH' ) or die( 'Dont look im naked!' );


add_action("admin_notices", "select_fact");


add_action("admin_head", "fact_css");   

function select_fact() 
{
    $data = file_get_contents (esc_url('http://api.test/api/articles'));
    $title = json_decode($data);
    if ($title == true) 
    {     
         
        echo "<p id='title'><span>Fact: </span>" . $title->data[rand(1, 10)]->body . "</p>";
        //var_dump($data->data[0]->body);
    }
    
}

function fact_css() 
{
    echo "<style type='text/css'>#title {margin: 0; font-size: 16px;} #title span {color: blue;}</style> <br>"; {}
}

