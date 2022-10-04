<?php

namespace App\Http\Controllers\Blog;

use App\Entities\User;
use App\Http\Requests\Blog\BlogCreateRequest;
use App\Repositories\Blog\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RumusBin\AttributesRouter\RoteAttributes\Get;
use RumusBin\AttributesRouter\RoteAttributes\Post;
use RumusBin\AttributesRouter\RoteAttributes\Prefix;

#[Prefix('posts')]
class PostController extends \App\Http\Controllers\Controller
{
    public function __construct(
        private readonly PostRepository $postRepository,
        private readonly UserRepository $userRepository
    ) {
    }

    #[Get('/', name: 'posts.index')]
    public function index(): View
    {
        $posts = $this->postRepository->findAll();

        return view('blog.posts.index', compact('posts'));
    }

    #[Get('/create', name: 'posts.create')]
    public function create()
    {
        return view('blog.posts.create');
    }

    #[Get('/{post_id}', name: 'posts.show')]
    public function show($id)
    {
        $post = $this->postRepository->findById((int)$id);


    }

    #[Post('/store', name: 'posts.store')]
    public function store(BlogCreateRequest $request)
    {
        $user = $this->userRepository->findById(1);
        $post = (new \App\Entities\Blog\Post())
            ->setTitle($request->title)
            ->setContent($request->content)
            ->setAuthor($user);

        $this->postRepository->store($post);

        return redirect('posts.index')->with('success', 'Post ' . $post->getTitle() . ' created!');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
