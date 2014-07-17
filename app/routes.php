<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
  Default route for main site -- show index
*/
Route::get('/', function()
{
	return View::make('index');
});


/*
   Direct url requests to the 'lorem' page
*/
Route::get('/lorem', function()
{
	return View::make('lorem');
});


/*
   Input posted to the 'lorem' page
*/
Route::post('/lorem', function() 
{

	// get POST data for validation
	$post_data = Input::all();
	
	// require that num_paras is present, and numeric
	$valid_rule = array(
		'num_paras' => 'required|numeric'
	);
	
	// create a new validator instance
    $validator = Validator::make($post_data, $valid_rule);

    if ($validator->passes()) {
		// instantiate lorem ipsum generator
		$generator = new Badcow\LoremIpsum\Generator();
	
		// get value from num_paras element
		$num_paras = Input::get('num_paras');
		
		// request paragrpahs of text based on input
		$paragraphs = $generator->getParagraphs($num_paras);
		
		// turn the array into a String
		$result = implode('<p>', $paragraphs);
		
		// pass the result string to this view again
        
    }
	else {
		// validation failed, display a message
		$result = "Enter a valid number.";
	}
	return View::make('lorem')->with('result', $result);
});


/*
   Direct url requests to the 'users' page
*/
Route::get('/users', function()
{
	return View::make('users');
});



/*
   Input posted to the 'users' page
*/
Route::post('/users', function()
{
	// get POST data for validation
	$post_data = Input::all();
	
	// require that num_paras is present, and numeric
	$valid_rule = array(
		'num_users' => 'required|numeric'
	);
	
	// create a new validator instance
    $validator = Validator::make($post_data, $valid_rule);

    if ($validator->passes()) {
		// get the value posted from the num_users element
		$num_users = Input::get('num_users');
	
		// instantiate a Faker object
		$faker = Faker\Factory::create();
	
		// array to hold the user information
		$users = array();
	
		// get the requested number of users and store them in the $users array
		for ($i=0; $i < $num_users; $i++) {
			$users[$i] = $faker->name;
		}
	
		// convert the array into a String
		$result = implode('<p>', $users);
    }
	else {
		// validation failed, display a message
		$result = "Enter a valid number.";
	}

	// re-display this page, passing the string of users back to it
	return View::make('users')->with('result', $result);
});
