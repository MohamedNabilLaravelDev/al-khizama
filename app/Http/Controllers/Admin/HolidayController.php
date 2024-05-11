<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\holidays\Store;
use App\Http\Requests\Admin\holidays\Update;
use App\Models\Holiday;
use App\Traits\Report;
use Illuminate\Http\Request;

class HolidayController extends Controller {
  public function index($id = null) {
    if (request()->ajax()) {
      $holidays = Holiday::search(request()->searchArray)->paginate(30);
      $html     = view('admin.holidays.table', compact('holidays'))->render();
      return response()->json(['html' => $html]);
    }
    return view('admin.holidays.index');
  }

  public function create() {
    return view('admin.holidays.create');
  }

  public function store(Store $request) {
    Holiday::create($request->validated());
    Report::addToLog('  اضافه عطلات');
    return response()->json(['url' => route('admin.holidays.index')]);
  }
  public function edit($id) {
    $holiday = Holiday::findOrFail($id);
    return view('admin.holidays.edit', ['holiday' => $holiday]);
  }

  public function update(Update $request, $id) {
    $is_active = ($request->is_active) ? 1 : 0;

    $holiday = Holiday::findOrFail($id)->update(array_filter($request->validated()) + ['is_active' => $is_active]);
    Report::addToLog('  تعديل عطلات');
    return response()->json(['url' => route('admin.holidays.index')]);
  }

  public function show($id) {
    $holiday = Holiday::findOrFail($id);
    return view('admin.holidays.show', ['holiday' => $holiday]);
  }
  public function destroy($id) {
    $holiday = Holiday::findOrFail($id)->delete();
    Report::addToLog('  حذف عطلات');
    return response()->json(['id' => $id]);
  }

  public function destroyAll(Request $request) {
    $requestIds = json_decode($request->data);

    foreach ($requestIds as $id) {
      $ids[] = $id->id;
    }
    if (Holiday::whereIntegerInRaw('id', $ids)->get()->each->delete()) {
      Report::addToLog('  حذف العديد من عطله');
      return response()->json('success');
    } else {
      return response()->json('failed');
    }
  }
}
