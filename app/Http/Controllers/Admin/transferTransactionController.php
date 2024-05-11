<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transferTransaction;
use App\Traits\Report;
use Illuminate\Http\Request;

class transferTransactionController extends Controller {
  public function index($id = null) {
    if (request()->ajax()) {
      $transfertransactions = transferTransaction::search(request()->searchArray)->paginate(30);
      $html                 = view('admin.transfertransactions.table', compact('transfertransactions'))->render();
      return response()->json(['html' => $html]);
    }
    return view('admin.transfertransactions.index');
  }

  public function show($id) {
    $test            = transferTransaction::find($id);
    $transferAmounts = $test->transferAmounts;
    return view('admin.transfertransactions.show', ['transaction' => $test, 'transferAmounts' => $transferAmounts]);
  }
  public function destroy($id) {
    $transfertransaction = transferTransaction::findOrFail($id)->delete();
    Report::addToLog('  حذف تحويلات');
    return response()->json(['id' => $id]);
  }

  public function destroyAll(Request $request) {
    $requestIds = json_decode($request->data);

    foreach ($requestIds as $id) {
      $ids[] = $id->id;
    }
    if (transferTransaction::whereIntegerInRaw('id', $ids)->get()->each->delete()) {
      Report::addToLog('  حذف العديد من تحويل');
      return response()->json('success');
    } else {
      return response()->json('failed');
    }
  }
}
