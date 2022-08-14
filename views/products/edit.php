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
            <legend>Edit Product</legend>
          
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="<?=$obj->name; ?>">
                <span><?php if (isset($err['name'])) {
                            echo $err['name'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Age</label>
                <input type="text" name="age" id="" class="form-control" placeholder="" value="<?=$obj->age; ?>">
                <span><?php if (isset($err['age'])) {
                            echo $err['age'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Color</label>
                <input type="text" name="color" id="" class="form-control" placeholder="" value="<?=$obj->color; ?>">
                <span><?php if (isset($err['color'])) {
                            echo $err['color'];
                        }
                          ?></span>
            </div>
            <label for="disabledTextInput" class="form-label">Breed</label>
            <div class="form-check form-check-inline">
            <select name = "breed" value="<?=$cates->id?>">
                <?php foreach ($cate as $cates){ ?>
                <option <?=$cates->id == $obj->categories_id ? 'selected': ''?> value="<?=$cates->id ?>"><?=$cates->name?></option>
                <?php  } ?><br>
                <span><?php if (isset($err['breed'])) {
                            echo $err['breed'];
                        }
                          ?></span>
            </select>
            </div><br>
            <label for="disabledTextInput" class="form-label">Gender</label><br>
            <div class="form-check form-check-inline">
            <?php $signi= $obj->gender; ?> 
                <input class="form-check-input" type="radio" name="gender" id="" value="Male_Dog"  <?php if($signi=='Male_Dog'){ echo "checked=checked";}; ?>/>Male Dog
                <label class="form-check-label" for="inlineRadio1"></label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="" value="Bitch" <?php if($signi=='Bitch'){ echo "checked=checked";};  ?> />Bitch
                <label class="form-check-label" for="inlineRadio2"></label>
            </div><br>
            <span><?php if (isset($errors['gender'])) {
                            echo $errors['gender'];
                        }
                          ?></span>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Price($)</label>
                <input type="text" name="price" id="" class="form-control" placeholder="" value="<?=$obj->price; ?>">
                <span><?php if (isset($err['price'])) {
                            echo $err['price'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Quantity</label>
                <input type="text" name="quantity" id="" class="form-control" placeholder="" value="<?=$obj->quantity; ?>">
                <span><?php if (isset($err['quantity'])) {
                            echo $err['quantity'];
                        }
                          ?></span>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Images</label>
                <input type="file" name="img" id="" class="form-control" placeholder="" value="<?=$obj->image; ?>">
                <td><img src="../Img/img/<?php echo $obj->image ?>" width="120px" height="120px" alt=""></td>
                <span><?php if (isset($err['img'])) {
                            echo $err['img'];
                        }
                          ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="ProductController.php?action=index" class="btn btn-danger">cancel</a>
        </form>
    </div>
</body>

</html>