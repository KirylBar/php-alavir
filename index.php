<?php

if(isset($_POST['submit'])){
  if(!preg_match("/^[a-zA-Z]+$/",$_POST['name'])){
    $errorName = 'Имя должно содержать только латинские буквы';
  }
  if(!preg_match("/^[0-9\-\+]+$/",$_POST['phone'])){
    $errorPhone = 'Телефон должен содержать только цифры и знаки + и -';
  }
  if(!preg_match("/@/",$_POST['email'])){
    $errorEmail = 'Email должен содержать @';
  }
  if(!preg_match("/^[0-9]+$/",$_POST['ticks'])){
    $errorTicks = 'Введите целое неотрициательное число';
  }

  $allOk = (!$errorName && !$errorPhone && !$errorTicks) ? true : false;
 
}

if($allOk){

  $redBacteriym = 1;
  $greenBacteriym = 1;

  for ($i = 0; $i < $_POST['ticks']; $i++) {
    $greenFromGreen = $greenBacteriym * 3;
    $redFromGreen = $greenBacteriym * 4;
    $greenFromRed = $redBacteriym * 7;
    $redFromRed = $redBacteriym * 5;
  
    $redBacteriym = $redFromGreen + $redFromRed;
    $greenBacteriym = $greenFromGreen + $greenFromRed;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body class="vh-100">
    <div class="container">
      <form
        action="index.php"
        method="post"
        class="mx-auto mt-5"
        style="width: 420px"
      >
        <div class="form-floating mb-2">
          <input
            type="text"
            class="form-control"
            id="floatingInput1"
            placeholder="Имя"
            name="name"
            required
            <?php
              if(!isset($errorName) && $_POST['name']) echo "value = ".$_POST['name']
            ?>
          />
          <label for="floatingInput1">Имя</label>
          <span class="text-danger"><?php if($errorName) echo $errorName ?></span>
        </div>
        <div class="form-floating mb-2">
          <input
            type="email"
            class="form-control"
            id="floatingInput2"
            placeholder="Почта"
            name="email"
            required
            <?php
              if(!isset($errorEmail) && $_POST['email']) echo "value = ".$_POST['email']
            ?>
          />
          <label for="floatingInput2">Почта</label>
          <span class="text-danger"><?php if($errorEmail) echo $errorEmail ?></span>
        </div>
        <div class="form-floating mb-2">
          <input
            type="text"
            class="form-control"
            id="floatingInput3"
            placeholder="Номер телефона"
            name="phone"
            required
            <?php
              if(!isset($errorPhone) && $_POST['phone']) echo "value = ".$_POST['phone']
            ?>
          />
          <label for="floatingInput3">Номер телефона</label>
          <span class="text-danger"><?php if($errorPhone) echo $errorPhone ?></span>
        </div>
        <div class="form-floating mb-2">
          <input
            type="number"
            class="form-control"
            id="floatingInput1"
            placeholder="Число тактов времени"
            autocomplete="off"
            min="1"
            name="ticks"
            required
          />
          <label for="floatingInput1">Число тактов времени</label>
          <span class="text-danger"><?php if($errorTicks) echo $errorTicks ?></span>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mx-auto">
          Отправить
        </button>
      </form>
     
      <?php
        if($allOk){
      ?>
      <p class="alert-success mx-auto mt-4 p-3 text-center" style="width: 420px;">
      <?  
          if(is_infinite($redBacteriym) || is_infinite($greenBacteriym )){
            echo "Эти числа настолько велики, что не заслуживают Вашего внимания.";
          }else{
            echo "Колличество красных бактерий: $redBacteriym";
            echo "<br>";
            echo "Колличество зелёных бактерий: $greenBacteriym";
          }
        }
      ?>
      </p>
    </div>
  </body>
</html>
