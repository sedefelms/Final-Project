<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        /* div{
            width: 300px;
        }
        img {
            height: 500px;
            width: 500px;
            object-fit: contain;
            border-radius: 50%;
            background-color: black;
        }  */
        .post-olustur {
            background-color: #c6d7ea;
            position: absolute; 
            /* top: 50%;
            left: 50%; */
            /* transform: translate(-50%, -50%);
            overflow: hidden; */
            width: 500px;
            min-height: 100px;
            padding: 15px;
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
            display: inline-block;
            margin-left: calc(50% - 250px);
            margin-right: calc(50% - 250px);
        }
        input {
            width: 100%;
            display: block;
            border: none;
        }
        .gir {
            height: 100px;
            width: 100%;
            resize: none;
            border: none;
        }
        .buton {
            padding: 10px;
            cursor: pointer;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        } 
        #ekle {
            width: 100px;
            float: right;
        }
        img {
            width: 100%;       
        }
    </style>
</head>

<body>
    <!-- <div>
        <img src="son-yeni1.jpg" alt="">
    </div> -->
    <?php
        include_once 'header1.php';?>
    <div class="post-olustur">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
            <!-- <input type="text" placeholder="Açıklama" class="gir" name="description" > -->
            <textarea name="description" class="gir" cols="30" rows="10" 
            placeholder="Açıklama"></textarea>
                           
                <?php
                if (isset($_FILES['ekle']) && $_SERVER["REQUEST_METHOD"] == "POST"){
                    $image = $_FILES['ekle'];
                    $imagefilename = $image['name'];
                    $explodedarray = explode(".", $imagefilename);
                    // $user_id = $_SESSION['id'];
                    $extension = $explodedarray[sizeof($explodedarray) -1];
                    $post_info = $_POST['description'];
                    $post_date = date('Y-m-d H:i:s');
                    ?>
                    <p><?php echo $post_info;?> </p>
                    <?php
                    global $user_id;
                    if ($extension == "jpg") {
                        $sql = "INSERT INTO posts (post_info, post_image, user_id, post_date) VALUES ('$post_info', '$imagefilename', '$user_id', '$post_date')";
                    ?>                   
                    <br>
                    <img src=<?php echo $imagefilename?> alt=<?php echo $imagefilename?>>
                    <?php
                    }

                    else {
                        $imagefilename = null;
                        $sql = "INSERT INTO posts (post_info, post_image, user_id) VALUES ('$post_info', '$imagefilename', '$user_id')";
                    }
                    mysqli_query($connection, $sql);  
                    echo "<script> alert('Paylaşım yapıldı!');
                    window.location.href='deneme.php';
                    </script>";               
                }
                ?>
            
            
            <input type="file" value="Fotoğraf ekle" class="buton" id="ekle" name="ekle">
            <input type="submit" value="Paylaş" class="buton" name="paylas"> 

        </form>
    </div>
</body>
</html>
