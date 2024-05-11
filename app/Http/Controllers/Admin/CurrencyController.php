<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\currencies\Store;
use App\Http\Requests\Admin\currencies\Update;
use App\Models\Currency;
use App\Traits\Report;
use Illuminate\Http\Request;

class CurrencyController extends Controller {
  public function index($id = null) {
    if (request()->ajax()) {
      $currencies = Currency::whereIsDefault(0)->search(request()->searchArray)->paginate(30);
      $html       = view('admin.currencies.table', compact('currencies'))->render();
      return response()->json(['html' => $html]);
    }
    return view('admin.currencies.index');
  }

  public function create() {
    return view('admin.currencies.create');
  }

  public function store(Store $request) {
    Currency::create($request->validated());
    Report::addToLog('  اضافه عملات');
    return response()->json(['url' => route('admin.currencies.index')]);
  }
  public function edit($id) {
    $currency = Currency::findOrFail($id);
    return view('admin.currencies.edit', ['currency' => $currency]);
  }

  public function update(Update $request, $id) {
    $is_available = ($request->is_available) ? 1 : 0;
    $currency     = Currency::findOrFail($id)->update(array_filter($request->validated()) + ['is_available' => $is_available]);
    Report::addToLog('  تعديل عملات');
    return response()->json(['url' => route('admin.currencies.index')]);
  }

  public function show($id) {
    $currency = Currency::findOrFail($id);
    return view('admin.currencies.show', ['currency' => $currency]);
  }
  public function destroy($id) {
    $currency = Currency::findOrFail($id)->delete();
    Report::addToLog('  حذف عملات');
    return response()->json(['id' => $id]);
  }

  public function destroyAll(Request $request) {
    $requestIds = json_decode($request->data);

    foreach ($requestIds as $id) {
      $ids[] = $id->id;
    }
    if (Currency::whereIntegerInRaw('id', $ids)->get()->each->delete()) {
      Report::addToLog('  حذف العديد من عمله');
      return response()->json('success');
    } else {
      return response()->json('failed');
    }
  }
}
