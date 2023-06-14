<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainRequest;
use App\Models\Train;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TrainController extends Controller
{
    public function index()
    {
        $trains = Train::all();

        if (count($trains) > 0) {
            return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => $trains,
                "length" => count($trains),
            ], 200);
        } else {
            return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => "data is empty",
            ], 200);
        }
    }

    public function store(TrainRequest $request)
    {
        $validate = [
            "name" => $request->name,
            "route" => $request->route,
            "class" => $request->class,
            "price" => $request->price,
            "date" => $request->date,
            "start" => $request->start,
            "finish" => $request->finish,
            "capacity" => $request->capacity,
        ];

        Train::create($validate);

        return response()->json([
            "status" => 422,
            "message" => "success",
            "data" => $validate,
        ]);
    }

    public function show($id)
    {
        try {
            $train = Train::findOrFail($id);

            return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => $train
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                "status" => 404,
                "message" => "data not found",
            ], 404);
        }
    }

    public function update(TrainRequest $request, $id)
    {
        try {
            $train = Train::findOrFail($id);

            $validate = [
                "name" => $request->name,
                "route" => $request->route,
                "class" => $request->class,
                "price" => $request->price,
                "date" => $request->date,
                "start" => $request->start,
                "finish" => $request->finish,
                "capacity" => $request->capacity,
            ];

            $train->update($validate);

            return response()->json([
                "status" => 200,
                "message" => "update success",
                "data" => $validate,
            ]);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                "status" => 404,
                "message" => "data not found",
            ], 404);
        }
    }


    public function destroy($id)
    {
        try {
            $train = Train::findOrFail($id);
            Train::destroy($train->id);

            return response()->json([
                "status" => 200,
                "message" => "delete success",
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                "status" => 404,
                "message" => "data not found",
            ], 404);
        }
    }

    public function getName(){
        $trains = Train::select("name")->get();

        if (count($trains) > 0) {
            return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => $trains,
                "length" => count($trains),
            ], 200);
        } else {
            return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => "data is empty",
            ], 200);
        }
    }
}
