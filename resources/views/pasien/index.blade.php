<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

  
  <nav class="navbar bg-info" >
    <div class="container-fluid">
      <a class="navbar-brand">Island Hospital</a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>

      <div class="container" style="margin-left: 100px">
        <h1>Halaman Pasien</h1>

        <div class="row">
            <div class="col-sm-6">
                <h4>Tabel Data Pasien</h4>
            </div>
            <div class="col-sm-6" style="text-align: right" >
                <a href="/pasien/create" class="btn btn-success btn-sm">Tambah Data Pasien</a>
            </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Successfully</strong> {{ Session::get('success') }}.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
          </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-sm table-hover table-bordered border-dark table-bordered text-center ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Keluhan</th>
                    <th>Tanggal Periksa</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              
            @foreach ($pasien as $key=> $m)
            <tr>
              <td>{{ $pasien->firstItem() + $key }}</td>
              <td>{{ $m->nik }}</td>
              <td>{{ $m->nama_pasien }}</td>
              <td>{{ $m->jk }}</td>
              <td>{{ $m->keluhan }}</td>
              <td>{{ $m->tgl_periksa }}</td>
              <td>{{ $m->alamat  }}</td>
              <td>
                <a href='{{ url('pasien/'.$m->nik.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>

                <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('pasien/'.$m->nik) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
              </tr>
            </div>
          @endforeach

            </tbody>
        </table>
        <div class="col-sm-12" style="text-align: right" >
        {{ $pasien->links() }}

        </div>
      </div>
            </div>
            
        </div>

        </div>

        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>