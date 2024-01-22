Route::get('/messages', 'MessageController@index');
Route::get('/messages/{id}', 'MessageController@show');

Route::get('/messages/create', 'MessageController@create');

Route::get('/messages/{id}/edit', 'MessageController@edit');

Route::get('/messages/{id}/comments/create', 'CommentController@create');

Route::get('/comments/{id}/edit', 'CommentController@edit');

