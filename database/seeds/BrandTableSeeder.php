<?php

use Illuminate\Database\Seeder;
use App\Model\Brand;
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('brand')->insert([
        //     'brand_name' => Str::random(10),
        //     'brand_url' => Str::random(10).'@gmail.com',
        //     'brand_logo' => 'http://upload.2001.com/upload/zcwMDIPint9gtWsTYyozP9x2iToWqVGXQiJJhr8p.jpeg',
        //     'brand_desc'=>Str::random(10),
        //     'created_at'=>date('Y-m-d H:i:s',time()),
        //     'updated_at'=>date('Y-m-d H:i:s',time()),
        // ]);

     //    factory(App\Model\Brand::class, 10)->create()->each(function($u) {
	    //     $u->posts()->save(factory(App\Post::class)->make());
	    // });
	    factory(App\Model\Brand::class, 10)->create()->make();
    }
}
