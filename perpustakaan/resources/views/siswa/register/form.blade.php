<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <h1>Siswa Login</h1>
            @error('email')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            @foreach ($datasiswa as $siswa)
            <form action="{{ route('password.post', $siswa->email) }}" method="POST">
                @endforeach
                @csrf
                <input type="text" name="email" placeholder="Enter your email...">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</main>
