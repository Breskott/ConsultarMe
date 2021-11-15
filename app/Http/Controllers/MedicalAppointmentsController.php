<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 15/11/2021
 * Time: 18:02
 */
namespace App\Http\Controllers;

use App\Models\MedicalAppointment;
use App\Http\Requests\ExamSpecialtyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalAppointmentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $medical_appointments = MedicalAppointment::orderBy('id', 'desc')->paginate(15);

        return view('medical_appointments.index')->with(['medical_appointments' => $medical_appointments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medical_appointments.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medical_appointments = MedicalAppointment::find($id);

        if (is_null($medical_appointments)) {
            abort(404, __('Consulta não encontrada!'));
        }

        return view('medical_appointments.edit', [
            'medical_appointments' => $medical_appointments
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
        $medical_appointments = MedicalAppointment::find($id);
        $medical_appointments->delete();

        toastr()->success(__('Consulta excluída com sucesso!'));

        return back();
    }
}
