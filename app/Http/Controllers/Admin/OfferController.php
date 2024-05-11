<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\offers\Store;
use App\Http\Requests\Admin\offers\Update;
use App\Models\Offer;
use App\Traits\Report;
use Illuminate\Http\Request;

class OfferController extends Controller {
  public function index($id = null) {
    if (request()->ajax()) {
      $offers = Offer::search(request()->searchArray)->paginate(30);
      $html   = view('admin.offers.table', compact('offers'))->render();
      return response()->json(['html' => $html]);
    }
    return view('admin.offers.index');
  }

  public function create() {
    return view('admin.offers.create');
  }

  public function store(Store $request) {
    Offer::create($request->validated());
    Report::addToLog('  اضافه عروض');
    return response()->json(['url' => route('admin.offers.index')]);
  }
  public function edit($id) {

    $offer = Offer::findOrFail($id);
    return view('admin.offers.edit', ['offer' => $offer]);
  }

  public function update(Update $request, $id) {
    $is_available = ($request->is_available) ? 1 : 0;

    $offer = Offer::findOrFail($id)->update(\array_filter($request->validated()) + ['is_available' => $is_available]);
    Report::addToLog('  تعديل عروض');
    return response()->json(['url' => route('admin.offers.index')]);
  }

  public function show($id) {
    $offer = Offer::findOrFail($id);
    return view('admin.offers.show', ['offer' => $offer]);
  }
  public function destroy($id) {
    $offer = Offer::findOrFail($id)->delete();
    Report::addToLog('  حذف عروض');
    return response()->json(['id' => $id]);
  }

  public function destroyAll(Request $request) {
    $requestIds = json_decode($request->data);

    foreach ($requestIds as $id) {
      $ids[] = $id->id;
    }
    if (Offer::whereIntegerInRaw('id', $ids)->get()->each->delete()) {
      Report::addToLog('  حذف العديد من عرض');
      return response()->json('success');
    } else {
      return response()->json('failed');
    }
  }
}
