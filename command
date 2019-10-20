php artisan module:make Website

php artisan module:use Vehicle

php artisan module:make-resource PlaneStationResource

php artisan module:unuse

  CompanyController

php artisan module:use Company

php artisan module:make-controller CompanyController
php artisan module:make-controller API/ApiCompanyController

php artisan module:make-factory CompanyFactory

php artisan module:make-seed CompanyTableSeeder

php artisan module:make-request CreateCompanyRequest

php artisan module:make-resource PlaneCompanyResource

php artisan module:make-model    Company --migration

php artisan module:migrate Setting

php artisan module:seed

php artisan module:publish-migration


php artisan migrate --path=/Modules/User/Database/Migrations/2014_10_12_100000_create_password_resets_table.php


php artisan module:make-event OTPCustomer Customer


// the migration


/****************************************************************************************************************/
php artisan make:migration create_users_table --create=users

$table->boolean('confirmed');
$table->date('created_at');

$table->tinyInteger('votes');
$table->integer('votes');

$table->decimal('amount', 8, 2);
$table->float('amount', 8, 2);
$table->double('amount', 8, 2);
$table->enum('File', ['easy', 'hard']);

$table->text('description');
$table->longText('description');

$table->softDeletes();

()->nullable()->unique();


$table->integer('user_id');
$table->foreign('user_id')->references('id')->on('users');

$table->unsignedBigInteger('from_station_id')->foreign()->references('id')->on('stations');
$table->unsignedBigInteger('to_station_id')->foreign()->references('id')->on('stations');



$table->unsignedBigInteger('level_id')->foreign()
    ->references('id')->on('levels')
    ->onDelete('cascade');

$table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');

/****************************************************************************************************************/
return [
  'title' => 'required|unique:posts|max:255',
  'body' => 'required',
  'title' => 'bail|required|unique:posts|max:255',
  'body' => 'required',

  'title' => 'required|unique:posts|max:255',
  'author.name' => 'required',
  'author.description' => 'required',

  'publish_at' => 'nullable|date',

];


Accepted
Active URL
After (Date)
After Or Equal (Date)
Alpha
Alpha Dash
Alpha Numeric
Array
Bail
Before (Date)
Before Or Equal (Date)
Between
Boolean
Confirmed
Date
Date Equals
Date Format
Different
Digits
Digits Between
Dimensions (Image Files)
Distinct
E-Mail
Exists (Database)
File
Filled
Greater Than
Greater Than Or Equal
Image (File)
In
In Array
Integer
IP Address
JSON
Less Than
Less Than Or Equal
Max
MIME Types
MIME Type By File Extension
Min
Not In
Not Regex
Nullable
Numeric
Present
Regular Expression
Required
Required If
Required Unless
Required With
Required With All
Required Without
Required Without All
Same
Size
Sometimes
Starts With
String
Timezone
Unique (Database)
URL
UUID


public function attributes()
{
    return [
        'email' => 'email address',
    ];
}

messages = [
    'same'    => 'The :attribute and :other must match.',
    'size'    => 'The :attribute must be exactly :size.',
    'between' => 'The :attribute value :input is not between :min - :max.',
    'in'      => 'The :attribute must be one of the following types: :values',
];

use Illuminate\Validation\Rule;
Validator::make($data, [
    'email' => [
        'required',
        Rule::unique('users')->ignore($user->id),
    ],
]);