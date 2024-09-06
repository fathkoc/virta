<?php

class Response {
    public static function send($content) {
       
        if (is_array($content) || is_object($content)) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($content);
        }
        
        elseif (is_string($content)) {
            header('Content-Type: text/plain; charset=utf-8');
            echo $content;
        }
      
        elseif (is_numeric($content)) {
            header('Content-Type: text/plain; charset=utf-8');
            echo $content;
        }
      
        else {
            header('Content-Type: text/plain; charset=utf-8');
            echo "Unsupported response type.";
        }
    }
}
