<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth  
    <p>Congrats You Logged In!</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>

    <div style="border: 3px solid black">
        <h2>Create a new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post Title">
            <textarea name="body" placeholder="Body Content..."></textarea>
            <button>Save Post</button>
        </form>
    </div> 

    <div style="border: 3px solid black">
        <h2>All Posts</h2>
        <a href="/?filter=mine"><button>See Only My Posts</button></a> 
        <a href="/"><button>See All Posts</button></a>
        @foreach ($posts as $post)
        <div style="background-color: grey; padding: 10px; margin: 10px">
            <h3>{{ $post->title }} by {{ $post->user->name }}</h3>
            {{ $post->body }}
            @if (auth()->id() == $post->user_id)
                <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
            <form action="/delete-post/{{ $post->id }}" method="POST">
                @csrf
                @method("DELETE")
                <button>Delete</button>
            </form>
            @endif
        </div>
        @endforeach
    </div>



    @else
    <div style="border: 3px solid black">
    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf
        <input name="name" type="text" placeholder="name">
        <input name="email" type="text" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button>Register</button>
    </form>
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
    
        <input name="login_email" type="text" placeholder="email">
        <input name="login_password" type="password" placeholder="password">
        <button>Login</button>
    </form>
    @if($errors->any())
                <p style="color:red">{{ $errors->first() }}</p>
            @endif
    </div>
    </div>
    
    @endauth    


    
</body>
</html>