<?php
function escape($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
function decode_string($string){
    return html_entity_decode($string, ENT_QUOTES, 'UTF-8');
}