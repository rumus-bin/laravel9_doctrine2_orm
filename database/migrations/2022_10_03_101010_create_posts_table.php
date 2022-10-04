<?php

use App\Entities\Blog\Post;
use App\Entities\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(Post::TABLE_NAME, static function (Blueprint $table) {
            $table->id();
            $table->text(Post::CONTENT);
            $table->string(Post::TITLE);
            $table->timestamps();

            $table->foreignId(Post::AUTHOR_ID)->constrained(User::TABLE_NAME);
        });
    }
};
