<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Meta;

class BeeController extends Controller
{
    public function index()
    {
        Meta::title('Fonte do Mel - Abelhas');
        Meta::set('robots', 'index,follow');
        Meta::set('description', 'Saiba mais sobre as abelhas!');
        Meta::set('image', asset('site/img/share.png'));
        $bees = Bee::paginate(6);
        return view('site.bees.index', compact('bees'));
    }

    public function item($slug)
    {
        $bee = Bee::where('slug', $slug)->first();
        if (empty($bee->id)) {
            abort(404, 'Página não encontrada');
        }

        $bee->views += 1;
        $bee->update();

        $bees = Bee::whereNotIn('id', [$bee->id])->inRandomOrder()->limit(3)->get();

        Meta::title("Fonte do Mel - {$bee->title}");
        Meta::set('robots', 'index,follow');
        Meta::set('description', "{$bee->headline}");
        Meta::set('image', Storage::url('bees/cover/' . $bee->cover));

        return view('site.bees.item', compact('bee', 'bees'));
    }
}
