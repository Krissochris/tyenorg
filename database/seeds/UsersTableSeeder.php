<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'username' => 'admin',
            'email' => 'admin@localhost.com',
            'is_verified' => 1,
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if (config('app.debug')) {
            factory(\GriffonTech\User\Models\User::class, 30)->create([
                'is_verified' => 1,
                'password' => Hash::make('secret'),
            ]);/*->each(function($user) {
                $user->tutor_profile()->save(factory(\GriffonTech\Tutor\Models\TutorProfile::class)->make());

                factory(\GriffonTech\Blog\Models\Blog::class)->create([
                    'user_id' => $user->id
                ])->each(function($blog) use ($user) {
                    factory(\GriffonTech\Blog\Models\BlogComment::class, rand(1, 3))->create([
                        'blog_id' => $blog->id,
                        'user_id' => $user->id,
                    ]);
                });
                //$user->blogs()->save(factory(\GriffonTech\Blog\Models\Blog::class)->make());
            });*/
        }
    }
}
