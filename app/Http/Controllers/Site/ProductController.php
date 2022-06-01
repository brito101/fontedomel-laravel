<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;
use Meta;

class ProductController extends Controller
{
    public function index()
    {
        Meta::title('Fonte do Mel - Produtos');
        Meta::set('robots', 'index,follow');
        Meta::set('description', 'Confira nossos produtos!');
        Meta::set('image', asset('site/img/share.png'));
        $products = Product::paginate(6);
        return view('site.products.index', compact('products'));
    }

    public function item($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (empty($product->id)) {
            abort(404, 'Página não encontrada');
        }

        $product->views += 1;
        $product->update();

        $products = Product::whereNotIn('id', [$product->id])->get()->take(3);

        Meta::title("Fonte do Mel - {$product->title}");
        Meta::set('robots', 'index,follow');
        Meta::set('description', "{$product->headline}");
        Meta::set('image', Storage::url('products/cover/' . $product->cover));

        return view('site.products.item', compact('product', 'products'));
    }
}
