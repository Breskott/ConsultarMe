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
use LaravelLegends\PtBrValidator\Rules\FormatoCpf;

class UnitsRequest extends FormRequest
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
            'description' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'telefone_com_ddd', 'max:45'],
            'extension' => ['nullable', 'max:45'],
            'zip_code' => ['required', 'string', 'formato_cep', 'max:11'],
            'address' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:45'],
            'distric' => ['required', 'string', 'max:255'],
            'city_id' => ['required'],
            'complement' => ['nullable', 'max:150'],
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'Nome do Posto de Saúde',
            'phone' => 'Telefone',
            'extension' => 'Ramal',
            'zip_code' => 'CEP',
            'address' => 'Endereço',
            'number' => 'Número',
            'distric' => 'Bairro',
            'city_id' => 'Cidade',
            'complement' => 'Complemento',
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
