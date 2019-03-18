<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=[
    		[
    			
    			'name'=>'Thể thao',
    			'short_desc'=>'sdksdldjpo'
    		],
    		[
    			
    			'name'=>'Chính trị',
    			'short_desc'=>'sdksdldjpo'
    		],[
    			
    			'name'=>'Giáo dục',
    			'short_desc'=>'sdksdldjpo'
    		],[
    			
    			'name'=>'Văn hóa',
    			'short_desc'=>'sdksdldjpo'
    		],[
    			
    			'name'=>'Showbizz',
    			'short_desc'=>'sdksdldjpo'
    		],
    		    		
    	];
    	DB::table('categories')->insert($category);  
    }
}
