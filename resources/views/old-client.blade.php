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
      <h1 class="my-3 ">selling car to old client</h1>
      <ul>
        <li>id: {{$car->id}}</li>
        <li>brand: {{$car->brand}}</li>
        <li>model: {{$car->model}}</li>
        <li>price: {{$car->price}}</li>
      </ul>
    </div>
    <div class="row col">
      <table class="table table-light">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">surname</th>
            <th scope="col">tel</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($clients as $client)
          <tr>
            <td><a href="/sell-car-old-client-complete/{{$car->id}}/{{$client->id}}">select</a></td>
            <td>{{$client->id}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->surname}}</td>
            <td>{{$client->tel}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>