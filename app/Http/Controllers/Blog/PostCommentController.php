<?php

namespace App\Http\Controllers\Blog;

use App\Entities\Blog\Comment;
use App\Http\Requests\Blog\BlogCreateRequest;
use App\Repositories\Blog\PostCommentRepository;
use App\Repositories\Blog\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use RumusBin\AttributesRouter\RoteAttributes\Get;
use RumusBin\AttributesRouter\RoteAttributes\Post;
use RumusBin\AttributesRouter\RoteAttributes\Prefix;

#[Prefix('post-comments')]
class PostCommentController extends \App\Http\Controllers\Controller
{
    public function __construct(
        private PostCommentRepository $postCommentRepository,
        private UserRepository $userRepository,
        private PostRepository $postRepository
    ) {
    }

    #[Get('/create', name: 'post-comments.create')]
    public function create()
    {
        return view('blog.posts.create');
    }

    #[Get('/{post_id}', name: 'post-comments.show')]
    public function show($id)
    {
        $post = $this->postCommentRepository->findById((int)$id);


    }

    #[Post('/store', name: 'post-comments.store')]
    public function store(Request $request)
    {
        $user = $this->userRepository->findById(1);
        $comment = (new Comment())
            ->setContent($request->get('content'))
            ->setPost(
                $this->postRepository->findById((int)$request->get('post_id'))
            )
            ->setAuthor($user);

        $this->postCommentRepository->store($comment);

        return redirect(route('posts.index'));
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
