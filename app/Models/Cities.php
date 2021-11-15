<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $description
 * @property string $state
 * @property Unit[] $units
 * @property User[] $users
 */
class Cities extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['description', 'state'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function units()
    {
        return $this->hasMany(Units::class, 'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'city_id');
    }

    public function getState($state)
    {
        switch ($state) {
            case "AC":
                return "Acre";
            case "AL":
                return "Alagoas";
            case "AP":
                return "Amapá";
            case "AM":
                return "Amazonas";
            case "BA":
                return "Bahia";
            case "CE":
                return "Ceará";
            case "DF":
                return "Distrito Federal";
            case "ES":
                return "Espírito Santo";
            case "GO":
                return "Goiás";
            case "MA":
                return "Maranhão";
            case "MT":
                return "Mato Grosso";
            case "MS":
                return "Mato Grosso do Sul";
            case "MG":
                return "Minas Gerais";
            case "PA":
                return "Pará";
            case "PB":
                return "Paraíba";
            case "PR":
                return "Paraná";
            case "PE":
                return "Pernambuco";
            case "PI":
                return "Piauí";
            case "RJ":
                return "Rio de Janeiro";
            case "RN":
                return "Rio Grande do Norte";
            case "RS":
                return "Rio Grande do Sul";
            case "RO":
                return "Rondônia";
            case "RR":
                return "Roraima";
            case "SC":
                return "Santa Catarina";
            case "SP":
                return "São Paulo";
            case "SE":
                return "Sergipe";
            case "TO":
                return "Tocantins";
            default:
                return "Estado não encontrado!";
        }
    }

    public $timestamps = false;
}
