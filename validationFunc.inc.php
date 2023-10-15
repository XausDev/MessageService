<?php
function validateEmpty($to, $subject, $content){
    if(empty($to & $subject & $content)) {
        return false;
      }
      return true;
}