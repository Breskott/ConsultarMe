<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 14/11/2021
 * Time: 16:59
 */
namespace App\Http\Controllers;

use App\Models\Cities;
use App\Http\Requests\CitiesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $cities = Cities::orderBy('id', 'desc')->paginate(15);

        return view('cities.index')->with(['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CitiesRequest $request)
    {
        try {
            DB::beginTransaction();

            $cities = Cities::create([
                'description' => ucfirst(request('description')),
                'state' => request('state'),
            ]);

            DB::commit();

            toastr()->success(__('Cidade salva com sucesso!'));

            return redirect()->route('cities.index');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CitiesRequest $request, $id)
    {
        $cities = Cities::find($id);

        if (is_null($cities)) {
            abort(404, __('Cidade não encontrada!'));
        }

        try {
            DB::beginTransaction();

            $cities->fill([
                'description' => ucfirst(request('description')),
                'state' => request('state'),
            ]);
            $cities->save();

            DB::commit();

            toastr()->success(__('Cidade salva com sucesso!'));

            return redirect()->route('cities.index');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
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
        $cities = Cities::find($id);

        if (is_null($cities)) {
            abort(404, __('Cidade não encontrada!'));
        }

        return view('cities.edit', [
            'cities' => $cities
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = Cities::find($id);
        $cities->delete();

        toastr()->success(__('Cidade excluída com sucesso!'));

        return back();
    }
}
