<?php

namespace Modules\Address\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\Address;
use Modules\Address\Transformers\AddressResource;
use Modules\Address\Transformers\SingleAddressResource;
use Modules\Address\Http\Requests\CreateAddressRequest;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Address $address){
        $allUsers = $address->all();
        return view('address::addresses.index', ['addresses' => $allUsers]);
        return new AddressResource(Address::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('student::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateAddressRequest $request)
    {
        $data = [
            'street_1'          =>  $request->street_1,
            'street_2'          =>  $request->street_2,
            'local'             =>  $request->local,
            'number'            => 1,// $request->number,
            'city'              =>  $request->city,
            'addressable_id'    =>  $request->addressable_id,
            'addressable_type'  =>  $request->addressable_type
        ];
        Address::create($data);
        Session::flash('flash_massage_type');
        return redirect()->back()->withFlashMassage('Address Added Susscefully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return new SingleAddressResource(Address::findOrfail($id));
        /* return view('student::show'); */
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $addressInfo = Address::findOrfail($id);
        return view('address::addresses.edit',['addressInfo' => $addressInfo]);
        // return redirect()->route("companies.show", ['id' => $addressInfo->addressable_id])->with(['addressInfo' => $addressInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateAddressRequest $request, $id)
    {
        $data = [
            'street_1'          =>  $request->street_1,
            'street_2'          =>  $request->street_2,
            'local'             =>  $request->local,
            'number'            => 1,// $request->number,
            'city'              =>  $request->city,
            'addressable_id'    =>  $request->addressable_id,
            'addressable_type'  =>  $request->addressable_type
        ];
        Address::findOrfail($id)->update($data);
        Session::flash('flash_massage_type');
        return redirect()->back()->withFlashMassage('Address Updated Susscefully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id, Address $oneAddress)
    {
      $addressForDelete = $oneAddress->findOrfail($id);
      $addressForDelete->delete();
      Session::flash('flash_massage_type');
      return redirect()->back()->withFlashMassage('Address Deleted Susscefully');
    }

    public function getLocals($id)
    {

        $locals = [
            1 => [1 => 'الخرطوم', 2 => 'الخرطوم بحري', 3 => ' أمدرمان', 4 => 'شرق النيل', 5 => ' جبل أولياء', 6 => ' أم بدة', 6 => 'كرري'],
            2 => [1 => 'بورتسودان', 2 => 'حلايب', 3 => 'سنكات', 4 => 'طوكر', 5 => 'سواكن', 6 => 'عقيق', 7 => 'القنب والاوليب', 8 => 'هيا'],
            3 => [1 => 'الدبة', 2 => 'دنقلا- مروي', 3 => 'وادي حلفا', 4 => 'دلقو', 5 => 'البرقيق', 6 => 'القولد'],
            4 => [1 => 'أبو حمد', 2 => 'الدامر- المتمة', 2 => 'بربر- شندي -عطبرة'],
            5 => [1 => 'الجبلين', 2 => 'الدويم', 3 => 'القطينة', 4 => 'كوستي', 5 => 'السلام', 6 => 'تندلتى', 7 => 'ام رمته', 8 => 'ربك'],
            6 => [1 => 'الحصاحيصا', 2 => 'الكاملين', 3 => 'المناقل', 4 => 'أم القرى', 5 => 'جنوب الجزيرة', 6 => 'شرق الجزيرة', 6 => 'ود مدني الكبرى'],
            7 => [1 => 'أم روابة', 2 => 'بارا- جبرة الشيخ', 3 => 'سودري', 4 => 'شيكان', 5 => 'النهود', 6 => 'غبيش', 7 => 'ابوزبد', 8 => 'ودبندة'],
            8 => [1 => 'أبو جبيهة', 2 => 'الدلنج', 3 => 'الرشاد', 4 => 'تلودي', 5 => 'كادوقلي', 6 => 'السلام', 7 => 'ابيي', 8 => 'لقاوة', 9 => 'كليك', 10 => 'ابو جبيهه'],
            9 => [1 => 'الفاشر', 2 => 'أم كدادة', 3 => 'كبكابية', 4 => 'كتم', 5 => 'مليط', 6 => 'الواحة', 7 => 'الطينة', 8 => 'الطويشة اللعيت', 9 => 'دار السلام', 10 => 'كلمندو', 11 => 'الكومة', 12 => 'سرف عمرة', 2 => 'السريف', 2 => 'المالحة'],
            10 => [1 => 'الجنينة', 2 => 'جبل مرة', 3 => 'زالنجي', 4 => 'كليس', 5 => 'مكجر -هبيلا -وادي صالح', 6 => 'ركورو', 7 => 'ازوم', 8 => 'الجنينة', 9 => 'بيضة', 10 => 'سربا', 11 => 'نيرتيا', 2 => 'كرينك', 12 => 'ام دخن'],
            11 => [1 => 'الضعين', 2 => 'برام', 3 => 'تلس', 4 => 'رهيد البردي', 5 => 'شعيرية', 6 => 'عد الفرسان- عديلة', 7 => 'كاس', 8 => 'نيالا'],
            12 => [1 => 'الدندر- سنار', 2 => 'شرق سنار', 3 => 'سنجة', 4 => 'السوكي'],
            13 => [1 => 'القاش', 2 => 'ستيت', 3 => 'كسلا', 4 => 'نهر عطبرة -همشكوريب'],
            14 => [1 => 'الرهد', 2 => 'الفاو', 3 => 'الفشقة', 4 => 'القضارف', 5 => 'القلابات الغربية', 6 => 'القلابات الشرقية', 7 => 'البطانة'],
            15 => [1 => 'الدمازين', 2 => 'الروصيرص', 3 => 'الكرمك', 4 => 'باو', 5 => 'قيسان',]
        ];
      
        // $locals = [ 
        //     1 => [1 => 'الفاشر', 2 => 'الطينة', 3 => 'كرنوي'],
        //     2 => [1 => 'حي الميدان', 2 => 'حي العباسية', 3 => 'المحروقة'],
        //     3 => [1 => 'الطينة', 2 => 'حي العباسية', 3 => 'المحروقة'],
        // ];
        return response()->json( $locals[$id] );
    }

}
