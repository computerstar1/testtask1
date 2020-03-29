<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
      
        public function update(Request $request)
        {
            $posts = Post::all();
    
            foreach ($posts as $post) {
                foreach ($request->order as $order) {
                    if ($order['id'] == $post->id) {
                        $post->update(['order' => $order['position']]);
                    }
                }
            }
            
            return response('Reordered Successfully!');
        }
    
}
