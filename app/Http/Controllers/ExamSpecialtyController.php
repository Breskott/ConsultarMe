<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 17/10/2021
 * Time: 21:18
 */
namespace App\Http\Controllers;

use App\Models\ExamSpecialty;
use App\Http\Requests\ExamSpecialtyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamSpecialtyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $exams = ExamSpecialty::orderBy('id', 'desc')->paginate(15);

        return view('exams.index')->with(['exams' => $exams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ExamSpecialtyRequest $request)
    {
        try {
            DB::beginTransaction();

            $exams = ExamSpecialty::create([
                'description' => ucfirst(request('description')),
            ]);

            DB::commit();

            toastr()->success(__('Exame/Especialidade salvo com sucesso!'));

            return redirect()->route('exams.index');

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
    public function update(ExamSpecialtyRequest $request, $id)
    {
        $exams = ExamSpecialty::find($id);

        if (is_null($exams)) {
            abort(404, __('Exame/Especialidade não encontrado!'));
        }

        try {
            DB::beginTransaction();

            $exams->fill([
                'description' => ucfirst(request('description')),
            ]);
            $exams->save();

            DB::commit();

            toastr()->success(__('Exame/Especialidade salvo com sucesso!'));

            return redirect()->route('exams.index');

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
        $exams = ExamSpecialty::find($id);

        if (is_null($exams)) {
            abort(404, __('Exame/Especialidade não encontrado!'));
        }

        return view('exams.edit', [
            'exams' => $exams
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
        $exams = ExamSpecialty::find($id);
        $exams->delete();

        toastr()->success(__('Exame/Especialidade excluído com sucesso!'));

        return back();
    }
}
