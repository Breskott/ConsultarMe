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

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $users = User::orderBy('id', 'desc')->paginate(15);

        return view('users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
                'is_permission' => request('is_permission'),
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

            toastr()->success(__('Usuário salvo com sucesso!'));

            return redirect()->route('users.index');

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
            abort(404, __('Usuário não encontrado!'));
        }

        try {
            DB::beginTransaction();

            if (!empty($request['password'])) {
                $users->fill([
                    'name' => ucfirst(request('name')),
                    'email' => request('email'),
                    'cpf' => request('cpf'),
                    'password' => Hash::make(request('password')),
                    'is_permission' => request('is_permission'),
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
            }
            else {
                $users->fill([
                    'name' => ucfirst(request('name')),
                    'email' => request('email'),
                    'cpf' => request('cpf'),
                    'is_permission' => request('is_permission'),
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
            }


            toastr()->success(__('Usuário salvo com sucesso!'));

            return redirect()->route('users.index');

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
            abort(404, __('Usuário não encontrado!'));
        }

        return view('users.edit', [
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
        $users = User::find($id);
        $users->delete();

        toastr()->success(__('Usuário excluído com sucesso!'));

        return back();
    }
}
