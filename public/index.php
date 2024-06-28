<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CSV Comparator</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h1>CSV Comparator</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="old_file">Upload Old CSV:</label>
                <input type="file" name="old_file" id="old_file" required>
            </div>
            <div>
                <label for="new_file">Upload New CSV:</label>
                <input type="file" name="new_file" id="new_file" required>
            </div>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>

</html>