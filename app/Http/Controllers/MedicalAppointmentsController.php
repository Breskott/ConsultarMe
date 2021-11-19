<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 15/11/2021
 * Time: 18:02
 */
namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\ExamSpecialty;
use App\Models\MedicalAppointment;
use App\Http\Requests\MedicalAppointmentRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MedicalAppointmentRequest $request)
    {
        dd($request);
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
