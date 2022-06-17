<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Page;
use App\Models\Client;
use App\Models\Font;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;

class ApiController extends Controller
{   
    public function clients(){
        $client = Client::where('is_delete','!=', 1)->get();
        return $client;
    }
    public function fonts(){
        $font = Font::where('is_delete','!=', 1)->get();
        return $font;
    }
    public function pages(){
        $page = Page::get();
        return $page;
    }
    public function services(){
        $service = Service::where('is_delete','!=', 1)->get();
        return $service;
    }
    public function settings(){
        $setting = Setting::get();
        return $setting;
    }
    public function users(){
        $user = User::get();
        return $user;
    }
}
