<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\days\Update;
use App\Models\Day;
use App\Models\DayInterval;
use App\Models\Time;
use App\Traits\Report;
use Illuminate\Http\Request;

class DayController extends Controller {
  public function index($id = null) {
    if (request()->ajax()) {
      $days = Day::search(request()->searchArray)->paginate(30);
      $html = view('admin.days.table', compact('days'))->render();
      return response()->json(['html' => $html]);
    }
    return view('admin.days.index');
  }

  public function edit($id) {
    $day   = Day::findOrFail($id);
    $times = Time::all();
    return view('admin.days.edit', ['day' => $day, 'times' => $times]);
  }

  public function update(Update $request, $id) {
    $is_available = ($request->is_available) ? 1 : 0;
    $day          = Day::findOrFail($id);

    $day->dayIntervals()->delete();
    $day->update(['is_available' => $is_available]);

    foreach ($request->from_id as $key => $fromTimeId) {

      $toTimeId = $request->to_id[$key];

      DayInterval::firstOrCreate([
        'day_id'  => $day->id,
        'from_id' => $fromTimeId,
        'to_id'   => $toTimeId,
      ], [
        'from' => Time::find($fromTimeId)->time,
        'to'   => Time::find($toTimeId)->time,
      ]);
    }

    //from must be less than to

    foreach ($day->dayIntervals as $key => $dayInterval) {
      $intervals = $day->dayIntervals()->where('id', '!=', $dayInterval->id)->get();
      foreach ($intervals as $interval) {
        if ($dayInterval->to_id >= $interval->from_id && $dayInterval->from_id <= $interval->from_id) {
          $dayInterval->update([
            'to_id' => $interval->to_id,
          ]);
          $interval->delete();
        }
      }
    }

    Report::addToLog('  تعديل مواعيد');
    return response()->json(['url' => route('admin.days.index')]);
  }

  public function show($id) {
    $day   = Day::findOrFail($id);
    $times = Time::all();
    return view('admin.days.show', ['day' => $day, 'times' => $times]);
  }

  public function deleteInterval($id) {
    $row = DayInterval::find($id);
    $row->delete();
    Report::addToLog('  حذف مواعيد');
    return response()->json(['id' => $id]);
  }
}
