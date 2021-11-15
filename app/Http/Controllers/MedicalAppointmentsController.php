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
}
