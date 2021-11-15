<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 17/10/2021
 * Time: 21:18
 */
namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\DoctorsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $doctors = Doctor::orderBy('id', 'desc')->paginate(15);

        return view('doctors.index')->with(['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DoctorsRequest $request)
    {
        try {
            DB::beginTransaction();

            $doctors = Doctor::create([
                'name' => ucfirst(request('name')),
                'crm' => request('crm'),
            ]);

            DB::commit();

            toastr()->success(__('Médico salvo com sucesso!'));

            return redirect()->route('doctors.index');

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
    public function update(DoctorsRequest $request, $id)
    {
        $doctors = Doctor::find($id);

        if (is_null($doctors)) {
            abort(404, __('Médico não encontrado!'));
        }

        try {
            DB::beginTransaction();

            $doctors->fill([
                'name' => ucfirst(request('name')),
                'crm' => request('crm'),
            ]);
            $doctors->save();

            DB::commit();

            toastr()->success(__('Médico salvo com sucesso!'));

            return redirect()->route('doctors.index');

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
        $doctors = Doctor::find($id);

        if (is_null($doctors)) {
            abort(404, __('Médico não encontrado!'));
        }

        return view('doctors.edit', [
            'doctors' => $doctors
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
        $doctors = Doctor::find($id);
        $doctors->delete();

        toastr()->success(__('Médico excluído com sucesso!'));

        return back();
    }
}
