<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSections;
use App\Http\Requests\StoreSubSection;
use App\Repository\interfaces\SubSectionRepositoryInterface;

class SubSectionController extends Controller
{

    protected $subSection;

    public function __construct(SubSectionRepositoryInterface $subSection)
    {
        return $this->subSection = $subSection;
    }

    public function index()
    {
        return $this->subSection->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreSubSection $request)
    {
        return $this->subSection->store($request);
    }

    public function update(StoreSubSection $request)
    {
        return $this->subSection->update($request);
    }

    public function destroy(request $request)
    {
        return $this->subSection->destroy($request);
    }

}
