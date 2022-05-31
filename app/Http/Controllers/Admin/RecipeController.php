<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RecipeRequest;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('Listar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        $recipes = Recipe::paginate(12);
        return view('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Receitas')) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Receitas')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['slug'] = Str::slug(mb_substr($data['title'], 0, 100)) . '-' . time();

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $name = $data['slug'];
            $extenstion = $request->cover->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['cover'] = $nameFile;
            $upload = $request->cover->storeAs('recipes/cover', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        $recipe = Recipe::create($data);

        if ($recipe->save()) {
            return redirect()
                ->route('admin.recipes.index')
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Receitas')) {
            abort(403, 'Acesso não autorizado');
        }

        $recipe = Recipe::where('id', $id)->first();

        if (empty($recipe->id)) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Receitas')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();

        $recipe = Recipe::where('id', $id)->first();

        if (empty($recipe->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $data['slug'] = Str::slug(mb_substr($data['title'], 0, 100)) . '-' . time();

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $name = $data['slug'];
            $imagePath = storage_path() . '/app/public/recipes/cover/' . $recipe->cover;

            if (File::isFile($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->cover->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['cover'] = $nameFile;
            $upload = $request->cover->storeAs('recipes/cover', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        if ($recipe->update($data)) {
            return redirect()
                ->route('admin.recipes.index')
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasPermissionTo('Excluir Receitas')) {
            abort(403, 'Acesso não autorizado');
        }

        $recipe = Recipe::where('id', $id)->first();

        if (empty($recipe->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($recipe->delete()) {
            return redirect()
                ->route('admin.recipes.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
