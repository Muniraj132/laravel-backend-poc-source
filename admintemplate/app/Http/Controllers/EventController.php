<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{
    public function index()
    {
        return view('users.dashboard');
    }
    public function getnewsevents(Request $request){
        
        if ($request->ajax()) {
            $data = Event::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                 ->addIndexColumn()
                //  ->addColumn('image', function($row){
                //     $img = '<img src="'.asset("new_images/$row->image").'" style="height: 50px;" />';
                //     return $img;
                // })
                ->addColumn('id', function($row){
                    static $id = 1;
                    $serialNumber = $id++;
                   return $serialNumber;
                })
                 ->addColumn('action', function($row){
                     $btn = '';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" class="newseventsedit" id="newseventsedit'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-edit"></i></a>';
                     $btn = $btn.'   <a href="javascript:void(0)" data-toggle="tooltip" class="newseventsdel"  id="newseventsdel'.$row->id.'"  data-id="'.$row->id.'" data-original-title="Delete"><i class="fa fa-trash"></i></a>';
                     return $btn;
                 })
                 ->rawColumns(['action','id'])
                 ->make(true);
      } 
    }
    public function store(Request $request){
    $files = $request->file('images');
    if (!empty($files)) {
        foreach ($files as $file) {
            $originalName = $file->getClientOriginalName(); 
            $extension = $file->getClientOriginalExtension(); 
            $destinationPath = 'upcomingEvents'; 
         
            $data= ([
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
                'active_status' => $request->input('active_status'),
                'image' => $originalName,
            ]);
       }
       Event::create($data);
       $file->move($destinationPath, $originalName);

    } else {
        Event::create([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'active_status' => $request->input('active_status'),
            'description' => $request->input('description'),
        ]);
    }
    return response()->json(['success'=> 'News Created Successfully']);

   }
   public function show(Request $request){
    $reqId = $request->all();
    $fileData = Event::where('id',$reqId)->get();
    $fileDataVal = $fileData[0];
    return response()->json(['fileData'=> $fileDataVal]);
   }

   public function update(Request $request){
    $files = $request->file('images');
    $id = $request->input('id');
    $News = Event::findOrFail($id);
    
    if (!empty($files)) {
        foreach ($files as $file) {
            $originalName = $file->getClientOriginalName(); 
            $extension = $file->getClientOriginalExtension(); 
            $destinationPath = 'upcomingEvents'; 
         
            $data= ([
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
                'active_status' => $request->input('active_status'),
                'image' => $originalName,
            ]);
       }
       $News->update($data);
       $file->move($destinationPath, $originalName);

    } else {
        $News->update([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'active_status' => $request->input('active_status'),
            'image' => $request->input('imagename'),
        ]);
    }
    return response()->json(['success'=> 'News Updated Successfully']);
   }
   public function destroy(Request $request){
    $reqId = $request->id;
    $resourcefilesData = Event::find($reqId);
    if($resourcefilesData != null){
        $filename = $resourcefilesData->image;
        $filepath = 'upcomingEvents/'.$filename;
        unlink($filepath);
    }
    $resourcefilesData->delete();
    return response()->json(['success' => 'deleted Successfully']);
   }
}
