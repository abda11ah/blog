<?php
    namespace App\Models;

    class Post {
      public static function all($db) {
        $stmt = $db->query("SELECT * FROM posts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      public static function create($db, $title, $content) {
        $stmt = $db->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        $stmt->execute([$title, $content]);
        return $db->lastInsertId();
      }

      public static function find($db, $id) {
        $stmt = $db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
      }

      public static function update($db, $id, $title, $content) {
        $stmt = $db->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $id]);
      }

      public static function delete($db, $id) {
        $stmt = $db->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
      }
    }
    ?>
