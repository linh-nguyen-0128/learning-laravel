<form action={{ route('post.store') }} method="post">
    @csrf
    <div>
        <label for="">Title</label>
        <input type="text" name="title">
    </div>
    <div>
        <label for="">Content</label>
        <br>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">Create</button>
</form>
