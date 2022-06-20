<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
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
            <form>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Name</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $detail->name }}" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlAddress">Address</label>
                  <input type="text" class="form-control" id="exampleFormControlAddress" value="{{ $detail->address }}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPhone">Phone</label>
                    <input type="text" class="form-control" id="exampleFormControlPhone" value="{{ $detail->phone }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlBirthDay">Birth Day</label>
                    <input type="text" class="form-control" id="exampleFormControlBirthDay" value="{{ $detail->birth_day }}" readonly>
                  </div>
              </form>
        </div>
    </div>
</body>
</html>