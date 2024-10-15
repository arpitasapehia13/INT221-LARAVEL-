<form action ="/validate" method = "POST">
    @csrf
    <input type="text" name = "name" value={{old('name')}}>
    @error('name')
    <div>{{$message}}</div>
    @enderror
    <input type = "text" name = "email" value={{old('email')}}>
    @error('email')
    <div>{{$message}}</div>
    @enderror

    <input type = "password" name= "password" value={{old('passwprd')}}>
    @error('password')
    <div>{{$message}}</div>
    @enderror
    <input type= "submit">