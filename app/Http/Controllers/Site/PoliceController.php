<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Meta;

class PoliceController extends Controller
{
    public function index()
    {
        Meta::title('Fonte do Mel - Política de Privacidade');
        Meta::set('robots', 'index,follow');
        Meta::set('description', 'Política de Privacidade');
        Meta::set('image', asset('site/img/share.png'));
        return view('site.police.index');
    }
}
