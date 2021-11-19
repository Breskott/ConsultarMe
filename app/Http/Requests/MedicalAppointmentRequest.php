<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 14/11/2021
 * Time: 15:25
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MedicalAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_id' => ['required'],
            'exam_speciality_id' => ['required'],
            'doctor_id' => ['required'],
            'units_id' => ['required'],
            'schedule_datetime' => ['required'],
            'tab_number' => ['required', 'string', 'max:45'],
            'tab_central_vacancy' => ['required', 'max:1'],
            'address' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:45'],
            'distric' => ['required', 'string', 'max:255'],
            'city_id' => ['required'],
            'files' => ['nullable'],
            'comments' => ['nullable', 'string', 'max:8000']
        ];
    }

    public function messages()
    {
        return [

        ];
    }

    public function attributes(){
        return [
            'patient_id' => 'Paciente',
            'exam_speciality_id' => 'Exame/Especialidade',
            'doctor_id' => 'Médico',
            'units_id' => 'Posto de Saúde',
            'tab_number' => 'Número da Guia',
            'schedule_datetime'  => 'Data e Hora Consulta',
            'tab_central_vacancy' => 'Central de Vagas',
            'comments' => 'Comentários',
            'address' => 'Endereço',
            'number' => 'Número',
            'distric' => 'Bairro',
            'city_id' => 'Cidade',
            'files' => 'Arquivo',
        ];
    }
}
