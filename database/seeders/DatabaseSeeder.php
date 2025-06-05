<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Tutor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //------------------------------- Cria o meu usuário
    User::factory()->create([
        'name' => 'Alex Victor',
        'email' => 'alex@cajutec.com.br',
        'password' => bcrypt('Alex@123'),
    ]);
    
    //------------------------------- Cria 10 usuários
    // User::factory(10)->create();
    //------------------------------- Cria 5 tutores, cada um com 3 animais
    Tutor::factory()->count(5)->has(Animal::factory()->count(3))->create();
    //------------------------------- Cria 10 animais, cada um com um tutor diferente
    // Animal::factory()->count(10)->create();
    
        

    }
}
