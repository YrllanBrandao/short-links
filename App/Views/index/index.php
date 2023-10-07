<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Short Links: Encurtar links facilmente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <div class="container-fluid p-0 m-0 container-main">
   
    <form action="" class="form-control d-flex flex-column gap-2 align-items-center border-0" method="post" id="form-link">
    <img src="./images/image_01.svg" id="img-main">
        <label for="long-link">Link para encurtamento</label>
        <input type="text" name="long-link" id="long-link" class="form-control" placeholder="Cole sua Url aqui">
        <button type="submit" class="btn btn-warning text-light" id="button-short">Encutar link</button>

        
    </form>
    <div class="container-fluid  d-none p-0 d-flex gap-1" id="shortened-link-area">
          
            <input type="text"  id="shortened-link" class="form-control border-primary" readonly>
            <button class="btn btn-primary" id="button-copy-url">Copiar</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./javascript/main.js"></script>
    <script src="./javascript/copyUrl.js"></script>
  </body>
</html>