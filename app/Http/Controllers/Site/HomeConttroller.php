<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use stdClass;
use Meta;

class HomeConttroller extends Controller
{
    public function index()
    {
        Meta::title('Fonte do Mel - Produtos das Abelhas');
        Meta::set('robots', 'index,follow');
        Meta::set('description', 'Aqui na Fonte do Mel você encontra produtos derivados de abelhas, tais como como mel, cera, própolis, pólen, geleia real e apitoxina. Desfrute destes benefícios!');
        Meta::set('image', asset('site/img/share.png'));

        $products = Product::get()->take(3);
        return view('site.home.index', compact('products'));
    }
}
