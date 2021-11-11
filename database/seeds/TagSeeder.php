<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['FrontEnd Dev', 'Backend Dev', 'MVC', 'Model'];

        for($i = 0; $i < count($tags); $i++) {
            $new_tag = new Tag();
            $new_tag ->name = $tags[$i];
            $new_tag ->slug = Str::slug($tags[$i]);
            $new_tag ->save();
        }
    }

}
