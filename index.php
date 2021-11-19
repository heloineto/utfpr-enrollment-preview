<?php
require('vendor/autoload.php');
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/utf/dashboard', 'DashboardController@index');
Router::post('/utf/dashboard', 'DashboardController@index');
Router::get('/utf/enter', 'EnterController@index');
Router::post('/utf/enter', 'EnterController@index');
Router::get('/utf/leave', 'LeaveController@index');

Router::start();