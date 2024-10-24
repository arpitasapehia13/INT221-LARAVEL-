<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content ="width=device-width,intial-scale=1.0">
        <title>Upload File</title>
    </head>
    <body>
        <form method ="POST" action = "upload" enctype="multipart/form-data"> 
            @csrf
            Choose file <input type = "file" name = "file" id = "file"> <br>

            @error('file')
            <div> {{$message}}</div>
            @enderror

            <button type = "submit">Upload</button>
        </form>
        </body>
        </html>