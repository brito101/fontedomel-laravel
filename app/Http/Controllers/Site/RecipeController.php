<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Meta;

class RecipeController extends Controller
{
    public function index()
    {
        Meta::title('Fonte do Mel - Receitas');
        Meta::set('robots', 'index,follow');
        Meta::set('description', 'Receitas Maravilhosas com Mel!');
        Meta::set('image', asset('site/img/share.png'));
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(6);
        return view('site.recipes.index', compact('recipes'));
    }

    public function item($slug)
    {
        $recipe = Recipe::where('slug', $slug)->first();
        if (empty($recipe->id)) {
            abort(404, 'Página não encontrada');
        }

        $recipe->views += 1;
        $recipe->update();

        $recipes = Recipe::whereNotIn('id', [$recipe->id])->inRandomOrder()->limit(3)->get();

        Meta::title("Fonte do Mel - {$recipe->title}");
        Meta::set('robots', 'index,follow');
        Meta::set('description', "{$recipe->headline}");
        Meta::set('image', Storage::url('recipes/cover/' . $recipe->cover));

        return view('site.recipes.item', compact('recipe', 'recipes'));
    }
}
