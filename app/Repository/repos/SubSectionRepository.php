<?php

namespace App\Repository\repos;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\SubSection;
use App\Models\Teacher;
use App\Repository\interfaces\SubSectionRepositoryInterface;

class SubSectionRepository implements SubSectionRepositoryInterface
{

    public function index()
    {
        $sections = Section::all();
        $subSections = SubSection::all();
        return view('pages.sections.sub_section', compact('subSections', 'sections'));
    }


    public function store($request)
    {
        try {

            $validated = $request->validated();
            $subSection = new SubSection();
            $subSection->section_name = ['ar' => $request->section_name_ar, 'en' => $request->section_name_en];
            if ($request->status == "on") {
                $subSection->is_active = "active";
            } else {
                $subSection->is_active = "inactive";
            }

            $subSection->parent_section = $request->parent_section;

            $subSection->save();

            // Save image
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $subSection->addMediaFromRequest('image')->toMediaCollection('images');
            }

            // Sucess message
            toastr()->success(trans('messages.success'));

            return redirect()->route('sub_sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {

        try {
            $validated = $request->validated();
            $subSection = SubSection::findOrFail($request->id);

            $subSection->section_name = ['ar' => $request->section_name_ar, 'en' => $request->section_name_en];
            if ($request->status == "on") {
                $subSection->is_active = "active";
            } else {
                $subSection->is_active = "inactive";
            }
            $subSection->parent_section = $request->parent_section;

            $subSection->save();

            // Save image
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $subSection->clearMediaCollection('images');
                $subSection->addMediaFromRequest('image')->toMediaCollection('images');
            }
            toastr()->success(trans('messages.update'));

            return redirect()->route('sub_sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        SubSection::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('sub_sections.index');
    }
}
