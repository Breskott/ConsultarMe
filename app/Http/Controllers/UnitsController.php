<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 14/11/2021
 * Time: 17:31
 */
namespace App\Http\Controllers;

use App\Models\Units;
use App\Http\Requests\UnitsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $units = Units::orderBy('id', 'desc')->paginate(15);

        return view('units.index')->with(['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UnitsRequest $request)
    {
        try {
            DB::beginTransaction();

            $units = Units::create([
                'description' => ucfirst(request('description')),
                'phone' => request('phone'),
                'zip_code' => request('zip_code'),
                'address' => request('address'),
                'number' => request('number'),
                'distric' => request('distric'),
                'city_id' => request('city_id'),
                'complement' => request('complement'),
                'extension' => request('extension'),
            ]);

            DB::commit();

            toastr()->success(__('Posto de Saúde salvo com sucesso!'));

            return redirect()->route('units.index');

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
    public function update(UnitsRequest $request, $id)
    {
        $units = Units::find($id);

        if (is_null($units)) {
            abort(404, __('Posto de Saúde não encontrado!'));
        }

        try {
            DB::beginTransaction();

            $units->fill([
                'description' => ucfirst(request('description')),
                'phone' => request('phone'),
                'zip_code' => request('zip_code'),
                'address' => request('address'),
                'number' => request('number'),
                'distric' => request('distric'),
                'city_id' => request('city_id'),
                'complement' => request('complement') == "" ? "" : request('complement'),
                'extension' =>  request('extension') == "" ? "" : request('extension'),
            ]);
            $units->save();

            DB::commit();

            toastr()->success(__('Posto de Saúde salvo com sucesso!'));

            return redirect()->route('units.index');

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
        $units = Units::find($id);

        if (is_null($units)) {
            abort(404, __('Posto de Saúde não encontrado!'));
        }

        return view('units.edit', [
            'units' => $units
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
        $units = Units::find($id);
        $units->delete();

        toastr()->success(__('Posto de Saúde excluído com sucesso!'));

        return back();
    }
}
