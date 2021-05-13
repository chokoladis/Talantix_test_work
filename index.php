<?include 'db.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <title>Контакты</title>
</head>
<body>
    <section>
        <div class="add_contact">
            <h6>Добавить контакт</h6>
            <form action="#" method="post">
                <input type="text" id="people" name="people" placeholder="Имя">
                <input type="tel" id="phone" name="phone" placeholder="Телефон">
                <input type="submit" id="submit" name="submit" value="Добавить">
            </form>
            <?
                $user = $_POST['people'];
                $phone = $_POST['phone'];
                if(isset($_POST['submit'])) {                                       
                    $query = "INSERT INTO `contact` VALUES(NULL,'$user', '$phone')";
                    $res = mysqli_query($connect,$query);
                }
            ?>
        </div>
        <div class="list_contacts">
            <h6>Список контактов</h6>
            <ul>
                <?
                    $i=0;
                    $query2 =  mysqli_query($connect,"SELECT * FROM `contact`");
                    $n = mysqli_num_rows($query2);
                    while($r = mysqli_fetch_array($query2)){
                        echo "
                        <li>
                            <p class='name'>{$r[name]} "?><a class="delete" href='?del=<?=$r['id']?>'>X </a><? echo "</p>
                            <p class='tel'>{$r[phone]}</p>
                        </li>
                        ";
                        $i++;   
                    }                                                                  
                    
                    if (isset($_GET['del'])) {
                        $id=$_GET['del'];
                        $query3 = mysqli_query($connect,"DELETE FROM `contact` WHERE id=$id");
                        
                    }
                    
                ?>
                
            </ul>
        </div>
    </section>
</body>
</html>