<?php

namespace Database\Seeders;

use App\Interest;
use Illuminate\Database\Seeder;

class InterestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interets = ['Literatura','Ciência','Economia','Arte','TV e Video','Musica','Tecnologia','Relacionamento','Família'];

        for($i = 0; $i < count($interets); $i++){
            $interet = new Interest;
            $interet->interest = $interets[$i];
            $interet->save();
        }

    }
}
