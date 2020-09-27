<?php

////////////////////////////////////Front End///////////////////////////////
Route::get("/","Home@index");
Route::get('/today-movies',"Home@todayMovies");
Route::get("/all-movies","Home@allMovie");
Route::get("/category-movies/{category_id}","Home@categoryMovie");
Route::get("/view-movie/{movie_id}","home@viewMovie");











///////////////////////////////End FrontEnd///////////////////////////////



Route::get('/admin', function () {
	return redirect('/login'); 
});
Auth::routes();

// Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('home');
/////////////////////////////Dashboard operation////////////////////////////////

/************ Movie Operation*************/
//Movie 
Route::get("/add-movie","MovieController@addMovie");
Route::get("/manage-movie","MovieController@index");
Route::post("/save-movie","MovieController@store");
Route::get("/edit-movie/{movie_id}","MovieController@editMovie");
Route::get("/delete-movie/{movie_id}","MovieController@delete");
Route::post("/update-movie","MovieController@update");

//Movie Category
Route::get("/manage-movie-category","CategoryController@index");
Route::post("/save-movie-category","CategoryController@store");
Route::get("/Edit-Category/{category_id}","CategoryController@edit");
Route::get("/Delete-Category/{category_id}","CategoryController@delete");
Route::post("/update-movie-category","CategoryController@update");

//Movie Sub category
Route::get("/manage-sub-category","SubCategoryController@index");
Route::post("/save-sub-category","SubCategoryController@store");
Route::get("/Edit-Sub-Category/{sub_category_id}","SubCategoryController@edit");
Route::get("/Delete-Sub-Category/{sub_category_id}","SubCategoryController@delete");
Route::post("/update-sub-category","SubCategoryController@update");

//Movie Genre
Route::get("/manage-genre","GenreController@index");
Route::post("/save-genre","GenreController@store");
Route::get("/Edit-Genre/{genre_id}","GenreController@edit");
Route::get("/Delete-Genre/{genre_id}","GenreController@delete");
Route::post("/update-genre","GenreController@update");

//Movie Year
Route::get("/manage-year","YearController@index");
Route::post("/save-year","YearController@store");
Route::get("/Edit-Year/{genre_id}","YearController@edit");
Route::get("/Delete-Year/{genre_id}","YearController@delete");
Route::post("/update-year","YearController@update");

//Movie Resulation
Route::get("/manage-resulation","ResulationController@index");
Route::post("/save-resulation","ResulationController@store");
Route::get("/Edit-Resulation/{genre_id}","ResulationController@edit");
Route::get("/Delete-Resulation/{genre_id}","ResulationController@delete");
Route::post("/update-resulation","ResulationController@update");

//Movie Sequel
Route::get("/manage-sequel","SequelController@index");
Route::post("/save-sequel","SequelController@store");
Route::get("/Edit-Sequel/{genre_id}","SequelController@edit");
Route::get("/Delete-Sequel/{genre_id}","SequelController@delete");
Route::post("/update-sequel","SequelController@update");



/************ Software Operaton *************/

//Softeware Mian Category
Route::get("/manage-soft-main-category","SoftCategoryController@manageMainCat");
Route::post("/save-soft-main-category","SoftCategoryController@saveMainCat");
Route::get("/edit-soft-main-category/{category_id}","SoftCategoryController@editMainCat");
Route::get("/delete-soft-main-category/{category_id}","SoftCategoryController@deleteMainCat");
Route::post("/update-soft-main-category","SoftCategoryController@updateMainCat");

//Softeware Category
Route::get("/manage-soft-category","SoftCategoryController@index");
Route::post("/save-soft-category","SoftCategoryController@store");
Route::get("/edit-soft-category/{category_id}","SoftCategoryController@edit");
Route::get("/delete-soft-category/{category_id}","SoftCategoryController@delete");
Route::post("/update-soft-category","SoftCategoryController@update");

//Softeware File
Route::get("/manage-software","SoftwareController@index");
Route::post("/save-software","SoftwareController@store");
Route::get("/edit-software/{category_id}","SoftwareController@edit");
Route::get("/delete-software/{category_id}","SoftwareController@delete");
Route::post("/update-software","SoftwareController@update");


/************ Games Operaton *************/

//Games Category
Route::get("/manage-game","GameController@index");
Route::post("/save-game","GameController@store");
Route::get("/edit-game/{game_id}","GameController@edit");
Route::get("/delete-game/{game_id}","GameController@delete");
Route::post("/update-game","GameController@update");

//Manage Games
Route::get("/games-category","GameController@manageCategory");
Route::post("/save-game-category","GameController@storeCategory");
Route::get("/edit-game-category/{category_id}","GameController@editCategory");
Route::get("/delete-game-category/{category_id}","GameController@deleteCategory");
Route::post("/update-game-category","GameController@updateCategory");



/************ Tv Shows Operation *************/

//Tv Show Category
Route::get("/manage-tvseries-category","TvSeriesController@Category");
Route::post("/save-tvseries-category","TvSeriesController@saveCategory");
Route::get("/edit-tvseries-category/{category_id}","TvSeriesController@editCategory");
Route::get("/delete-tvseries-category/{category_id}","TvSeriesController@deleteCategory");
Route::post("/update-tvseries-category","TvSeriesController@updateCategory");

// Award Show
Route::get("/manage-awardshow","TvSeriesController@manageAwardShow");
Route::post("/save-awardshow","TvSeriesController@saveAwardShow");
Route::get("/edit-awardshow/{show_id}","TvSeriesController@editAwardShow");
Route::get("/delete-awardshow/{show_id}","TvSeriesController@deleteAwardShow");
Route::post("/update-awardshow","TvSeriesController@updateAwardShow");

// Tv Series
Route::get("/manage-tvseries","TvSeriesController@manageTvSeries");
Route::post("/save-tvseries","TvSeriesController@saveTvSeries");
Route::get("/edit-tvseries/{show_id}","TvSeriesController@editTvSeries");
Route::get("/delete-tvseries/{show_id}","TvSeriesController@deleteTvSeries");
Route::post("/update-tvseries","TvSeriesController@updateTvSeries");


// Episodes
Route::get("/manage-episode","TvSeriesController@manageEpisode");
Route::post("/save-episode","TvSeriesController@saveEpisode");
Route::get("/edit-episode/{show_id}","TvSeriesController@editEpisode");
Route::get("/delete-episode/{show_id}","TvSeriesController@deleteEpisode");
Route::post("/update-episode","TvSeriesController@updateEpisode");





