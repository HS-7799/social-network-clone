<form action="/posts/{{ $user->username }}" method="post">
    @csrf
    <div class="card">
        <div class="card-header">
            <label for="post">Create Post</label>
        </div>

    <div class="row card-body ">
        <div class="col-lg-2 col-md-2 col-2">
            <img src="{{ auth()->user()->avatar }}" width="45px" class="rounded-circle" alt="" srcset="">

        </div>
        <div class="col-lg-10 col-md-10 col-10 ">
            <textarea name="body" id="post"
                cols="30"
                rows="2"
                placeholder="{{ $placeholder }}"
                class="form-control @error('body') is-invalid @else border-0 @enderror ">
            </textarea>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror

        </div>


    </div>

    <div class="offset-10 pb-2">

        <button type="submit" class="btn btn-primary">Post</button>
    </div>
</div>
</form>
