<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 17/10/2021
 * Time: 21:18
 */
namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
    * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    */
    public function index(){
        $units = Units::all();
        return view('home')->with('units', $units);
    }
}
