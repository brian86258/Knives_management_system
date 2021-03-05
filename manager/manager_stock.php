<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
    <link rel="stylesheet" type="text/css" href="M_browse.css?version=&lt;?php echo time(); ?&gt;">
    <link rel="stylesheet" type="text/css" href="info.css?version=&lt;?php echo time(); ?&gt;">


    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="action.js"></script>
    <title>Atlantic.Co</title>
    <?php 
    session_start();
    include("mysql_connection.php");
    ?>
</head>

<body>
    <div class="super_container">
        <header>
            <div class="logo"></div>
            <nav>
          <!--      <div class="search navitem">
                <input class="search_text" type="text" value="請輸入商品名稱"></input>
              <input class="search__button" type="button" name="" value="確定">
              </div> -->
     
            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./manager_browse.php">訂單管理</a>
            </div>

            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./manager_stock.php">庫存管理</a>
            </div>

            
            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./manager_product.php">產品管理</a>
            </div>

            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./manager_finance.php">資金管理</a>
            </div>
        
            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./logout.php">登出</a>
            </div>
              
            </nav>
        </header>
        
        <hr>
        <?php
            // echo $_SESSION['username']."<br>".$_SESSION['company'];
            $company=$_SESSION['company'];
            $sql="SELECT * FROM stock_ingredient ";
            $result = mysqli_query($db_link, $sql);
            // echo "<br>$row[0] $row[1]";
        ?>
        <div claas="user_table">
            <table id="cus_order">
                <tr>
                    <th>原料名稱</th>
                    <th>剩餘數量</th>
                    <th>購買原料</th>
 

                </tr>
                <?php  while($row=mysqli_fetch_row($result)){ ?>
                    <tr>
                        
                        <td><?php echo "$row[0]"?></td>
                        <td><?php echo "$row[1]"?></td>
                        <td>
                        <form name="form" method="post" action="purchase_ing.php" class="login" accept-charset="utf-8" οnsubmit="document.charset='utf-8';">
                            <input type="number" name="purchase_num" min="1" max="100000"/>
                            <input type="submit" value="購買"/>
                            <input type="hidden" name="ing_name" value="<?php echo "$row[0]"?>">
                            <input type="hidden" name="ing_num" value="<?php echo "$row[1]"?>">
                        </form>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>

        
        
    </div>
</body>
</html>