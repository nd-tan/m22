<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            color: red;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post" action="">
            <legend>Add Product</legend>
          
            <div class="mb-3">
                <label for="disabledTextInput" >Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="<?php if(isset($name)){echo $name;}  ?>">
                <span><?php if (isset($err['name'])) {
                            echo $err['name'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" >Age</label>
                <input type="text" name="age" id="" class="form-control" placeholder="" value="<?php if(isset($age)){echo $age;}  ?>">
                <span><?php if (isset($err['age'])) {
                            echo $err['age'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Color</label>
                <input type="text" name="color" id="" class="form-control" placeholder="" value="<?php if(isset($color)){echo $color;}  ?>">
                <span><?php if (isset($err['color'])) {
                            echo $err['color'];
                        }
                          ?></span>
            </div>

                <!-- <label for="disabledTextInput" class="form-label">Breed</label>
                <input type="text" name="breed" id="" class="form-control" placeholder="" value=""> -->

 
            <label for="disabledTextInput" class="form-label">Breed</label>
            <div class="form-check form-check-inline">
            <select name = "breed" id= "breed">
                <?php foreach ($cate as $cates){ ?>
                <option value="<?=$cates->id ?>"><?=$cates->name ?></option>
                <?php  } ?><br>
                <span><?php if (isset($err['breed'])) {
                            echo $err['breed'];
                        }
                          ?></span>
            </select>
            </div><br>



            <label for="disabledTextInput" class="form-label">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="" value="Male_Dog" checked/>Male Dog
                <label class="form-check-label" for="inlineRadio1"></label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="" value="Bitch" />Bitch
                <label class="form-check-label" for="inlineRadio2"></label>
            </div><br>
            <span><?php if (isset($err['gender'])) {
                            echo $err['gender'];
                        }
                          ?></span>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Price($)</label>
                <input type="text" name="price" id="" class="form-control" placeholder="" value="<?php if(isset($price)){echo $price;}  ?>">
                <span><?php if (isset($err['price'])) {
                            echo $err['price'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="" class="form-control" placeholder="" value="<?php if(isset($quantity)){echo $quantity;}  ?>">
                <span><?php if (isset($err['quantity'])) {
                            echo $err['quantity'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Images</label>
                <input type="file" name="image" id="" class="form-control" placeholder="">
                <span><?php if (isset($err['image'])) {
                            echo $err['image'];
                        }
                          ?></span>
            </div>
            <!-- <div class="mb-3">
                <label for="disabledTextInput" class="form-label">ngay sinh</label>
                <input type="date" name="birthday" class="form-control" value="">
            </div> -->
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="ProductController.php?action=index" class="btn btn-danger">cancel</a>


        </form>
    </div>
</body>

</html>