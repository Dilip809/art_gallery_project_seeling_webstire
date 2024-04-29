<?php
// Check if the form is submitted with the delete button
if(isset($_POST['delete'])){
    // Get the image name from the form
    $image_name = $_POST['img'];
    
    // Directory where images are stored
    $directory ="C:/htdocs/Art-gallery/Online-Art-Gallery-main/ICTWllb_Project_CE083_CE007_CE079/Images";
    
    // Full path of the image to be deleted
    $image_path = $directory . $image_name;
    
    // Check if the file exists
    if(file_exists($image_path)){
        // Attempt to delete the image file
        if(unlink($image_path)){
            // Image deleted successfully
            echo "<script>alert('Image deleted successfully.')</script>";
            // Redirect back to the page where the deletion was initiated
            echo "<script>window.location = 'pop_art.php'</script>";
        } else {
            // Failed to delete the image
            echo "<script>alert('Failed to delete the image.')</script>";
            // Redirect back to the page where the deletion was initiated
            echo "<script>window.location = 'pop_art.php'</script>";
        }
    } else {
        // Image file does not exist
        echo "<script>alert('Image not found.')</script>";
        // Redirect back to the page where the deletion was initiated
        echo "<script>window.location = 'pop_art.php'</script>";
    }
} else {
    // If the form is not submitted with the delete button, redirect back to the page where the deletion was initiated
    echo "<script>window.location = 'pop_art.php'</script>";
}
?>
