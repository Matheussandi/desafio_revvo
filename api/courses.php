<?php
/**
 * Course API endpoint
 */

require_once '../config/config.php';

// Configure headers for AJAX
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// Function to return JSON response
function jsonResponse($success, $message, $data = null) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}

try {
    $course = new Course();
    $action = $_POST['action'] ?? $_GET['action'] ?? '';
    
    switch ($action) {
        case 'create':
            // Validate required data
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $is_new = isset($_POST['is_new']) ? (bool)$_POST['is_new'] : true;
            
            if (empty($title) || empty($description)) {
                jsonResponse(false, 'Title and description are required.');
            }
            
            // Process image upload
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../assets/images/courses/';
                
                // Create directory if it doesn't exist
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                
                if (in_array($fileExtension, $allowedExtensions)) {
                    $fileName = uniqid() . '.' . $fileExtension;
                    $uploadPath = $uploadDir . $fileName;
                    
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                        $image = 'assets/images/courses/' . $fileName;
                    }
                }
            }
            
            $data = [
                'title' => $title,
                'description' => $description,
                'image' => $image,
                'is_new' => $is_new
            ];
            
            $courseId = $course->create($data);
            
            if ($courseId) {
                $newCourse = $course->getById($courseId);
                jsonResponse(true, 'Course created successfully!', $newCourse);
            } else {
                jsonResponse(false, 'Error creating course.');
            }
            break;
            
        case 'list':
            $courses = $course->getAll();
            jsonResponse(true, 'Courses loaded successfully.', $courses);
            break;
            
        case 'get':
            $id = (int) ($_GET['id'] ?? 0);
            if ($id <= 0) {
                jsonResponse(false, 'Course ID is required.');
            }
            
            $courseData = $course->getById($id);
            if ($courseData) {
                jsonResponse(true, 'Course found.', $courseData);
            } else {
                jsonResponse(false, 'Course not found.');
            }
            break;
            
        case 'update':
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                jsonResponse(false, 'Course ID is required.');
            }
            
            // Validate required data
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $is_new = isset($_POST['is_new']) ? (bool)$_POST['is_new'] : true;
            
            if (empty($title) || empty($description)) {
                jsonResponse(false, 'Title and description are required.');
            }
            
            // Get current course data
            $currentCourse = $course->getById($id);
            if (!$currentCourse) {
                jsonResponse(false, 'Course not found.');
            }
            
            $image = $currentCourse['image']; // Keep current image by default
            
            // Process image upload if new image provided
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../assets/images/courses/';
                
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                
                if (in_array($fileExtension, $allowedExtensions)) {
                    $fileName = uniqid() . '.' . $fileExtension;
                    $uploadPath = $uploadDir . $fileName;
                    
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                        // Delete old image if exists
                        if (!empty($currentCourse['image'])) {
                            $oldImagePath = '../' . $currentCourse['image'];
                            if (file_exists($oldImagePath)) {
                                unlink($oldImagePath);
                            }
                        }
                        $image = 'assets/images/courses/' . $fileName;
                    }
                }
            }
            
            $data = [
                'title' => $title,
                'description' => $description,
                'image' => $image,
                'is_new' => $is_new
            ];
            
            if ($course->update($id, $data)) {
                $updatedCourse = $course->getById($id);
                jsonResponse(true, 'Course updated successfully!', $updatedCourse);
            } else {
                jsonResponse(false, 'Error updating course.');
            }
            break;
            
        case 'delete':
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                jsonResponse(false, 'Course ID is required.');
            }
            
            if ($course->delete($id)) {
                jsonResponse(true, 'Course deleted successfully!');
            } else {
                jsonResponse(false, 'Error deleting course.');
            }
            break;
            
        default:
            jsonResponse(false, 'Unknown action.');
    }
    
} catch (Exception $e) {
    jsonResponse(false, 'Server error: ' . $e->getMessage());
}
