<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsEvent;
use Yajra\DataTables\DataTables;
class NewsEventController extends Controller
{
    public function index()
    {
        return view('products.index');
    }
    public function getnewsevents(Request $request){
        
        if ($request->ajax()) {
            $data = NewsEvent::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('image', function($row){
                    $img = '<img src="'.asset("new_images/$row->image").'" style="height: 50px;" />';
                    return $img;
                })
                 ->addColumn('action', function($row){
                     $btn = '';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" class="newseventsedit" id="newseventsedit'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-edit"></i></a>';
                     $btn = $btn.'   <a href="javascript:void(0)" data-toggle="tooltip" class="newseventsdel"  id="newseventsdel'.$row->id.'"  data-id="'.$row->id.'" data-original-title="Delete"><i class="fa fa-trash"></i></a>';
                     return $btn;
                 })
                 ->rawColumns(['action','image'])
                 ->make(true);
      } 
    }
    public function store(Request $request){
    $files = $request->file('images');
    if (!empty($files)) {
        foreach ($files as $file) {
            // dd($file);
            $originalName = $file->getClientOriginalName(); 
            $extension = $file->getClientOriginalExtension(); 
            $destinationPath = 'new_images'; 
         
            $data= ([
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
                'image' => $originalName,
            ]);
       }
       NewsEvent::create($data);
       $file->move($destinationPath, $originalName);

    } else {
        NewsEvent::create([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
        ]);
    }
    return response()->json(['success'=> 'News Created Successfully']);

   }
   public function show(Request $request){
    $reqId = $request->all();
    $fileData = NewsEvent::where('id',$reqId)->get();
    $fileDataVal = $fileData[0];
    return response()->json(['fileData'=> $fileDataVal]);
   }

   public function update(Request $request){
    $files = $request->file('images');
    $id = $request->input('id');
    $News = NewsEvent::findOrFail($id);
    if (!empty($files)) {
        foreach ($files as $file) {
            $originalName = $file->getClientOriginalName(); 
            $extension = $file->getClientOriginalExtension(); 
            $destinationPath = 'new_images'; 
         
            $data= ([
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
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
            'image' => $request->input('imagename'),
        ]);
    }
    return response()->json(['success'=> 'News Updated Successfully']);
   }
   public function destroy(Request $request){
    $reqId = $request->id;
    $resourcefilesData = NewsEvent::find($reqId);
    if($resourcefilesData != null){
        $filename = $resourcefilesData->image;
        if($filename){
            $filepath = 'new_images/'.$filename;
            unlink($filepath);
        }
        
    }
    $resourcefilesData->delete();
    return response()->json(['success' => 'deleted Successfully']);
   }
}
