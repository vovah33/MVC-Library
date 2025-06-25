<?php
class FavoritesModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getFavorites($userId) {
        $stmt = $this->db->prepare("
            SELECT item_type, item_id 
            FROM favorites 
            WHERE user_id = ?
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFavorite($userId, $itemType, $itemId) {
        try {
            $stmt = $this->db->prepare("
                INSERT IGNORE INTO favorites (user_id, item_type, item_id) 
                VALUES (?, ?, ?)
            ");
            return $stmt->execute([$userId, $itemType, $itemId]);
        } catch (PDOException $e) {
            error_log("Error adding favorite: " . $e->getMessage());
            return false;
        }
    }

    public function removeFavorite($userId, $itemType, $itemId) {
        $stmt = $this->db->prepare("
            DELETE FROM favorites 
            WHERE user_id = ? AND item_type = ? AND item_id = ?
        ");
        return $stmt->execute([$userId, $itemType, $itemId]);
    }
}