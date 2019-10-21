<?php
use Modules\Reservation\Transformers\SinglePassengerResource;

function getSetting($settingName = 'side_name'){
    #TODO:: check if no value must return something
    return Modules\Setting\Entities\Setting::where('name_setting', $settingName)->get()[0]->value;
}
function getTestimonial(){
    return Modules\Setting\Entities\Testimonial::where('status', 1)->get();
}

function maleOrfemale(){
    return [
        '0' => 'Female',
        '1' => 'Male',
    ];
}



function addSudanKey($number){
    //TODO::check 0 in phone number
    return "249".$number;
}

function visibility()
{
    return [
        '0' => 'Visibile',
        '1' => 'Hidden',
    ];
}
function isAegnt(){
    return [
        '0' => 'Dealer',
        '1' => 'dealer',
    ];
}
function toggleOneZeroClass(){
    return [
        '0' => 'label label-default',
        '1' => 'label label-success',
    ];
}
function status(){
    return [
        '0' => 'Disable',
        '1' => 'Enable',
    ];
}

function tripStatus(){
    return [
        '1' => 'ﻣﺘﺎﺣﺔ ﻟﻠﺤﺠﺰ,',
        '0' => 'ﻏﻴﺮ ﻣﺘﺎﺣﺔ ﻟﻠﺤﺠﺰ,',
    ];
}

function reservationStatus(){
    return [
        '0' => 'ﻣﺘﺎﺣﺔ ﻟﻠﺤﺠﺰ ',
        '1' => 'ﺣﺠﺰ ﻣﺆﻗ,'   ,   
        '2' => 'اﻛﺘﻤﻞ اﻟﺤﺠﺰ ',
        '3' => 'تزكرة',
    ];
}

function payMethod(){
    return [
        '1' =>'ﻘــﺪﻱ',
        '2' => 'ﺗﻄﺒﻴﻖ ﺑﻨﻜﻚ',        
        '3' => 'ﺗﻄﺒﻴﻖ ﺳﺎﻳﺒﺮ',
    ];
}

function toggleTrusted(){
    return [
        '0' => 'label label-danger',
        '1' => 'label label-success',
        '3' => 'labe lalel-primary',
    ];
}





function seatNumber($seatNumber){
    $numbers = [];
    for($i = 1; $i <= $seatNumber; $i++){
        $numbers[$i] = $i;
        if ($i == 8) {
            break;
        }
    }
    return $numbers;
}

function getSettingSelect($tableName)
{

    switch ($tableName) {
        case 'cash_status':
            return [
                '1' => 'متاح',
                '0' => 'غير متاح',
            ];
            break;
        case 'BOK_status':
            return [
                '1' => 'متاح',
                '0' => 'غير متاح',
            ];
            break;
        case 'ciper_status':
            return [
                '1' => 'متاح',
                '0' => 'غير متاح',
            ];
            break;
        case 'EPS_status':
            return [
                '1' => 'متاح',
                '0' => 'غير متاح',
            ];
            break;
        case 'station':
            $list = \DB::table('stations')->pluck('name', 'id');
            return $list->toArray();
            break;
        default:
            $list = \DB::table('companies')->pluck('name', 'id');
            break;
    }
}


function getCity()
{
    return [
        '1' => 'Sedan',
        '2' => 'SUV / Crossover',
        '3' => 'Hatchback',
        '4' => 'Convertible',
        '5' => 'Minivan',
        '6' => 'Pickup Truck',
        '7' => 'Coupe',
        '8' => 'Wagon',
    ];
} 


function CompanyType()
{
    return [
        '0' => 'شـركة بصات',
        '1' => 'شـركة طيران',
        
    ];
} 


function StationType()
{
    return [
        '0' => 'محطــة بصات',
        '1' => 'محطــة طيران',
    ];
} 


function getLocal(){
    return [
        '1' => 'Sedan',
        '2' => 'SUV / Crossover',
        '3' => 'Hatchback',
        '4' => 'Convertible',
        '5' => 'Minivan',
        '6' => 'Pickup Truck',
        '7' => 'Coupe',
        '8' => 'Wagon',
    ];
}


function toggleLevelClass(){
    return [
        '1' => 'label label-default',
        '2' => 'label label-info',
        '3' => 'label label-primary',
        '4' => 'label label-success',
    ];
}
function getCities(){
    $list = \DB::table('cities')->pluck('name', 'id');
    array_add($list, '', 'مدينة');
    return $list->toArray();
}


function getSelect($tableName){

    switch ($tableName) {
        case 'role':
            $list = \DB::table('roles')->pluck('name', 'id');
            return $list->toArray();
            break;
        case 'cities':
            $list = \DB::table('cities')->pluck('name', 'id');
            return $list->toArray();
            break;
        case 'station':
            $list = \DB::table('stations')->pluck('name', 'id');
            array_add($list, '', 'الكل');
            return $list->toArray();
            break;
        case 'route':
            $list = \DB::table('routes')->pluck('name', 'id');
            return $list->toArray();
            break;
        case 'trip':
            $list = \DB::table('trips')->pluck('number', 'id');
            array_add($list, '', 'الكل');
            return $list->toArray();
            break;
        case 'customer':
            $list = \DB::table('customers')->pluck('phone_number', 'id');
            return $list->toArray();
            break;
        case 'seat':
            $list = \DB::table('seats')->pluck('name', 'id');
            return $list->toArray();
            break;
        case 'company':
            $list = \DB::table('companies')->pluck('name', 'id');
            array_add($list, '', 'الكل');
            return $list->toArray();
            case 'Companytype':
            $list = \DB::table('companies')->pluck('type', 'id');
            return $list->toArray();
            break;
        default:
            $list = \DB::table('companies')->pluck('name', 'id');
            break;
    }
}

function filterData($tableName, $id)
{
    if ($id === null) {
        return "...";
    }
    switch ($tableName) {
        case 'passengers':
            $list = SinglePassengerResource::collection(\DB::table($tableName)->where('reservation_id', $id)->get());
            // dd($list);
            return $list;
            break;
        case 'stations':
            $list = \DB::table('stations')->pluck('name', 'id');
            return $list[$id];
        break;
            default:
            $list = \DB::table('trips')->pluck('name', 'id');
            return $list->toArray();
        break;
    }
}



function getName($tableName, $id)
{
    if ($id === null) {
        return "...";
    }
    switch ($tableName) {
        case 'trips':
            $list = \DB::table('trips')->pluck('name', 'id');
            return $list[$id];
            break;
        case 'stations':
            $list = \DB::table('stations')->pluck('name', 'id');
            return $list[$id];
            break;
            default:
            $list = \DB::table('trips')->pluck('name', 'id');
            return $list->toArray();
            break;
    }
}

function formatCurrency($value)
{
    return $value.' ج.س';
}


function editRoute($name, $id)
{
    return route($name . '.edit', ['id' => $id]);
}

function showRoute($name, $id)
{
    return route($name.'.show', ['id' => $id]);
}


function getDefaultImage($imageName){
    
    return $imageName == null ? "default_customer_image.png" : "$imageName";
}
function getLogo($imageName = null){
    if($imageName != null){
        if(\File::exists(public_path('storage/uploads/images/companies/logos/'.$imageName))){
            return asset('storage/uploads/images/companies/logos/'.$imageName);
        }
    return asset('storage/uploads/images/companies/logos/default_customer_image.png');
    }
}