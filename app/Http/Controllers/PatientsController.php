<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 15/11/2021
 * Time: 10:21
 */
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;

class PatientsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){

        if ($request->has('filter')) {
            $users = QueryBuilder::for(User::class)
                ->allowedFilters('name')
                ->orderBy('id', 'desc')
                ->where('is_permission', '=', '0') // Filter permission
                ->paginate(15);

            return view('patients.index')->with(['users' => $users]);
        }
        else {
            $users = User::where('is_permission','=', '0')->orderBy('id', 'desc')->paginate(15); // Filter permission

            return view('patients.index')->with(['users' => $users]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();

            $users = User::create([
                'name' => ucfirst(request('name')),
                'email' => request('email'),
                'cpf' => request('cpf'),
                'password' => Hash::make(request('password')),
                'is_permission' => 0,
                'phone' => request('phone'),
                'address' => request('address'),
                'zip_code' => request('zip_code'),
                'number' => request('number'),
                'distric' => request('distric'),
                'birth_date' => request('birth_date'),
                'complement' => request('complement'),
                'city_id' => request('city_id'),
            ]);

            DB::commit();

            toastr()->success(__('Paciente salvo com sucesso!'));

            return redirect()->route('patients.index');

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $users = User::find($id);

        if (is_null($users)) {
            abort(404, __('Paciente não encontrado!'));
        }

        try {
            DB::beginTransaction();

            $users->fill([
                'name' => ucfirst(request('name')),
                'email' => request('email'),
                'cpf' => request('cpf'),
                'phone' => request('phone'),
                'address' => request('address'),
                'zip_code' => request('zip_code'),
                'number' => request('number'),
                'distric' => request('distric'),
                'birth_date' => request('birth_date'),
                'complement' => request('complement') == "" ? "" : request('complement'),
                'city_id' => request('city_id'),
            ]);
            $users->save();

            DB::commit();



            toastr()->success(__('Paciente salvo com sucesso!'));

            return redirect()->route('patients.index');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        if (is_null($users)) {
            abort(404, __('Paciente não encontrado!'));
        }

        return view('patients.edit', [
            'users' => $users
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Not use

        //$users = User::find($id);
        //$users->delete();

        //toastr()->success(__('Paciente excluído com sucesso!'));

        return back();
    }
}
