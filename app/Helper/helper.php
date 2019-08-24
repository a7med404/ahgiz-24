<?php
function getSetting($settingName = 'side_name'){
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



function visibility(){
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
        '1' => 'متاحة للحجز',
        '0' => 'غير متاحة للحجز',
    ];
}

function reservationStatus(){
    return [
        '0' => 'متاحة للحجز',
        '1' => 'حجز مؤقت',
        '2' => 'اكتمل الحجز',
    ];
}

function payMethod(){
    return [
        '1' => 'نقــدي',
        '2' => 'تطبيق بنكك',
        '3' => 'تطبيق سايبر',
    ];
}

function toggleTrusted(){
    return [
        '0' => 'label label-danger',
        '1' => 'label label-success',
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



function getCity(){
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
function getSelect($tableName){

    switch ($tableName) {
        case 'role':
            $list = \DB::table('roles')->pluck('name', 'id');
            return $list->toArray();
            break;
        case 'station':
            $list = \DB::table('stations')->pluck('name', 'id');
            return $list->toArray();
            break;
        case 'route':
            $list = \DB::table('routes')->pluck('name', 'id');
            return $list->toArray();
            break;
        case 'trip':
            $list = \DB::table('trips')->pluck('number', 'id');
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
            return $list->toArray();
            break;
        default:
            $list = \DB::table('companies')->pluck('name', 'id');
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

function editRoute($name, $id)
{
    return route($name.'.edit', ['id' => $id]);
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