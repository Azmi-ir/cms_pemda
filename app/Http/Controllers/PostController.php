<?php

namespace App\Http\Controllers;

use Pvtl\VoyagerBlog\BlogPost;
// use Pvtl\VoyagerBlog\Category;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class PostController extends VoyagerBaseController
{
    protected $viewPath = 'voyager-frontend';

    /**
     * Route: Gets all posts and passes data to a view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPosts()
    {
        // Get featured post
        // $featuredPost = BlogPost::where([
        //     ['status', '=', 'PUBLISHED'],
        //     ['featured', '=', '1'],
        // ])->whereDate('published_date', '<=', Carbon::now())
        //     ->orderBy('created_at', 'desc')
        //     ->first();
        // $featuredPostId = $featuredPost ? $featuredPost->id : 0;

        // // Get all posts
        // $posts = BlogPost::where([
        //     ['status', '=', 'PUBLISHED'],
        //     ['id', '!=', $featuredPostId],
        // ])->whereDate('published_date', '<=', Carbon::now())
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(12);

        // return view("{$this->viewPath}::modules/posts/posts", [
        //     'featuredPost' => $featuredPost,
        //     'posts' => $posts,
        // ]);

        return view("{$this->viewPath}::modules/errors/404");
    }

    /**
     * Route: Gets a single posts and passes data to a view
     *
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPost($category, $slug)
    {
        // The post
        $post = BlogPost::where([
            ['slug', '=', $slug],
            ['status', '=', 'PUBLISHED'],
        ])->whereDate('published_date', '<=', Carbon::now())
            ->firstOrFail();

        $post->increment('viewer', 1);

        // Related posts (based on tags)
        $relatedPosts = array();
        if (!empty(trim($post->tags))) {
            $tags = explode(',', $post->tags);
            $relatedPosts = BlogPost::where([
                ['id', '!=', $post->id],
            ])->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhere('tags', 'LIKE', '%' . trim($tag) . '%');
                }
            })->limit(4)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view("{$this->viewPath}::modules/posts/post", [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }

    public function getPostsCategory($category)
    {
        // Get featured post
        $featuredPost = BlogPost::where([
            ['status', '=', 'PUBLISHED'],
            ['featured', '=', '1'],
        ])->whereDate('published_date', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->first();
        $featuredPostId = $featuredPost ? $featuredPost->id : 0;

        $cat = Category::where('slug', '=', $category)->first();

        // Get all posts
        $posts = BlogPost::where([
            ['status', '=', 'PUBLISHED'],
            ['id', '!=', $featuredPostId],
            ['category_id', $cat->id]
        ])->whereDate('published_date', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->paginate(12);


        return view("{$this->viewPath}::modules/posts/posts", [
            'featuredPost' => $featuredPost,
            'posts' => $posts,
        ]);
    }

    public function search(Request $request)
    {
        // return $request->q;
        // Get featured post
        // Get featured post
        $featuredPost = BlogPost::where([
            ['status', '=', 'PUBLISHED'],
            ['featured', '=', '1'],
        ])->whereDate('published_date', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->first();
        $featuredPostId = $featuredPost ? $featuredPost->id : 0;

        // Get all posts
        $posts = BlogPost::where([
            ['status', '=', 'PUBLISHED'],
            ['id', '!=', $featuredPostId],
        ])->whereDate('published_date', '<=', Carbon::now())
            ->where('title', 'like', '%' . $request->q . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view("{$this->viewPath}::modules/posts/search", [
            'featuredPost' => $featuredPost,
            'posts' => $posts,
        ]);
    }
}
