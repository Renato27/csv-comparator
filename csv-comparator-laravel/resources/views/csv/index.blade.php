<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV Comparator - Upload</title>
    @vite('resources/css/styles.css')
    <style>
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CSV Comparator</h1>

        @if ($errors->any())
            <div class="alert alert-danger" id="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/compare') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="old_file">Old CSV File:</label>
                <input type="file" name="old_file" id="old_file" required>
            </div>
            <div>
                <label for="new_file">New CSV File:</label>
                <input type="file" name="new_file" id="new_file" required>
            </div>
            <div>
                <button type="submit">Compare</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var alert = $('#error-alert');
            if (alert.length) {
                setTimeout(function() {
                    alert.fadeOut('slow');
                }, 5000);
            }
        });
    </script>
</body>
</html>
