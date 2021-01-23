<?php

namespace Database\Seeders;

use App\Interest;
use App\User;
use App\UserHasFriend;
use App\UserHasInterest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;


class UserSeed extends Seeder
{

    protected $faker;

    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $rootUser = new User;
        $rootUser->name = 'root';
        $rootUser->email = 'root@mail.com';
        $rootUser->password = \Hash::make('123456');
        $rootUser->avatar = 'https://avatars.githubusercontent.com/u/45121694?s=460&u=44fff97784f6914ec218fbc422f73cb61be87254&v=4';
        $rootUser->save();

        for ($i = 0; $i < 20; $i++) {
            $this->createUser();
        }
    }

    public function createUser()
    {

        $user = new User;

        $avatars = [
            'data:image/jpeg;base64,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',
            'data:image/jpeg;base64,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',
            'data:image/jpeg;base64,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',
            'data:image/jpeg;base64,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',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7hueF6OrcUfa0fy8vLALaq-cHMG5QBoRIAQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReMdNTrkJAwFVzlOIqRiitcSeiYL02GOKxdw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlqpXz4jNIikJi9XSDY7yjowZorwuL2StFOw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_kcIiGCUdlQDi5AmeHqSu-8xomV24HzGYsQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMMn5Sn5vNvAwnHisvK3cWtt2XnvoejJT7ug&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSd3aEfeVyxzEdWJn8Jc9DqnPxCYRJKLFt3Rg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSx9Ltvl2WUXxCNGdnWvSgU9-eI1vvdh2AOmg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROMuo78__VlzOIvCmDN3YaJZ2c8FaINfb1TQ&usqp=CAU',
            'https://www.otomedsc.com.br/adm/prof/2.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHkl7h1WaSgTmT0MnO4YUZFs_hd5pB0KnxRA&usqp=CAU'
        ];


        $user->name = $this->faker->name;
        $user->email = $this->faker->unique()->email;
        $user->password = hash::make('123456');
        $user->avatar = array_rand($avatars);
        $user->save();

        for($i = 0; $i < 3; $i++){
            $this->userHasInterest($user->id);
        }

        for($i = 0; $i < 5; $i++){
            $this->userHasFriend($user->id);
        }

    }


    public function userHasInterest($id)
    {
        $userHasInteres = new UserHasInterest;
        $userHasInteres->id_user = $id;
        $userHasInteres->id_interest = Interest::inRandomOrder()->first()->id;
        $exists = UserHasInterest::where('id_user', $id)->where('id_interest', $userHasInteres->id_interest)->first();
        if($exists){
            $this->userHasInterest($id);
        }else{
            $userHasInteres->save();
            return;
        }

    }

    public function userHasFriend($id)
    {
        $userHasFriend = new UserHasFriend;
        $userHasFriend->id_user = $id;
        $userHasFriend->id_friend = Interest::inRandomOrder()->first()->id;
        $exists = UserHasFriend::where('id_user', $id)->where('id_friend', $userHasFriend->id_friend)->first();
        if($exists){
            $this->userHasFriend($id);
        }else{
            $userHasFriend->save();
            return;
        }
    }

}
