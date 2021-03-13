<?php

namespace Easy\Commerce\Http\Controllers\Supplier\Admin;

use Illuminate\Http\Request;
use Easy\Commerce\Models\Supplier\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class EditController extends Controller
{
    /**
     * Get the data of the id.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $supplier = Supplier::with([
                        "contactPerson" => function($q) {
                            $q->where('type', '=', 'Admin');
                        }
                    ])->with([
                        "address" => function($q) {
                            $q->where('type', '=', 'main');
                        }
                    ])->findOrFail($id);
        return response()->json($supplier, 200);
    }
}
