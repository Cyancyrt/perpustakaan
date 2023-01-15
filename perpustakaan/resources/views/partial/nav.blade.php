<nav class="navbar navbar-expand-lg navbar-light" style="background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('siswa.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('pinjam.view') }}">pinjam</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
