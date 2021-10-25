<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 17/10/2021
 * Time: 21:18
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    */
    public function index(){
        return view('painel');
    }
}
