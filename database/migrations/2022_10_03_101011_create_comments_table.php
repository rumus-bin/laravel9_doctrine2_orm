<?php

use App\Entities\Blog\Comment;
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
        Schema::create(Comment::TABLE_NAME, static function (Blueprint $table) {
            $table->id();
            $table->text(Comment::CONTENT);
            $table->timestamps();

            $table->foreignId(Comment::AUTHOR_ID)->constrained(User::TABLE_NAME);
            $table->foreignId(Comment::POST_ID)->constrained(Post::TABLE_NAME);
        });
    }
};
