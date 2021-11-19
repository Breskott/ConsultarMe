<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 17/11/2021
 * Time: 22:58
 */
namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\User;
use App\Models\Doctor;
use App\Models\ExamSpecialty;
use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutoCompleteController extends Controller{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompletename(Request $request)
    {
        if($request->has('q')) {
            $data = \Illuminate\Foundation\Auth\User::select(['name', 'id'])
                ->where([
                    ["name", "LIKE", "%{$request->get('q')}%"],
                    ["is_permission", "<>", "2"]
                ])
                ->get();

            return response()->json($data);
        }
        else {
            $data = User::select(['name', 'id'])->where("is_permission", "<>", "2")->get();

            return response()->json($data);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompletedoctor(Request $request)
    {
        if($request->has('q')) {
            $data = Doctor::select(['name', 'id'])
                ->where("name", "LIKE", "%{$request->get('q')}%")
                ->get();

            return response()->json($data);
        }
        else {
            $data = Doctor::select(['name', 'id'])->get();

            return response()->json($data);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompleteunits(Request $request)
    {
        if($request->has('q')) {
            $data = Units::select(['description', 'id'])
                ->where("description", "LIKE", "%{$request->get('q')}%")
                ->get();

            return response()->json($data);
        }
        else {
            $data = Units::select(['description', 'id'])->get();

            return response()->json($data);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompleteexam(Request $request)
    {
        if($request->has('q')) {
            $data = ExamSpecialty::select(['description', 'id'])
                ->where("description", "LIKE", "%{$request->get('q')}%")
                ->get();

            return response()->json($data);
        }
        else {
            $data = ExamSpecialty::select(['description', 'id'])->get();

            return response()->json($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompletecity(Request $request)
    {
        if($request->has('q')) {
            $data = Cities::select(['description', 'state', 'id'])
                ->where("description", "LIKE", "%{$request->get('q')}%")
                ->get();

            return response()->json($data);
        }
        else {
            $data = Cities::select(['description', 'state', 'id'])->get();

            return response()->json($data);
        }
    }
}
