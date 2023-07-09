<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        User::create([
            'name' => 'antoni saputra',
            'username' => 'antonisaputra',
            'email' => 'antonisaputra@gmail.com',
            'password' => bcrypt('123')
        ]);

        Post::factory(20)->create();

        Category::create([
            'name' => 'Programing',
            'slug' => 'programing'
        ]);
        Category::create([
            'name' => 'Design',
            'slug' => 'design'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        // Post::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere rem nobis mollitia aliquid aliquam. Incidunt rerum corrupti nemo dolore illo culpa repellendus doloremque quae, ad dignissimos est mollitia doloribus! Quibusdam cupiditate excepturi officia qui corporis sit aliquid quasi voluptatum.</p>',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere rem nobis mollitia aliquid aliquam. Incidunt rerum corrupti nemo dolore illo culpa repellendus doloremque quae, ad dignissimos est mollitia doloribus! Quibusdam cupiditate excepturi officia qui corporis sit aliquid quasi voluptatum.</p><p>Odio, excepturi placeat corrupti dolores accusamus deserunt iste iure id veritatis ipsam fugit nemo nobis voluptatibus vitae, consectetur, consequuntur aliquid? Velit ipsum odit officiis dicta, eligendi blanditiis dolorum? A quis nostrum distinctio omnis dolores? Aliquam commodi ratione voluptatum necessitatibus unde magnam temporibus facere incidunt placeat nisi minima error, quas similique reiciendis dolore a officiis explicabo dolorum exercitationem voluptate? Magnam, nemo dicta.</p>'
        // ]);

    }
}
