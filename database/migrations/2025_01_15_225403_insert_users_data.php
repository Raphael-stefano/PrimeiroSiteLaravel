<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
    {
        public function up()
    {
        User::create([
            'nome' => 'Raphael',
            'sobrenome' => 'Erbetta',
            'email' => 'raphaelestefano@hotmail.com',
            'password' => bcrypt('root')
        ]);
    }

    public function down()
    {
        //
    }
};
