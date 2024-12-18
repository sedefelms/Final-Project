<?php
    include("database.php");
    $sql_posts = "SELECT * FROM posts";
    $result_posts = mysqli_query($connection, $sql_posts);
    $sql_users = "SELECT * FROM users";
    $result_users = mysqli_query($connection, $sql_users);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>  
     <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            height: 100%;
            font-family:Arial, Helvetica, sans-serif;
            background-color: #2E4C6D;
        }
        .col1 {
            display: inline-block;  
            height: 100%;
            width: 300px;
            /* padding-left: 30px; */
            margin: 0;
            padding-top: 10px;
            margin-left: 70px;
        }
        .col2 {
            /* display: inline-block; */
            height: 100%;
            width: calc(100% - 370px);
            margin: 0;
            float:right;
            padding-top: 10px;
            padding-right: 100px;
            padding-left: 90px;
            
        } 
        .leftside {
            background-color: #8db1d7;
            height: 100%;
            border-radius: 4px;
            padding-left: 10px;
            padding-right: 5px; 
            border: 3px solid #03254c;
            padding-bottom: 10px;
        }
        .leftside h3 {
            text-align: center;
            padding-top: 10px;
        }
        .rightside {
            background-color: #c6d7ea;
            height: 100%; 
            border: 3px solid #03254c;
            border-radius: 4px;
        }
        i {
            color: #2E4C6D;
        }
        .card img {
            width: 100%;
        }
        .card {
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 10px;
            border: 1px solid #2E4C6D;
            margin: 10px;
            border-radius: 3px;
            background-color: #dce6f1;
        }
        .user_name {
            color: #03254c;
            display: inline-block;
            width: 100px;
            font-size: large;
            font-weight: bold;
        }
        .date {
            display: inline-block;
            text-align: right;
            float: right;
            font-size: small;
        }
        .image {
            padding-bottom: 10px;
        }
        .row1 {
            background-color: #c6d7ea;
            height: 300px;
            text-align: center;
            margin-left: 30px;
            margin-right: 30px;
            margin-top: 10px;
        }
        .profile-picture {
            height: 150px;
            width: 150px;
            object-fit: contain;
            border-radius: 50%;
            background-color: black;
        }
         
        .profile {
            text-align: center;
            padding-top: 20px;
            /* display: inline-block; */
        }
        .create-post {
            display: inline-block;
            float: right;
            
        }
        .create-post-nav a {
            text-decoration: none;
            color: #fff;
            border: 3px solid #03254c;
            padding: 10px;
            margin-bottom: 10px;
            margin-right: 50px;
            border-radius: 8px;
            background-color: #03254c;
        }
        .profile p {
            font-weight: bold;
            font-size: larger;
            color: #03254c;
        }
        

    </style>
</head>
<body>
    <?php
        include_once 'header1.php';?>
    <main>
        <div class="row1">
            <div class="profile">
                <img class="profile-picture" src="son-yeni1.jpg" alt="">
                <p><?php echo $_SESSION["username"]; ?></p>
            </div>
            <div class="create-post">
                <nav class="create-post-nav">
                    <a href="post-olustur.php">Paylaşım yap!</a>
                </nav>
            </div>
        </div>
        
        <div class="row2">
            <div class="col1">
                <div class="leftside">
                    <h3>Hesap Bilgileri</h3>
                    <div>
                        <i class="fa-solid fa-image-portrait fa-2xl"></i>
                        <?php echo $_SESSION['name']." ".$_SESSION['surname'];?>
                    </div>
                    <br>
                    <div>
                        <i class="fa-solid fa-cake-candles fa-xl"></i>
                        <?php echo $_SESSION['dob'];?>
                    </div>
                    <br>
                    <div>
                        <i class="fa-solid fa-venus-mars fa-xl"></i>
                        <?php 
                        $gender_original = $_SESSION['gender'];
                        $gender_length = strlen($gender_original);
                        $gender = strtoupper($gender_original[0]).substr($gender_original, 1, $gender_length);
                                                
                        echo $gender;?>
                    </div>
                    

                </div>
            </div>
            <div class="col2">
                <div class="rightside">
                    <?php 
                        while($row_posts = mysqli_fetch_assoc($result_posts)){
                            $id = $row_posts["user_id"];
                            $username_sql = "SELECT username FROM  users WHERE id = $id";   
                            $username_result = mysqli_query($connection, $username_sql);
                            $username_row =  mysqli_fetch_assoc($username_result);
                            if($username_row['username'] == $_SESSION['username']){
                    ?>
                    <div class="posts">
                        <div class="card">
                            <div class="user_name">  
                                <p><?php  
                                echo $username_row["username"];
                                ?></p>
                            </div>
                            <div class="date">
                                <p><?php echo $row_posts["post_date"]; ?></p>
                            </div>
                            <div class="caption">
                                <p><?php echo $row_posts["post_info"]; ?></p> 
                            </div>
                            <div class="image">
                                <img src="<?php echo $row_posts["post_image"]; ?>" alt="">
                            </div>
                        </div>                            
                    <?php }
                    }?>                 
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php
mysqli_close($connection);

?>
