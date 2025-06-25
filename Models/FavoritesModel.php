<?php
require_once 'BaseModel.php';

class FavoritesModel extends BaseModel {
    public $id;
    public $user_id;
    public $item_type;
    public $item_id;

    public function __construct($db) {
        parent::__construct($db, 'favorites');
    }

    public function getFavorites($userId) {
        $stmt = $this->db->prepare("SELECT * FROM favorites WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFavorite($userId, $itemType, $itemId) {
        $this->user_id = $userId;
        $this->item_type = $itemType;
        $this->item_id = $itemId;
        $this->Save();
    }

    public function isFavorite($userId, $itemType, $itemId) {
    $stmt = $this->db->prepare("SELECT id FROM favorites WHERE user_id = ? AND item_type = ? AND item_id = ?");
    $stmt->execute([$userId, $itemType, $itemId]);
    return $stmt->fetch() !== false;
    }

    public function removeFavorite($userId, $itemType, $itemId) {
    $stmt = $this->db->prepare("DELETE FROM favorites WHERE user_id = ? AND item_type = ? AND item_id = ?");
    return $stmt->execute([$userId, $itemType, $itemId]);
    }
}