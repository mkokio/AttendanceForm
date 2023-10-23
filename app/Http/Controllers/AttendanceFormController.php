<?php

namespace App\Http\Controllers;

use App\Models\AttendanceForm;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;
use App\Models\User;

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
    * "success" method
    */
    public function success()
    {
        return view('success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            '日付' => 'required|date',
            '種別' => 'required',
            'フリーテキスト' => 'nullable|max:1000',
            'その他備考' => 'nullable|max:1000',
            '入力者' => 'required',
            '入力日' => 'required|date',
            'タイプ' => 'required|in:有給,残業',
            '早退タイム'=>'nullable|date_format:H:i',     // leave early time (start time) as end time will be 23:59
            '遅刻タイム'=> 'nullable|date_format:H:i',     // late arrival time (end time) as start time will be 0:00
        ]);
        
        $request->user()->attendanceforms()->create($validated);
        $event = new Event();
        $startDate = Carbon::parse($request->input('日付'));
        $endDate = $startDate->copy()->endOfDay();

        Event::create([
            //Change to [{名前}]休み{種別}の形式で表⽰
            'name' => $request->input('入力者'), // 入力者
            'startDate' => $startDate, // 日付 (Carbon instance)
            'endDate' => $endDate, // whole day event (Carbon instance)
            // leave early time (start time) as end time will be 23:59
            // late arrival time (end time) as start time will be 0:00
            // add フリーテキスト in description
            'description' => $request->input('種別') . "\n" . $request->input('その他備考'), // 種別 + \n + その他備考
            'colorId' => '6', // Orange color
            'visibility' => 'default',
            'status' => 'confirmed',
        ]);

        // Redirect to a success page after db is updated and calendar event is created.
        return redirect()->route('eventcreatesuccess');

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
            'フリーテキスト' => 'nullable|max:1000',
            'その他備考' => 'nullable|max:1000',
            '入力者' => 'required',
            '入力日' => 'required|date',
            'タイプ' => 'required|in:有給,残業',
            '早退タイム'=> 'date_format:H:i',     // leave early time (start time) as end time will be 23:59
            '遅刻タイム'=> 'date_format:H:i',     // late arrival time (end time) as start time will be 0:00
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
