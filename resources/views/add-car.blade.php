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
      <h1 class="my-3 text-center">add car</h1>
    </div>
    <div class="row col">
      <form action="/add-car" method="post">
        {{csrf_field()}}
        <div class="my-2">
          <label for="name" class="form-label">Car brand name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="my-2">
          <label for="model" class="form-label">Car model name</label>
          <input type="text" name="model" id="model" class="form-control">
        </div>
        <div class="my-2">
          <label for="price" class="form-label">Car price $</label>
          <input type="number" name="price" id="price" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-lg col-12 my-3">Submit</button>
      </form>
    </div>
  </div>
</body>

</html>