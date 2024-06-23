<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pasien</title>
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

      <div class="container" style="margin-left: 350px">
        <h1>Halaman Edit Data Pasien</h1>

        <div class="row">
            <div class="col-sm-12">
                <h4>Form Edit Data Pasien</h4>

                @if ($errors->any())
                  <div class="pt3">
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors-> all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                @endif

                <form action="{{ url('pasien/'.$data->nik) }}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="row">
                      <div class="col-sm-4">
                      
                        <div class="col-sm-12">
                            <label for="">NIK</label>
                            <input type="number" name="nik" class="form-control" placeholder="Input NIK" value="{{ $data->nik }}">
                        </div>
                        <div class="col-sm-12">
                            <label for="">Nama Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control" placeholder="Input Nama Pasien" value="{{ $data->nama_pasien }}">
                        </div>

                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                        
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="">Keluhan</label>
                          <input type="text" name="keluhan" class="form-control" placeholder="Input Keluhan" value="{{ $data->keluhan }}">
                      </div>
                        </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Tanggal Periksa</label>
                            <input type="date" name="tgl_periksa" id="" class="form-control" value="{{ $data->tgl_periksa }}">
                        </div>
                    <div class="row">  
                        <div class="col-sm-12">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="" cols="20" rows="5" class="form-control" placeholder="Input alamat"></textarea value="{{ $data->alamat }}">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <button class="btn btn-danger" style="width: 100%" type="submit">SIMPAN</button>
                        </div>
                        <div class="col-sm-6">
                        <a href="/pasien" class= "btn btn-info" style="width: 100%">KEMBALI</a>
                        </div>
                    </div>
                    

                </form>
            </div>
        </div>

        </div>

        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>