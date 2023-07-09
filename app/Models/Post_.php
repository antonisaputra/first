<?php

namespace App\Models;


class Post
{
    private static $blog_post = [
        [
            'title' => "Judul Pertama",
            'slug' => 'judul-pertama',
            'author' => 'Antoni',
            'body' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error harum placeat debitis? Nemo, aliquam consequuntur! Illum pariatur accusantium atque ducimus commodi deserunt. Cum ea repellendus voluptates nobis, sed vel ipsa possimus totam voluptatem officiis iure aliquid porro quam nulla quis, similique doloribus perspiciatis ut debitis repellat quaerat. Culpa aperiam sit accusamus similique dolor quisquam officia, aspernatur tempore. Eius magni molestias architecto reiciendis soluta ipsa repellendus, at maiores error delectus voluptas ad minus aliquam fuga explicabo laborum, cupiditate a, id nostrum?"
        ],
        [
            'title' => "Judul Kedua",
            'author' => 'Lok Tot',
            'slug' => 'judul-kedua',
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum laudantium quis, quae hic praesentium reprehenderit facere recusandae dolorem dolor beatae optio incidunt delectus. Magnam harum alias sint beatae consequatur, sit maiores labore, similique temporibus repudiandae reiciendis, reprehenderit sequi nesciunt earum ipsam debitis quibusdam aut facilis. Omnis sed quidem distinctio facilis consequatur ut temporibus et, harum, id tempora mollitia! Voluptates nisi deserunt aperiam in autem commodi est et cupiditate eaque recusandae quaerat cum ut molestias repellat debitis provident aliquid illo, minima praesentium placeat incidunt? Harum hic vel eum ipsam voluptatum. Illum aliquid est officia dolor libero molestiae delectus quidem modi voluptatem!"
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_post);
    }

    public static function fint( $slug ){
        $blog_post = static::all();
        
        // $new_post = [];
        // foreach($blog_post as $post){
        //     if($post['slug'] == $slug){
        //         $new_post = $post;
        //     }
        // }

        return $blog_post->firstWhere('slug', $slug);
    }
}
