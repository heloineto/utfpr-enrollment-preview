<?php
require('vendor/autoload.php');
use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Handlers\IExceptionHandler;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;

Router::get('/utf/dashboard', 'DashboardController@index');
Router::post('/utf/dashboard', 'DashboardController@index');
Router::get('/utf/enter', 'EnterController@index');
Router::post('/utf/enter', 'EnterController@index');
Router::get('/utf/leave', 'LeaveController@index');
Router::get('/utf/404', 'FallbackController@index');

Router::error(function(Request $request, Exception $exception) {
  if($exception instanceof NotFoundHttpException) {
      $request->setRewriteCallback('FallbackController@index');
  }
});

Router::start();