<?php

namespace App\Helpers;

class EnqueueScripts
{
    public $header = [];
    public $footer = [];

    public function __construct()
    {
        switch(request()->route()->getName()) {
            case 'home':
            case 'login':
            case 'register':
            case 'password.request':
            case 'password.reset':
                $this->header['styles'] = [
                'css/bootstrap.min.css',
                'css/icomoon-social.css',
                'http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800',
                'css/leaflet.css',
                'css/main.css',
                ];

                $this->header['scripts'] = [
                'js/modernizr-2.6.2-respond-1.1.0.min.js',
                ];

                $this->footer = [
                'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
                'js/jquery-1.9.1.min.js',
                'js/bootstrap.min.js',
                'http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js',
                'js/jquery.fitvids.js',
                'js/jquery.sequence-min.js',
                'js/jquery.bxslider.js',
                'js/main-menu.js',
                'js/template.js',
                ];
                break;
        } //endswitch
    }
}
