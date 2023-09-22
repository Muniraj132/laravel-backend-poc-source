<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class ContentController extends Controller
{
    public function news()
    {
        return view('content.news');
    }

    public function create()
    {
        return view('content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Content::create([
            'content' => $request->input('content'),
        ]);
        return response()->json(['success'=> 'Content Created Successfully']);
        // return redirect()->route('content.index')->with('success', 'Content saved successfully!');
    }
        public function contentupdate(Request $request){
          
            $request->validate([
                'content' => 'required',
            ]);
            $id = $request->id;
            $fileData = Content::where('id',$id)->first();
            $fileData->update([
                'content' => $request->content,
            ]);

            return response()->json(['success'=> 'Content Updated Successfully']);
        }
    public function index()
    {
        $contents = DB::table('contents')->select('id', 'content', 'created_at')->get();
        // dd($contents);

        return view('content.index', compact('contents'));
    }
    public function contentedit($id){
        $fileData = Content::select('id','content')->where('id',$id)->get();
        
       return view('content.edit', compact('fileData'));
    }
    public function contentsget(Request $request){
        if ($request->ajax()) {
            $data = Content::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('content', function($row){
                    $content = '';
                   $content =  strip_tags($row->content);
                    return $content;
                })
                ->addColumn('id', function($row){
                   static $id = 1;
                   $sid = $id++;
                   return $sid;
                })
                 ->addColumn('action', function($row){
                     $btn = '';
                     $btn = $btn.'<a href="/content/edit/'.$row->id.'" data-toggle="tooltip" class="contentsedit" id="contentsedit'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-edit"></i></a>';
                     $btn = $btn.'   <a href="/content/'.$row->id.'" data-toggle="tooltip" class="contentsdel"  id="contentsdel'.$row->id.'"  data-id="'.$row->id.'" data-original-title="Delete"><i class="fa fa-trash"></i></a>';
                     return $btn;
                 })
                 ->rawColumns(['action','content','id'])
                 ->make(true);
      } 
    }
    public function destroy($id)
    {
        // Find the content by its ID
        $content = Content::find($id);

        // Check if the content exists
        if (!$content) {
            return redirect()->route('content.index')->with('error', 'Content not found.');
        }

        // Delete the content
        $content->delete();

        // Redirect back with a success message
        return redirect()->route('content.index')->with('success', 'Content deleted successfully.');
    }
    public function contentview(Request $request){
        $reqId = $request->all();
        $fileData = Slide::where('id',$reqId)->get();
        $fileDataVal = $fileData[0];
        return response()->json(['fileData'=> $fileDataVal]);
    }

}