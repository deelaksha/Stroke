<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stroke Recovery Exercises</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      height: 100vh;
    }
    
    .exercise-info {
      flex: 1;
      padding: 20px;
      box-sizing: border-box;
      overflow-y: auto;
    }
    
    .gif-container {
      position: fixed;
      top: 25%;
      right: 0;
      padding-right: 0%;
      width: 500px;
      height: 500px;
      display: flex;
      justify-content: center;
      align-items: center;
      border: 2px solid #333;
      box-sizing: border-box;
      display: none;
      overflow: hidden;
    }
    
    .gif {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    
    .exercise {
      display: flex;
      left: 0px;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid #ccc;
      cursor: pointer;
    }
    
    .exercise-details {
      padding-left: 20px;
      flex: 1;
    }
    
    .exercise-gif {
      width: 200px;
      height: 200px;
      border: 2px solid #ccc;
      border-radius: 10px;
      overflow: hidden;
      position: relative;
    }
    
    .exercise-gif img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
    }
  </style>
</head>
<body>
  <div class="exercise-info">
    <h1>Stroke Recovery Exercises</h1>
    <p>These exercises can help with regaining strength and mobility after a stroke. It's important to consult with a doctor or physical therapist before starting any new exercise program.</p>
    <div id="exerciseList">
      <?php
      // Include the database connection file
      include 'connection.php';

      // Query to fetch all exercises
      $sql = "SELECT * FROM exercise";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
          echo '<div class="exercise" data-gif="' . htmlspecialchars($row["gif_location"]) . '">';
          echo '<div class="exercise-gif">';
          echo '<img src="' . htmlspecialchars($row["gif_location"]) . '" alt="' . htmlspecialchars($row["exercise_name"]) . ' Exercise GIF">';
          echo '</div>';
          echo '<div class="exercise-details">';
          echo '<h2>' . htmlspecialchars($row["exercise_name"]) . '</h2>';
          echo '<p>' . htmlspecialchars($row["exercise_detail"]) . '</p>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "No exercises found";
      }
      $conn->close();
      ?>
    </div>
  </div>
  
  <div class="gif-container">
    <img src="" alt="Exercise GIF" class="gif">
  </div>
  
  <script>
    const exerciseList = document.getElementById('exerciseList');
    const gifContainer = document.querySelector('.gif-container');
    const gif = document.querySelector('.gif');
    
    exerciseList.addEventListener('click', (event) => {
      const exerciseElement = event.target.closest('.exercise');
      if (exerciseElement) {
        const gifSrc = exerciseElement.dataset.gif;
        gif.src = gifSrc;
        gifContainer.style.display = 'flex';
        
        // Preload the image to get its actual dimensions
        const img = new Image();
        img.onload = function() {
          const aspectRatio = this.width / this.height;
          const containerRatio = gifContainer.offsetWidth / gifContainer.offsetHeight;
          
          if (aspectRatio > containerRatio) {
            gif.style.width = '100%';
            gif.style.height = 'auto';
          } else {
            gif.style.width = 'auto';
            gif.style.height = '100%';
          }
        };
        img.src = gifSrc;
      } else {
        gifContainer.style.display = 'none';
      }
    });

    gifContainer.addEventListener('click', () => {
      gifContainer.style.display = 'none';
    });
  </script>
</body>
</html>