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
        // https://laravel.com/docs/10.x/validation#available-validation-rules
        $validated = $request->validate([
            '日付' => 'required|date',
            '種別' => 'required|in:休暇,遅刻,早退,その他',
            'フリーテキスト' => 'nullable|max:1000', //should this be required?
            'その他備考' => 'required|max:1000',    //should this be required?
            '入力者' => 'required',
            '入力日' => 'required|date',
            'タイプ' => 'required|in:有給,残業',
            '早退タイム'=>'nullable|date_format:H:i',    // leave early time (start time) as end time will be 23:59
            '遅刻タイム'=> 'nullable|date_format:H:i',   // late arrival time (end time) as start time will be 0:00
        ]);
        
        $request->user()->attendanceforms()->create($validated);
        
        // Make a Google Calendar Event
        $event = new Event();
        
        // Parse date and time input (with Carbon library) from the request and adjust the timezone to Asia/Tokyo
        $startDate = Carbon::parse($request->input('日付'))->setTimezone('Asia/Tokyo');
        $endDate = Carbon::parse($request->input('日付'))->setTimezone('Asia/Tokyo');

        $user = $request->user();

        // Build each necessary item of the description
        $descriptionItems = [];
            if ($request->input('その他備考')){
                $descriptionItems[] = e("その他備考: " . $request->input('その他備考'));
            }
            if ($request->input('入力日')){
                $descriptionItems[] = e("入力日: " . $request->input('入力日'));
            }
            if ($request->input('タイプ')){
                $descriptionItems[] = e("タイプ: " . $request->input('タイプ'));
            }
            if ($request->input('フリーテキスト')){
                $descriptionItems[] = e("フリーテキスト: " . $request->input('フリーテキスト'));
            }
            if ($user->name){
                $descriptionItems[] = e("対象者: " . $user->name);
            }

        // String the description items together
        $description = implode("\n", $descriptionItems);
        
        // Build each necessary item of the title
        $nameItems = [];
        $nameItems[] = '[' . $request->input('入力者') . ']';
            if ($request->input('種別') === '早退'){
                $nameItems[] = '早退(' . $request->input('早退タイム') . ')';
            }
            elseif ($request->input('種別') === '遅刻'){
                $nameItems[] = '遅刻(' . $request->input('遅刻タイム') . ')';
            }
            elseif ($request->input('種別') === 'その他'){
                $nameItems[] = 'その他';
            }
            else {
                $nameItems[] = '休み(' . $request->input('種別') . ')';
            }

        // String the title items together
        $name = e(implode(' ', $nameItems));
        
        Event::create([
            'name' => $name,  //　[島田]休み(休暇) or [島田]早退(3:00PM) or [島田]遅刻(9:00AM) 
            'startDate' => $startDate, // 日付 (Carbon instance)
            'endDate' => $endDate, // whole day event (Carbon instance)
            'description' => $description,
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
