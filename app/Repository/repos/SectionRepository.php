<?php

namespace App\Repository\repos;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Repository\interfaces\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{

    public function index()
    {
        $sections = Section::all();
        return view('pages.sections.sections', compact('sections'));
    }


    public function store($request)
    {
        try {

            $validated = $request->validated();
            $section = new Section();
            $section->section_name = ['ar' => $request->section_name_ar, 'en' => $request->section_name_en];
            if ($request->status == "on") {
                $section->is_active = "active";
            } else {
                $section->is_active = "inactive";
            }

            $section->save();

            // Save image
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $section->addMediaFromRequest('image')->toMediaCollection('images');
            }
            toastr()->success(trans('messages.success'));

            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {

        try {
            $validated = $request->validated();
            $section = Section::findOrFail($request->id);

            $section->section_name = ['ar' => $request->section_name_ar, 'en' => $request->section_name_en];

            if ($request->status == "on") {
                $section->is_active = "active";
            } else {
                $section->is_active = "inactive";
            }

            $section->save();

            // Save image
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $section->clearMediaCollection('images');
                $section->addMediaFromRequest('image')->toMediaCollection('images');
            }

            toastr()->success(trans('messages.update'));

            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('sections.index');
    }
}
