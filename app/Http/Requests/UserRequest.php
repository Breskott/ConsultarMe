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

class UserRequest extends FormRequest
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
    public static $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'cpf', 'min:11', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'celular_com_ddd', 'min:12'],
            'address' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'formato_cep',  'min:8', 'max:11'],
            'number' => ['required', 'string', 'max:10'],
            'distric' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'string', 'date'],
            'complement' => ['nullable', 'max:150'],
            'city_id' => ['required'],
    ];

    public function rules(): array
    {
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'cpf' => ['required', 'string', 'cpf', 'min:11'],
                    'password' => ['nullable'],
                    'phone' => ['required', 'string', 'celular_com_ddd', 'min:12'],
                    'address' => ['required', 'string', 'max:255'],
                    'zip_code' => ['required', 'string', 'formato_cep',  'min:8', 'max:11'],
                    'number' => ['required', 'string', 'max:10'],
                    'distric' => ['required', 'string', 'max:255'],
                    'birth_date' => ['required', 'string', 'date'],
                    'complement' => ['nullable', 'max:150'],
                    'city_id' => ['required'],
                ];
                break;

            default:
                $rules = self::$rules;
                break;
        }
        return $rules;
    }

    public static $attribute = [
            'name' => 'Nome Completo',
            'email' => 'E-mail',
            'cpf' => 'CPF',
            'password' => 'Senha',
            'phone' => 'Celular',
            'zip_code' => 'CEP',
            'address' => 'Endereço',
            'number' => 'Número',
            'distric' => 'Bairro',
            'city_id' => 'Cidade',
            'birth_date' => 'Data de Nascimento',
            'complement' => 'Complemento',
    ];

    public function attributes(): array
    {
        return self::$attribute;
    }

    public function messages()
    {
        return [

        ];
    }
}
