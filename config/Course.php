<?php
/**
 * Course Management Class
 */

class Course {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    
    /**
     * Get all courses
     */
    public function getAll() {
        try {
            $sql = "SELECT * FROM courses ORDER BY created_at DESC";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching courses: " . $e->getMessage());
        }
    }
    
    /**
     * Get course by ID
     */
    public function getById($id) {
        try {
            $sql = "SELECT * FROM courses WHERE id = :id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching course: " . $e->getMessage());
        }
    }
    
    /**
     * Create new course
     */
    public function create($data) {
        try {
            $sql = "INSERT INTO courses (title, description, image, is_new) 
                    VALUES (:title, :description, :image, :is_new)";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':image', $data['image']);
            $stmt->bindParam(':is_new', $data['is_new'], PDO::PARAM_BOOL);
            
            $stmt->execute();
            
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Error creating course: " . $e->getMessage());
        }
    }
    
    /**
     * Update course
     */
    public function update($id, $data) {
        try {
            $sql = "UPDATE courses SET 
                    title = :title,
                    description = :description,
                    image = :image,
                    is_new = :is_new,
                    updated_at = CURRENT_TIMESTAMP
                    WHERE id = :id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':image', $data['image']);
            $stmt->bindParam(':is_new', $data['is_new'], PDO::PARAM_BOOL);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error updating course: " . $e->getMessage());
        }
    }
    
    /**
     * Delete course
     */
    public function delete($id) {
        try {
            // Get course image before deleting
            $course = $this->getById($id);
            
            $sql = "DELETE FROM courses WHERE id = :id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $result = $stmt->execute();
            
            // Delete image file if exists
            if ($result && $course && !empty($course['image'])) {
                $imagePath = '../' . $course['image'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Error deleting course: " . $e->getMessage());
        }
    }
}
