<?php

namespace App\Controllers;
require_once '../app/Responses/Response.php';


class BaseController {
    public function view($viewPath, $data = []) {
        
        extract($data);
        
       
        ob_start(); 
        require "../app/Views/" . $viewPath;
        $content = ob_get_clean(); 
 
       //views to data 
        return $content;
    }

    
    public function response($content) {
        // fotmatted data
        \Response::send($content);
    }
}
