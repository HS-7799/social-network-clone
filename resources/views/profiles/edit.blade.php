<x-app>

    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    <form method="POST" action="/profiles/{{ $user->username }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group ">
            <label for="name" >{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" >

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>
        <div class="form-group ">
            <label for="username" >{{ __('Userame') }}</label>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" >

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group ">
            <label for="email" >{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group ">
            <label for="password" >{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" required name="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group ">
            <label for="password-confirm" >{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

        </div>

        <div class="form-group">
            <label for="avatar">Profile picture</label>
            <input type="file" name="avatar" id="avatar" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="banner">Cover photo</label>
            <input type="file" name="banner" id="banner" class="form-control-file">
        </div>

        <div class="form-group  mb-0">
            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </div>
    </form>
</x-app>
