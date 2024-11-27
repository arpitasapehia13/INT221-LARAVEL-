<?php
use App\Http\Controllers\HomeController1;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoopsController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestController1;
use App\Http\Middleware\SomeMiddleware;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\validationController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Cart;



// Route::get('/', function () {
//     return view('welcome');

Route::get ('welcome',function(){
    return "Welcome";
});


Route::get ('welcome1',function(){
    echo "Welcome"."<br>";
    // echo "<br>";
    echo " <h1>All</h1>";
});

Route :: get('/name', function(){
    $name1 = "Arpita";
    $name2 = "Sapehia";

    echo "The first name is" .$name1 ."<br>";
    echo "The second name is" .$name2 ;
});

Route :: get('/details',function(){
    return ['name'=>'nav','occupation'=>'faculty'];

});

Route::get('/stuff',function(){
    $product = ['type'=>'Smartphone','model'=>'Samsung Galaxy','cost'=>'20000'];
    return $product;
});

// Route::get('/myprofile/login/{name?}',function($name = "Arpita"){
//     return "Welcome to your profile  " .$name;
// });


Route::get('/add/{a}/{b}', function($a, $b) {
    $sum = $a + $b;
    return "The sum is: " . $sum;
});

// Route::get('/grade/{a}', function($a) {
//     if ($a >= 80 && $a <= 100) {
//         return "Grade A";
//     } elseif ($a >= 60 && $a < 80) {
//         return "Grade B";
//     } elseif ($a >= 40 && $a < 60) {
//         return "Grade C";
//     } else {
//         return "Fail";
//     }
// });

// Route::get('test/{name}/{profile}', function($name, $profile){
//     return view('test', ['name' => $name, 'profile' => $profile]);
// });


// Route::get('employee/{empname}/{salary}',
// function($empname,$salary){
//     return view("employee")->with("empname",$empname)->with("salary",$salary);
// });


// Route::view('test','test');



                      // ORIGINAL 
Route::get('employee/{empname}/{salary}',function($empname,$salary){
    return view("employee",compact('empname','salary'));

});                 
      
                        //REDIRECTION
// Route::get('empdirect/{empname}/{salary}',function($empname,$salary){
//     return redirect('employee/{empname}/{salary}');
// });

Route::redirect('empdirect/{empname}/{salary}', '/employee/{empname}/{salary}');




Route::get('greetings',function(){

    return "Warm Greetings from Arpita";
});

Route::redirect('greet','greetings');





// Route::get("welcome", function() {
//     return view("view1");
// })->name("Arpita");

// Route::get("welcome2", function() {
//     return redirect()->route("Arpita");
// });





Route::get("welcome/{name?}", function($name = "default") {
    return view("view1", ['name' => $name]);
})->name("Arpita");

Route::get("welcome2", function() {
    return redirect()->route("Arpita");
});


Route::get('employee/{empname}/{salary}',function($empname,$salary){
    return view("employee", ["empname"=>$empname,"salary"=>$salary]);
})->name("empdetails");
Route::get('employees/{empname}/{salary}',function($empname,$salary){
     return redirect()->route('empdetails',["empname"=>$empname,"salary"=>$salary]);
});



                 //Working with response header
Route::get('sthg',function(){
return response("Hello")->header("something","somevalue")->header("something1","somevalue1");

});

Route::get('studentData',function(){
    return response("this is some student data")->withHeaders(["data"=>"student data","anotherdata"=>"another student data"]);
});

Route::get('studentdata1',function(){
    return response()->json(["name"=>"Arpita","address"=>"Delhi","email"=>"arpita@gmail.com"])->header("individual","student individual");
});

Route::get('studata/{name}/{profile}',function($name,$profile){
    return response()->view('test',['name'=>$name,'profile'=>$profile])->header("Data","Student Data");
});

Route::get('empdata',function(){
    return response("The cookie is set.Please open developer tools to check your stored cookie")->cookie("empname","Arpita",0.5)->header("data","employee data");
});

Route::get('empdata1',function(){
    setcookie("empname","Arpita",time()+30);
    return response("The employee cookie has been stored");
});


//GROUP ROUTING

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/users', function () {
        return 'Manage Users';
    });
});




//CONTORLLERS
// php artisan make:controller HomeController1

Route::get('myController',[HomeController1::class,'index']);

Route::get('data/{name}/{marks}',[HomeController1::class,'data']);


Route::get('data1',[HomeController1::class,'data1']);



Route::get('itemsdata', [ItemsController::class, 'itemsdata']);


//Working with parameter constraints

Route::get('login/{userid}',function($userid){
    return "The user ID is $userid";

})->where('userid','[0-9]+');



Route::get('users/{username}',function($username){
    return "The user name is $username";

})->where('username','[aA-zZ]+');



// Route::get('signin/{userid}/{username}',function($userid,$username){
//     return "Dear $username, $userid.You are welcome";

// })->where('userid','[0-9]+')->where('username','[aA-zZ]+');




Route::get('signin/{userid}/{username}', function($userid, $username) {
    return "Dear $username, $userid. You are welcome";
})->where([
    'userid' => '[0-9]+',
    'username' => '[a-zA-Z]+'
]);



