<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container vh-100 d-flex align-items-center">
    <a href="/seller" class="p-2" style="position: absolute; top: 0; left: 0">back</a>
    <h1>sold cars</h1>
    <table class="table table-light">
      <thead>
        <tr>
          <th scope="col">car id</th>
          <th scope="col">car brand</th>
          <th scope="col">car model</th>
          <th scope="col">car price ($)</th>
          <th scope="col">client id</th>
          <th scope="col">client name</th>
          <th scope="col">client surname</th>
          <th scope="col">client tel</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($soldcars as $soldcar)
        <tr>
          <td>{{$soldcar->carId}}</td>
          <td>{{$soldcar->brand}}</td>
          <td>{{$soldcar->model}}</td>
          <td>{{$soldcar->price}}</td>
          <td>{{$soldcar->clientId}}</td>
          <td>{{$soldcar->name}}</td>
          <td>{{$soldcar->surname}}</td>
          <td>{{$soldcar->tel}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>