<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('show_list') }}">Show list</a>
            </li>
          </ul>
          <form class="d-flex" role="search" method="GET" action="{{ route('search') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <form action="{{ url('filter') }}" method="GET" style="margin: 10px auto">
      <div class="container">
        <div class="row">
          <div class="container-fluid">
            <div class="form-group row">
              <label for="" class="col-form-label col-sm-2">Date of birth from</label>
              <div class="col-sm-3">
                <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required>
              </div>
              <label for="" class="col-form-label col-sm-2">Date of birth to</label>
              <div class="col-sm-3">
                <input type="date" class="form-control input-sm" id="toDate" name="toDate" required>
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-success">Filter</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="container">
        <form action="{{ URL::to('/save-contact') }}" method="POST" enctype="multipart/form-data">
          @csrf
            @if ($errors->any())
                <div class="row">
                    <ul style="list-style: none">
                      @foreach ($errors->all() as $error)
                        <li><p class="alert alert-danger">{{ $error }}</p></li>
                      @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
          <div class="form-group">
            <label for="exampleInputName">Họ và Tên</label>
            <input type="text" class="form-control" id="exampleInputName" placeholder="Họ và Tên" name="name">
          </div>
          <div class="form-group">
            <label for="exampleInputAddress">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputAddress" aria-describedby="address" placeholder="Enter address">
          </div>
          <div class="form-group">
            <label for="exampleInputPhone">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPhone" aria-describedby="emailHelp" placeholder="Số điện thoại">
          </div>
          
          <div class="form-group">
                <label for="exampleInputBirth">Ngày sinh</label>
                <input type="date" name="birth_day" class="form-control" id="exampleInputBirth" >
          </div>
          <input type="submit" class="btn btn-primary" name="btn-submit" value="Add Contact">
          <input type="reset" class="btn btn-danger" value="Clear">
        </form>
    </div>
</body>
</html>