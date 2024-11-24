<?php
    namespace App\Controllers;

    use App\Models\Post;

    class PostController {
        public function create($db, $request, $response, $title, $content) {
            Post::create($db, $title, $content);
            return $response->withRedirect('/admin');
        }

        public function update($db, $request, $response, $id, $title, $content) {
            Post::update($db, $id, $title, $content);
            return $response->withRedirect('/admin');
        }

        public function delete($db, $request, $response, $id) {
            Post::delete($db, $id);
            return $response->withRedirect('/admin');
        }

        public function edit($db, $request, $response, $id) {
            $post = Post::find($db, $id);
            return $response->render('admin/edit.php', ['post' => $post]);
        }

        public function show($db, $request, $response, $id) {
            $post = Post::find($db, $id);
            return $response->render('posts/show.php', ['post' => $post]);
        }
    }
    ?>
