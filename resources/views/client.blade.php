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
    <div class="row col">
      <h1 class="my-3 ">client</h1>
      <ul>
        <li>id: {{$client->clientId}}</li>
        <li>name: {{$client->name}}</li>
        <li>surname: {{$client->surname}}</li>
        <li>tel: {{$client->tel}}</li>
      </ul>
    </div>
    <div class="row col">
      <table class="table table-light">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">brand</th>
            <th scope="col">model</th>
            <th scope="col">price</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($cars as $car)
          <tr>
            <td>{{$car->carId}}</td>
            <td>{{$car->brand}}</td>
            <td>{{$car->model}}</td>
            <td>{{$car->price}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>