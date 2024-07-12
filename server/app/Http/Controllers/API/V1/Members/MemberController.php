<?php

namespace App\Http\Controllers\API\V1\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\Restourant\StoreRequest;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $response = Member::get();
        return response()->json($response,200);
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
    public function store(StoreRequest $request)
    {
        $restourant = Member::create([
            'name' =>    $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
        ]);
        
        if($restourant){
            return response()->json(
              [
                  'success'=> true, 
                  'statusCode'=> 200,
                  'message' => 'The restourant hasn been added successfully.'
              ],200);
         }
  
         return response()->json(
          [
              'success' => false, 
              'statusCode' => 401,
              'message' => 'Something went wrong. Please try again.'
          ],401);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
       $restourant = Member::find($request->id)->update([
          'name' => $request->name,
          'contact' => $request->contact,
          'address' => $request->address,
       ]);

       if($restourant){
          return response()->json(
            [
                'success'=> true, 
                'statusCode'=> 200,
                'message' => 'The restourant hasn been changed successfully.'
            ],200);
       }

       return response()->json(
        [
            'success' => false, 
            'statusCode' => 401,
            'message' => 'Something went wrong. Please try again.'
        ],401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $response = Member::find($request->id);

        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Member::find($request->id)->delete();
        return response()->json(
            [
                'success'=> true, 
                'statusCode'=> 200,
                'message' => 'The restourant hasn been deleted successfully.'
            ],200);
    }
}
