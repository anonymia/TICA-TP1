<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Mahasiswa</title>
    <style>
        .form-group {
            overflow: hidden;
        }
        .form-group label {
            width: 10%;
            min-width: 160px;
            float: left;
        }
        .form-group input.name {
            width: 30%;
            min-width: 200px;
            float: left;
        }
        .alert {
            margin-top: 1rem;
        }
        .alert-danger {
            color: rgb(114, 28, 36);
            background-color: rgb(248, 215, 218);
            border-color: rgb(245, 198, 203);
        }
    </style>
</head>
<body>
    <h1>Pendataan Mahasiswa</h1>

    @if (session('status'))
    <h2>
    <p>Nama Lengkap: {{ session('name') }}
    <p>Tempat Tanggal Lahir: {{ session('pob') }}, {{ session('date') }}
    <p>Jenis Kelamin: {{ session('gender') }}
    <p>Foto: <?php echo session('picture') ?>
    <p>Sertifikat: <?php echo session('certificate') ?>
    <p>Curriculum Vitae: <?php echo session('cv') ?>
    @else
    <form method="POST" enctype="multipart/form-data" action="/register">
        @csrf

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input name="name" type="text" class="@error('name') is-invalid @enderror name">

            @error('name')
                <br>
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group">
            <label for="date">Tempat Tanggal Lahir</label>
            <input name="pob" type="text" class="@error('pob') is-invalid @enderror">
            <input name="date" type="date" class="@error('date') is-invalid @enderror">

            @error('pob')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <input name="gender" type="radio" value="0" class="@error('gender') is-invalid @enderror">Laki-Laki
            <input name="gender" type="radio" value="1" class="@error('gender') is-invalid @enderror">Perempuan

            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group">
            <label for="picture">Foto</label>
            <input name="picture" type="file" accept=".jpg, .jpeg, .png">

            @error('picture')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group">
            <label for="certificate">Sertifikat</label>
            <input name="certificate" type="file" accept=".zip, .rar">

            @error('certificate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group">
            <label for="cv">Curriculum Vitae</label>
            <input name="cv" type="file" accept=".pdf">

            @error('cv')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group">
            <input name="submit" type="submit"value="Submit">
            <input name="submit" type="reset" value="Reset">
        </div>
    </form>
    @endif
</body>
</html>