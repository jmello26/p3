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
   Handles form submittal
*/
Route::post('/', function()
{
	$selection = Input::get('dev_tool');
	if ($selection == 'lorem') {
		return Redirect::to('/lorem')->withInput(Input::get());
	}
	else if ($selection == 'users') {
		return Redirect::to('/users')->withInput(Input::get());
	}
	else {
		return View::make('index');
	}
});

/*
   Handles direct url to lorem page
*/
Route::get('/lorem', function()
{
	return View::make('lorem');
});

/*
   Handles input posted to lorem page
*/
Route::post('/lorem', function() 
{
	$num_paras = Input::get('num_paras');
	$generator = new Badcow\LoremIpsum\Generator();
	$paragraphs = $generator->getParagraphs($num_paras);
	$result = implode('<p>', $paragraphs);
	return View::make('lorem')->with('result', $result);
});


/*
   Handles direct url to users page
*/
Route::get('/users', function()
{
	return View::make('users');
});


/*
   Handles input posted to the users page
*/
Route::post('/users', function()
{
	$num_users = Input::get('num_users');
	$faker = Faker\Factory::create();
	$users = array();
	for ($i=0; $i < $num_users; $i++) {
		$users[$i] = $faker->name;
	}
	$result = implode('<p>', $users);
	return View::make('users')->with('result', $result);
});
