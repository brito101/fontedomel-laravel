<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BeeRequest;
use App\Models\Bee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('Listar Abelhas')) {
            abort(403, 'Acesso não autorizado');
        }

        $bees = Bee::paginate(12);
        return view('admin.bees.index', compact('bees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Abelhas')) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.bees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeeRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Abelhas')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['slug'] = Str::slug(mb_substr($data['title'], 0, 100)) . '-' . time();

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $name = $data['slug'];
            $extenstion = $request->cover->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['cover'] = $nameFile;
            $upload = $request->cover->storeAs('bees/cover', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        $bee = Bee::create($data);

        if ($bee->save()) {
            return redirect()
                ->route('admin.bees.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Abelhas')) {
            abort(403, 'Acesso não autorizado');
        }

        $bee = Bee::where('id', $id)->first();

        if (empty($bee->id)) {
            abort(403, 'Acesso não autorizado');
        }

        return view('admin.bees.edit', compact('bee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BeeRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Abelhas')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();

        $bee = Bee::where('id', $id)->first();

        if (empty($bee->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $data['slug'] = Str::slug(mb_substr($data['title'], 0, 100)) . '-' . time();

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $name = $data['slug'];
            $imagePath = storage_path() . '/app/public/bees/cover/' . $bee->cover;

            if (File::isFile($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->cover->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['cover'] = $nameFile;
            $upload = $request->cover->storeAs('bees/cover', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        if ($bee->update($data)) {
            return redirect()
                ->route('admin.bees.index')
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
        if (!Auth::user()->hasPermissionTo('Excluir Abelhas')) {
            abort(403, 'Acesso não autorizado');
        }

        $bee = Bee::where('id', $id)->first();

        if (empty($bee->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($bee->delete()) {
            return redirect()
                ->route('admin.bees.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
