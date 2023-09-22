<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\News;
use App\Models\Content;
use Illuminate\Support\Facades\Http;
use App\Models\DownloadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('newsletter.index');
    }
     public function resourcefilesview(Request $request)
    {
        $reqId = $request->all();
        $fileData = News::where('id',$reqId)->get();
        $fileDataVal = $fileData[0];
        return response()->json(['fileData'=> $fileDataVal]);
    }
    public function resourcefilesget(Request $request)
    {
       if ($request->ajax()) {
             $data = News::orderBy('id', 'desc')->get();
             return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('id', function($row){
                    static $id = 1;
                    $serialNumber = $id++;
                   return $serialNumber;
                 })
                  ->addColumn('action', function($row){
                      $btn = '';
                      $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" class="resourcefilesedit" id="resourcefilesedit'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-edit"></i></a>';
                      $btn = $btn.'   <a href="javascript:void(0)" data-toggle="tooltip" class="resourcefilesdel"  id="resourcefilesdel'.$row->id.'"  data-id="'.$row->id.'" data-original-title="Delete"><i class="fa fa-trash"></i></a>';
                      return $btn;
                  })
                  ->rawColumns(['action','id'])
                  ->make(true);
       } 
    }
    
    public function ResourceUploadFile(Request $request)
   {
         $file = $request->file('resource');
    
         $filename = $file->getClientOriginalName();
         // File extension
         $extension = $file->getClientOriginalExtension();

         // File upload location
         $location = 'resourcefiles';

         $input = ([
           'resource' => $file->getClientOriginalName()
         ]);

         $resourcefiles = new News($input);
         $resourcefiles->save();

         // Upload file
         $file->move($location,$filename);

         // File path
         $filepath = url('resourcefiles/'.$filename);

         // Response
         $data['success'] = 1;
         $data['message'] = 'Uploaded Successfully!';
         $data['filepath'] = $filepath;
         $data['extension'] = $extension;
         
      return response()->json($data);
   }
   public function resourcefilesupdate(Request $request)
    {
        
        $input = $request->except('_token');
        
        $reqId = $request->id;
        $unavailabeData = News::where('id',$reqId)->update($input);

        return response()->json(['success'=> 'Updated Successfully']);
    }
   public function destroyresourcefile(Request $request)
    {
        $reqId = $request->id;
        $resourcefilesData = News::find($reqId);
        if($resourcefilesData != null){
            $filename = $resourcefilesData->resource;
            // File path
            $filepath = 'resourcefiles/'.$filename;
            unlink($filepath);
        }
        $resourcefilesData->delete();
        return response()->json(['resourcefilesData' => 'delete success']);
    }

    public function externalfiels(Request $request){
       

        $url = 'https://docs.google.com/document/d/1tpMYwl-fnxfZgyb5snYoPYqD2ygI1d7izz1kbGbdCAE/edit?usp=drive_link'; // Direct download link from Google Drive

        $response = Http::get($url);

        if ($response->successful()) {
            $imageData = $response->body();
            $filename =  uniqid().'.pdf';
            $directory = public_path('resourcefiles'); 

            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            file_put_contents($directory . '/' . $filename, $imageData);

            return 'Image downloaded and stored: ' . $directory . '/' . $filename;
        } else {
            return 'Image download failed';
        }
    }

}
