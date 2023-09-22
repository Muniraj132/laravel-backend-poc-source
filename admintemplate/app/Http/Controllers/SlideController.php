<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\Http;

class SlideController extends Controller
{
    public function index(){
          return view('slides.index');
    }
    public function slideimageupload(Request $request){
        $file = $request->file('image');
    
         $filename = $file->getClientOriginalName();
         // File extension
         $extension = $file->getClientOriginalExtension();

         // File upload location
         $location = 'slides';

         $input = ([
           'image' => $file->getClientOriginalName()
         ]);

         $resourcefiles = new Slide($input);
         $resourcefiles->save();

         $file->move($location,$filename);

          $filepath = url('slides/'.$filename);
       
         $data['success'] = 1;
         $data['message'] = 'Uploaded Successfully!';
         $data['filepath'] = $filepath;
         $data['extension'] = $extension;
         
      return response()->json($data);
    }
    public function slidesget(Request $request){
        if ($request->ajax()) {
            $data = Slide::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('image', function($row){
                    $img = '<img src="'.asset("slides/$row->image").'" style="height: 50px;" />';
                    return $img;
                })
                 ->addColumn('action', function($row){
                     $btn = '';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" class="slideedit" id="slideedit'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-edit"></i></a>';
                     $btn = $btn.'   <a href="javascript:void(0)" data-toggle="tooltip" class="slidedel"  id="slidedel'.$row->id.'"  data-id="'.$row->id.'" data-original-title="Delete"><i class="fa fa-trash"></i></a>';
                     return $btn;
                 })
                 ->rawColumns(['action','image'])
                 ->make(true);
      } 
    }
    public function slidesview(Request $request){
        $reqId = $request->all();
        $fileData = Slide::where('id',$reqId)->get();
        $fileDataVal = $fileData[0];
        return response()->json(['fileData'=> $fileDataVal]);
    }
    
    public function slideupdate(Request $request){
        $input = $request->except('_token');
        
        $reqId = $request->id;
        $unavailabeData = Slide::where('id',$reqId)->update($input);

        return response()->json(['success'=> 'Updated Successfully']);
    }

    public function destroyslide(Request $request){
        $reqId = $request->id;
        $resourcefilesData = Slide::find($reqId);
        if($resourcefilesData != null){
            $filename = $resourcefilesData->image;
            // File path
            $filepath = 'slides/'.$filename;
            unlink($filepath);
        }
        $resourcefilesData->delete();
        return response()->json(['resourcefilesData' => 'delete success']);
    }
}
