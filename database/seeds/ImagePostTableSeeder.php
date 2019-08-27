<?php

use App\ImagePost;
use App\PostHouse;
use Illuminate\Database\Seeder;

class ImagePostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = new ImagePost();
        $image->image='https://tromoi.com/uploads/guest/o_1dj6b3dlq1l371po31nvb8ep1esca.jpg';
        $image->house_id=1;
        $image->save();

    }
}
