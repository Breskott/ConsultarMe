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
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;
use PDF;

class MedicalAppointmentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){

        if ($request->has('filter')) {
            $medical_appointments = QueryBuilder::for(MedicalAppointment::class)
                ->allowedFilters('medical_appointment.tab_number', 'user.name', 'examSpecialty.description')
                ->orderBy('schedule_datetime', 'desc')
                ->paginate(15);

            return view('medical_appointments.index')->with(['medical_appointments' => $medical_appointments]);
        }
        else {
            $medical_appointments = MedicalAppointment::orderBy('schedule_datetime', 'desc')->paginate(15);

            return view('medical_appointments.index')->with(['medical_appointments' => $medical_appointments]);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexPatients(Request $request){
         //dd(Auth::user()->id);
        if ($request->has('filter')) {
            $medical_appointments = QueryBuilder::for(MedicalAppointment::class)
                ->allowedFilters('medical_appointment.tab_number', 'examSpecialty.description')
                ->orderBy('schedule_datetime', 'desc')
                ->where("patient_id", "=", Auth::user()->id)
                ->paginate(15);

            return view('medical_appointments_user.index')->with(['medical_appointments' => $medical_appointments]);
        }
        else {
            $medical_appointments = MedicalAppointment::where("patient_id", "=", Auth::user()->id)->orderBy('schedule_datetime', 'desc')->paginate(15);
            return view('medical_appointments_user.index')->with(['medical_appointments' => $medical_appointments]);
        }
    }

    public function showPatients($id)
    {
        $medical_appointments = MedicalAppointment::where([
            ["patient_id", "=", Auth::user()->id],
            ["id", "=", $id]
        ])->first();

        if (is_null($medical_appointments)) {
            abort(404, __('Consulta não encontrada!'));
        }

        return view('medical_appointments_user.show', [
            'medical_appointments' => $medical_appointments
        ]);
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
        try {
            // Date format
            $dateFormat = Carbon::createFromFormat('d/m/Y H:i', $request->schedule_datetime)->format('Y-m-d H:i:s');

            // Files
            if (!empty($request['files'])) {
                $name = uniqid(date('HisYmd'), false);
                $extension = $request['files']->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $request['files']->storeAs('files', $nameFile, 'public');
            }
            else {
                $nameFile = "";
            }
            DB::beginTransaction();

            $exams = MedicalAppointment::create([
                'patient_id' => request('patient_id'),
                'exam_speciality_id' => request('exam_speciality_id'),
                'doctor_id' => request('doctor_id'),
                'units_id' => request('units_id'),
                'tab_number' => request('tab_number'),
                'schedule_datetime' => $dateFormat,
                'tab_central_vacancy' => request('tab_central_vacancy'),
                'comments' => request('comments'),
                'files' => $nameFile,
                'address' => request('address'),
                'number' => request('number'),
                'distric' => request('distric'),
                'city_id' => request('city_id'),
            ]);

            DB::commit();

            toastr()->success(__('Consulta salva com sucesso!'));

            return redirect()->route('medical_appointments.index');

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
     * @return \Illuminate\Http\Response
     */
    public function update(MedicalAppointmentRequest $request, $id)
    {

        $exams = MedicalAppointment::find($id);

        if (is_null($exams)) {
            abort(404, __('Consulta não encontrada!'));
        }

        try {
            $dateFormat = Carbon::createFromFormat('d/m/Y H:i', $request->schedule_datetime)->format('Y-m-d H:i:s');

            DB::beginTransaction();

            // Upload files
            if (!empty($request['files'])) {
                $name = uniqid(date('HisYmd'), false);
                $extension = $request['files']->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $request['files']->storeAs('files', $nameFile, 'public');
            }
            else {
                $nameFile = $exams->files;
            }

            $exams->fill([
                'patient_id' => request('patient_id'),
                'exam_speciality_id' => request('exam_speciality_id'),
                'doctor_id' => request('doctor_id'),
                'units_id' => request('units_id'),
                'tab_number' => request('tab_number'),
                'schedule_datetime' => $dateFormat,
                'tab_central_vacancy' => request('tab_central_vacancy'),
                'comments' => request('comments'),
                'files' => $nameFile,
                'address' => request('address'),
                'number' => request('number'),
                'distric' => request('distric'),
                'city_id' => request('city_id'),
            ]);
            $exams->save();

            DB::commit();

            toastr()->success(__('Consulta salva com sucesso!'));

            return redirect()->route('medical_appointments.index');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Generate PDF Consult
     * @param $id
     */
    public function generatePDF($id){

        if ((Auth::user()->is_permission == 1) || (Auth::user()->is_permission == 2)){
            $medical_appointments = MedicalAppointment::find($id);
        }
        else {
            $medical_appointments = MedicalAppointment::where([
                ["patient_id", "=", Auth::user()->id],
                ["id", "=", $id]
            ])->first();

        }

        if (is_null($medical_appointments)) {
            abort(404, __('Consulta não encontrada!'));
        }

        $nameFile = $medical_appointments->tab_number;

//        return view('reports.pdf')->with(['medical_appointments' => $medical_appointments]);
        $pdf = PDF::loadView('reports.pdf', ['medical_appointments' => $medical_appointments]);
        return $pdf->stream($nameFile, array('Attachment'=>0));
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
