<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="{{ route('add-blog') }}">
    @csrf
    <input type="text" name="title" >
    <input type="text" name="body" >
    <button type="submit">Create</button>
    </form>
    
    </body>
</html>