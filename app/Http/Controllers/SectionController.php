<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section = sections::all();
        return view('sections.sections', compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
            'description' => 'required',
           ]);
              $section = new sections();
              $section->section_name = $request->section_name;
              $section-> description= $request->description;
              $section->Created_by = Auth::User()->name;
             $section->save();
             return response('تم اضافه البيانات ');
    }

    /**
     * Display the specified resource.
     */
    public function show(sections $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $section, $id)
    {
         $section = sections::findorfail($id);
         return view('invoices.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        /*
        $id = $request->id;
        $section = sections::findorfail($id);
        $section = new sections();
        $section->section_name = $request->section_name;
        $section-> description= $request->description;
        $section->Created_by = Auth::User()->name;
        $section->save();
       return response('تم تعديل البيانات');
*/

        //   $validateeddata = $request->validate([
        //       'section_name' => 'required|unique:section_name,sections|max:255' .$id,
        //       'description' => 'required',
        //      ]);
        
            $id = $request->id;
             $sections = sections::find($id);
              $sections->update([
              'section_name' => $request->section_name,
              'description' => $request->description,
             ]);

             session()->flash('edit','تم تعديل القسم بنجاج');
             return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        sections::findorfail($id)->delete();
        return response('تم حزف القسم');
    }
}
