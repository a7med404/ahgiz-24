<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Company\Entities\Company;
use App\Helper\UploadFile;
use \Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('company::companies.index', ['companies' => Company::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('company::companies.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, Company $company)
    {
        $uploadObject = new UploadFile();
        $logoName = $uploadObject->uploadOne($request, 'logo', 'public/uploads/images/companies/logos');

        $newCompany = $company::create([
            'name'          => $request->name,
            'logo'          => $logoName,
            'note'          => $request->note,
            'status'        => 0,//$request->status,
        ]);
        Session::flash('flash_massage_type');
        // return response()->json(['message' => 'تم الحفظ بنجاح'], 201);
        return redirect('cpanel/companies')->withFlashMassage('Company Added Susscefully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $companyInfo = Company::findOrFail($id);
        return view('company::companies.show', ['companyInfo' => $companyInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id, Company $companies)
    {
        $companyInfo = $companies->findOrfail($id);
        return view('company::companies.edit',['companyInfo' => $companyInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update($id, Request $request, Company $OneCompany)
    {
        $uploadObject = new UploadFile();
        $logoName = $uploadObject->uploadOne($request, 'logo', 'public/uploads/images/companies/logos');

        $companyUpdate = $OneCompany->findOrFail($id);
        $data = [
            'name'          => $request->name,
            'logo'          => $logoName,
            'note'          => $request->note,
            'status'        => 0,//$request->status,
        ];
        $companyUpdate->fill($data)->save();
        if ($companyUpdate) {
            
        }
        Session::flash('flash_massage_type');
        return redirect()->back()->withFlashMassage('Company Updated Susscefully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id, Company $OneCompany)
    {
        $cruentCompany = \Auth::user()->id;
        $companyForDelete = $OneCompany->findOrfail($id);
        if ($id == 1 Or $id == $cruentCompany) {
            return redirect()->back()->withFlashMassage('You Can\'t Delete This Company');
        }
        $companyForDelete->delete();
        Session::flash('flash_massage_type');
        return redirect()->back()->withFlashMassage('Company Deleted Susscefully');
    }
}