Route::get('/user/{id}/{name}', function (string $id, string $name) {
    return "ID: $id, Name: $name";
})->whereNumber('id')->whereAlpha('name');



Route::get('/stu/{regno}', function ($regno) {
    return "The registration number: $regno";
})->whereAlphaNumeric('regno');



//In AppServiceProvider.php we can globally decalre the constraints


//Working with blade templates

Route::get('display',function(){
    return view('display',['name'=>$name]);
});


Route::get('loops',[LoopsController::class,'displayusers']);




// ***************************************************************************************************************************


Route::get('calculate-discount/{price}/{discount}', function($price, $discount) {
    // Calculate the discount amount
    $discountAmount = $price * ($discount / 100);
    $finalPrice = $price - $discountAmount;

    // Pass the original price, discount, and final price to the view
    return response()->view('discount', [
        'price' => $price,
        'discount' => $discount,
        'finalPrice' => $finalPrice
    ])->header("Data", "Discount Calculation");
});

//******************************************************************************************************************************** */

               //PREFIX//

Route::prefix('ArpitaSapehia')->group(function(){
    Route::get('homexyz',function(){
        return "This is home page!";

    });
    Route::get('contactxyz',function(){
        return "This is contact page!";

    });
    Route::get('aboutxyz',function(){
        return "This is about page!";

    });


});



                               //NAMED-PREFIX
Route::name('ck.')->group(function(){
Route::get('cloud/visit/services',function(){
    return "Welcome to my services.";

})->name("serv");
Route::get('cloud/visit/contaact',function(){
    return "Welcome to my contacts.";

})->name("con");
});
Route::get('myservices',function(){
    return redirect()->route('ck.serv');
});

                       //MIDDLEWARE

Route::get('signinxyz', function() {
    return " Sign in here right now";
})->middleware('ss');   //this arrow is called chaining & check app.php for alias


Route::middleware(['ss'])->group(function(){
 Route::get('sign',function(){
    return " Sign here";
 });
 Route::get('log',function(){
    return " Log here";
 });

 Route::get('loog',function(){
    return " Loog here";
 })->withoutMiddleware('Some');
});

Route::get('requestform', function () { 
    return view('requestform'); 
}); 
Route::post('submitform', [RequestController1::class, 'submitform']);



Route::get('admin/request', [RequestController::class, 'implementrequest'])->name('admin.somerequest');


//has,hasAny,filled,anyFilled,missing,whenHas,whenMissing,isNotFilled,whenFilled



                               //COOKIE

Route::get('/createcookie', [CookieController::class, 'createCookie']);
Route::get('/fetchcookie', [CookieController::class, 'fetchCookie']);
Route::get('/deletecookie', [CookieController::class, 'deleteCookie']);



                                    // SESSION

//setting data -> put,session,push
// fetch data -> get,all,session
//destroy data -> flush,forget,pull

                       
Route::get('/setSession', [SessionController::class, 'setSession']);
Route::get('/fetchSession', [SessionController::class, 'fetchSessionData']);
Route::get('/destroySession', [SessionController::class, 'destroySession']);
                       
                       

// Route to show the add-story form
Route::get('add-story', [StoryController::class, 'addstory'])->name('add-story');

// Route to handle form submission and insert into the database
Route::post('add-story', [StoryController::class, 'addstorySubmit'])->name('addstorySubmit');

// Route to display all stories
Route::get('allstories', [StoryController::class, 'getAllStories'])->name('getAllStories');


Route::get('/single-story/{id}', [StoryController::class, 'singleStory'])->name('single-story');
Route::get('/edit-story/{id}', [StoryController::class, 'editStory'])->name('edit-story');
Route::post('/update-story/{id}', [StoryController::class, 'updateStory'])->name('update-story');
Route::get('delete-story/{id}',[StoryController::class,'deleteStory'])->name('delete-story');


//************************************************************************************************************************/

//FORM VALIDATION

Route::get('validate', function() {
    return view('validation');  
});

Route::post('validate', [validationController::class, 'index']);


//FILE UPLOAD
Route::get('/upload', [UploadController::class, 'uploadForm']);
Route::post('/upload', [UploadController::class, 'uploadFile']);


//********************************************ELOQUENT ORM(OBJECT RELATIONAL MAPPER)**********************************************************************

Route:: resource('products',ProductController :: class);

/*
(GET) /products/create -> show form to user to create a product
(POST) /products -> this would store the product
(GET) /products/1 -> will show a particular product .In this case it is 1 as we have mentioned id = 1
(GET) /products -> This will fetch all the products
(GET) /products/1/edit -> show editable for the user to modify product data
(PUT) /products/1 -> this will update product with id = 1
(DELETE) /product/1 -> this will destroy the product with id = 1 

*/
//***************************************************lOCALIZATION********************************************************************* */

Route::get('/testlocali/{lang}',function($lang){
    App::setlocale($lang);
    return view('testlocali');
});

//***************************************************SESSION -CA2 3RD QUESTION******************************************************************* */


Route::get('/cart', [Cart::class, 'showCart'])->name('show');
Route::get('/add-product', [Cart::class, 'addProductForm'])->name('addProductForm');
Route::post('/add-product', [Cart::class, 'addProduct'])->name('addProduct');
Route::post('/cart/remove', [Cart::class, 'removeFromCart'])->name('remove');
