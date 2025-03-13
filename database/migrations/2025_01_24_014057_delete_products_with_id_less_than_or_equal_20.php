<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Deleta todos os produtos com id <= 20
        Produto::where('id_produto', '<=', 20)->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Não é possível restaurar os registros deletados automaticamente
    }
};
