<script>
        function deleteConfirm(){
            if(confirm("Are you sure?")){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    
   

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Mục lục</span>
                        <ul>
                            <?php Department($conn); ?>
                        </ul>
                        </div>
                        
                        <ul>
                        <li ><a  href="?page=pm">Tâdt cả</a></li>

                        <?php Category_List($conn ); ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                    
                                </div>
                                <input type="text" placeholder="Bạn cần tìm gì ?">
                                <button type="submit" class="site-btn">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 90 720 0573</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="ATNtoy/background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Quản lý sản phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="?page=content">Trang chủ</a>
                            <span>Trang quản lý sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Breadcrumb Section End -->

    <!-- Product Management Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Các sản phẩm</th>
                                    <th class="shoping__product">Loại</th>
                                    <th class="shoping__product">Chi nhánh </th>
                                    
                                    <th>  Giá</th>
                                    <th>Số lượng</th>
                                    <th><a href="?page=addp">Thêm</a></th>
                                    
                                    
                                </tr>
                            </thead>
                            <?php //del button on pm 
                                include_once("connection.php");
                                if(isset($_GET["function"])=="del"){
                                    if(isset($_GET["id"])){
                                        $id=$_GET["id"];
                                        $sq="SELECT pro_image from product WHERE product_id='$id'";
                                        $res= pg_query($conn, $sq);
                                        $row= pg_fetch_array($res, NULL, PGSQL_ASSOC);
                                        $filePic= $row['pro_image'];
                                        pg_query($conn,"DELETE FROM product WHERE product_id='$id'");
                                        echo '<meta http-equiv="refresh" content="0;URL =?page=pm"/>'
                                        ?>
                                        <!-- <script> document.getElementById("CMM").click();</script>  -->
                                        
                                        <?php
                                        
                                    }
                                ?>
                                    
            
                                <?php  
                                }
                                ?>
                            <tbody>
                            <?php //
                                 if(isset($_GET['id'])){
                                    $id=$_GET['id'];
                                    $result = pg_query($conn,"SELECT product.product_id, product.product_name, branch.branch_name, product.price, product.pro_qty, product.pro_image, category.cat_name 
                                    from product, category, branch where product.cat_id = category.cat_id and product.branch_id=branch.branch_id '$id'=category.cat_id ");
            
                                }else{
                                    $result = pg_query($conn,"SELECT product.product_id, product.product_name,branch.branch_name, product.price, product.pro_qty, product.pro_image, category.cat_name 
                                    from product, category, branch where product.cat_id = category.cat_id and product.branch_id=branch.branch_id ");
                                }
                                while($row=pg_fetch_array($result, NULL, PGSQL_ASSOC)) { 
                                    ?>



                                <tr>
                                    <td class="shoping__cart__item" style="width: 1000px">
                                        <img src="ATNtoy/<?php echo $row['pro_image'] ?>" alt="">
                                        <h5><?php echo $row["product_name"]; ?></h5>
                                    </td>
                                    <td class="shoping__cart__item">
                                        
                                        <h5><?php echo $row["cat_name"]; ?></h5>
                                    </td>
                                    <td class="shoping__cart__name">
                                        <?php echo $row["branch_name"]; ?>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo $row["price"];*1000 ?> VNĐ
                                    </td>
                                    <td class="shoping__cart__price">
                                        
                                            
                                                <?php echo $row["pro_qty"]; ?>
                                            
                                        
                                    </td>
                                    <td class="shoping__cart__total">
                                       <a href="?page=edit&&id=<?php echo $row['product_id'] ?>"> Sửa</a>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        
                                        <a href="?page=pm&&function=del&&id=<?php echo $row["product_id"];?>" onclick="return deleteConfirm()"><span class="icon_close"></span>
                                        
                                    </td>
                                </tr>
                                <?php
                                     
                                     }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            
        </div>
    </section>
    <!-- Shopping Cart Section End -->
