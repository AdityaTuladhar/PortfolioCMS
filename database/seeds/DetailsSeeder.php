<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
		'name'=>'Aditya Das Tuladhar',
		'age'=>22,
		'sex'=>'Male',
		'phone'=>'9861584300',
		'email'=>'aditya.tuladhar9@gmail.com'
]);
	DB::table('slider_infos')->insert([
		'source'=>'https://www.linkpicture.com/q/ad_1.png',
		'alternate'=>'Hello, I am ADITYA DAS TULADHAR.'
]);
	DB::table('slider_infos')->insert([
		'source'=>'https://www.linkpicture.com/q/8FC9E2BD-FD66-4FE3-ACDA-3EFEF9D9ABD0-min.jpg',
		'alternate'=>'I am very passionate about Web Development'
]);
	DB::table('skills')->insert([
		'languages'=>'HTML',
		'rating'=>'4'
]);
	DB::table('skills')->insert([
		'languages'=>'CSS',
		'rating'=>'4'
]);
	DB::table('skills')->insert([
		'languages'=>'JavaScript',
		'rating'=>'3'
]);
	DB::table('skills')->insert([
		'languages'=>'Laravel',
		'rating'=>'3'
]);
	DB::table('experiences')->insert([
		'date'=>'2020-05-12',
		'info'=>'A* Algorithm Visualization'
]);
	DB::table('experiences')->insert([
		'date'=>'2022-09-11',
		'info'=>'PC Compatibility Checker'
]);
	DB::table('experiences')->insert([
		'date'=>'2022-02-06',
		'info'=>'Event Management Workshop'
]);
	DB::table('experiences')->insert([
		'date'=>'2020-04-19',
		'info'=>'Harvard CS50: Introduction to AI with Python'
]);
	DB::table('footers')->insert([
		'content'=>'© 2023 Copyright by Aditya Das Tuladhar | All rights reserved'
]);
    }
}
