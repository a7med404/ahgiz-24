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
        return view('company::companies.index');
    }
    public function companiesDataTables()
    {
        return DataTables::of(Company::orderBy('id', 'desc')->get())
            ->addColumn('options', function ($company) {
                return view('Company::companies.column.options', ['id' => $company->id, 'routeName' => 'companies']);
            })

            ->editColumn('type', function ($company) {
                return $company->type == 0 ? '<span class="label label-success">' . Companytype()[$company->type] . '</span>' : '<span class="label label-warning">' . Companytype()[$company->type] . '</span>';
            })
            ->rawColumns(['options','type'])
            ->removeColumn('password','contact_id','address_id')
            // ->setRowClass('{{ $gender == 0 ? "alert alert-success" : "alert alert-warning" }}')
            ->setRowId('{{$id}}')
            ->make(true);
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
            'type'          => $request->type,
            'status'        => 0,//$request->status,
        ]);
        Session::flash('flash_massage_type');
        // return response()->json(['message' => 'تم الحفظ بنجاح'], 201);
        return redirect('adminCpanel/companies')->withFlashMassage('Company Added Susscefully');
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
            'type'          => $request->type,

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
