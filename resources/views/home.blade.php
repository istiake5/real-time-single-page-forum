<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Single Page Forum</title>
</head>
<body>
    <div id="app">
    <v-app>
        <app-home></app-home>
          
    </v-app>
    
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>