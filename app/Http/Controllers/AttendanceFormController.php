<?php

namespace App\Http\Controllers;

use App\Models\AttendanceForm;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response; 

class AttendanceFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        return view('attendanceforms.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            '日付' => 'required|date',
            '種別' => 'required',
            'その他備考' => 'nullable|max:1000',
            '入力者' => 'required',
            '入力日' => 'required|date',
        ]);

        $request->user()->attendanceforms()->create($validated);//creating a record that will belong to the logged in user by leveraging a attendanceforms relationship (to be defined soon!)


        return redirect(route('attendanceforms.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceForm $attendanceForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceForm $attendanceForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttendanceForm $attendanceForm): RedirectResponse
    {
        $this->authorize('update', $attendanceForm);

        $validated = $request->validate([
            '日付' => 'required|date',
            '種別' => 'required',
            'その他備考' => 'nullable|max:1000',
            '入力者' => 'required',
            '入力日' => 'required|date',
        ]);

        $attendanceForm->update($validated);

        return redirect(route('attendanceforms.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceForm $attendanceForm): RedirectResponse
    {
        $this->authorize('delete', $attendanceForm);
        $attendanceform->delete();
        return redirect(route('attendanceforms.index'));
    }
}
