<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSections;
use App\Repository\interfaces\SectionRepositoryInterface;

class SectionController extends Controller
{

    protected $section;

    public function __construct(SectionRepositoryInterface $section)
    {
        return $this->section = $section;
    }

    public function index()
    {
        return $this->section->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreSections $request)
    {
        return $this->section->store($request);
    }

    public function update(StoreSections $request)
    {
        return $this->section->update($request);
    }

    public function destroy(request $request)
    {
        return $this->section->destroy($request);
    }

}
