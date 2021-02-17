<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HelperController extends Controller
{
    
    public $public_page_settings = [
        
        'css'   => [
            
                   
                    '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css',
                    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',

                    '/css/style.css',
                    // '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css',
          
              
            
        ],
        'js'    => [
                    
                    '//code.jquery.com/jquery-1.11.3.min.js',
                    // '//code.jquery.com/ui/1.11.3/jquery-ui.min.js',
                    '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js',

                    
        ]
    ];
    
}