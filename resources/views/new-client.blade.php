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
      <h1 class="my-3 ">selling car to new client</h1>
      <ul>
        <li>id: {{$car->id}}</li>
        <li>brand: {{$car->brand}}</li>
        <li>model: {{$car->model}}</li>
        <li>price: {{$car->price}}</li>
      </ul>
    </div>
    <div class="row col">
      <form action="/sell-car-new-complete" method="post">
        {{csrf_field()}}
        <div class="my-2">
          <label for="name" class="form-label">Client name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="my-2">
          <label for="surname" class="form-label">Client surname</label>
          <input type="text" name="surname" id="surname" class="form-control">
        </div>
        <div class="my-2">
          <label for="tel" class="form-label">Car tel. number</label>
          <input type="text" name="tel" id="tel" class="form-control">
        </div>
        <input type="hidden" name="carId" id="carId" value="{{$car->id}}">
        <button type="submit" class="btn btn-primary btn-lg col-12 my-3">Sell!</button>
      </form>
    </div>
  </div>
</body>

</html>