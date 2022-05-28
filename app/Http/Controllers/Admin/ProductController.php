<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
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

        $products = Product::paginate(12);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Listar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Listar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['slug'] = Str::slug(mb_substr($data['title'], 0, 100));

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $name = $data['slug'] . '-' . time();
            $extenstion = $request->cover->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['cover'] = $nameFile;
            $upload = $request->cover->storeAs('products/cover', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        $product = Product::create($data);

        if ($product->save()) {
            return redirect()
                ->route('admin.products.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        $product = Product::where('id', $id)->first();

        if (empty($product->id)) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();

        $product = Product::where('id', $id)->first();

        if (empty($product->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $data['slug'] = Str::slug(mb_substr($data['title'], 0, 100));

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $name = $data['slug'] . '-' . time();
            $imagePath = storage_path() . '/app/public/products/cover/' . $product->cover;

            if (File::isFile($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->cover->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['cover'] = $nameFile;
            $upload = $request->cover->storeAs('products/cover', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        if ($product->update($data)) {
            return redirect()
                ->route('admin.products.index')
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
        if (!Auth::user()->hasPermissionTo('Excluir Produtos')) {
            abort(403, 'Acesso não autorizado');
        }

        $product = Product::where('id', $id)->first();

        if (empty($product->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($product->delete()) {
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
