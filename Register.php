
<section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Mục</span>
                        </div>
                        <ul>
                            <li><a href="#">Thực phẩm chức năng</a></li>
                            <li><a href="#">Dầu</a></li>
                            
                            <li><a href="#"> Vitamin</a></li>
                            
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
                                <input type="text" placeholder="What do yo u need?">
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
<section class="breadcrumb-section set-bg" data-setbg="ATNtoy/background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đăng ký</h2>
                        <div class="breadcrumb__option">
                            <a href="?page=content">Trang chủ</a>
                            <span>Đăng ký</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
if(isset($_POST['btnRegister']))
{
    $us = $_POST ['txtUsername'];
    $pass1= $_POST['txtPass1'];
    $pass2= $_POST['txtPass2'];
    $fullname= $_POST['txtFullname'];
    $email= $_POST['txtEmail'];
    $address= $_POST['txtAddress'];
    $tel= $_POST['txtTel'];

    if(isset($_POST['grpRender']))
    {
        $sex= $_POST['grpRender'];
    }
    $date = $_POST['slDate'];
    $month = $_POST['slMonth'];
    $year = $_POST['slYear'];

    $err ="";
    if($us==""||$address=="" ||$pass1=="" ||$fullname==""||$email==""||$tel==""||!isset($sex))
    {
        $err.="<li>Enter fields with mark(*), please</li>";
    }
    if(strlen($pass1)<=5)
    {
        $err.="<li>Password must be greater than 5 chars</li>";
    }
    if($pass1!=$pass2)
    {
        $err.="<li>Password and confirm password are the same</li>";
    }
    if($_POST['slYear']=="0")
    {
        $err.="<li>Choose Year of Birth, please</li>";

    }
    if($err!="")
    {
        echo $err;
    }
    else{

        include_once("connection.php");
        $pass=md5($pass1);
        $sq="SELECT * FROM customer WHERE username='$us' OR email='$email'";
        $res= pg_query($conn,$sq);

        // neu khong bi trung email va user
        if(pg_num_rows($res)==0)
        {
            pg_query($conn,"INSERT INTO customer (username, password, custname, gender, address, telephone,
             email, cusdate, cusmonth, cusyear, ssn, activecode, state)
             VALUES ('$us','$pass','$fullname','$sex', '$address', '$tel', '$email',
              $date, $month, $year,'','',0)") or die(pg_error($conn));
             echo"You have registered successfully";

        }
        else 
        {
            echo "Username or email already exists";
        }
       
    }

}
?>
 
<div class="container">
        <h2>Đăng ký thành viên</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label">Tên tài khoản(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="ên tài khoản" value=""/>
							</div>
                      </div>  
                      
                       <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Mật khẩu(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass1" id="txtPass1" class="form-control" placeholder="Mật khẩu"/>
							</div>
                       </div>     
                       
                       <div class="form-group"> 
                            <label for="" class="col-sm-2 control-label">Nhập lại mật khẩu(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass2" id="txtPass2" class="form-control" placeholder="Nhập lại mật khẩu"/>
							</div>
                       </div>     
                       
                       <div class="form-group">                               
                            <label for="lblFullName" class="col-sm-2 control-label">Tên đầy đủ(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtFullname" id="txtFullname" value="" class="form-control" placeholder="Nhập tên đầy đủ"/>
							</div>
                       </div> 
                       
                       <div class="form-group">      
                            <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="Email"/>
							</div>
                       </div>  
                       
                        <div class="form-group">   
                             <label for="lblDiaChi" class="col-sm-2 control-label">Địa chỉ(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" value="" class="form-control" placeholder="Địa chỉ"/>
							</div>
                        </div>  
                        
                         <div class="form-group">  
                            <label for="lblDienThoai" class="col-sm-2 control-label">Số điện thoại(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTel" id="txtTel" value="" class="form-control" placeholder="Số điện thoại" />
							</div>
                         </div> 
                         
                          <div class="form-group">  
                            <label for="lblGioiTinh" class="col-sm-2 control-label">Giới tính(*):  </label>
							<div class="col-sm-10">                              
                                      <label class="radio-inline"><input type="radio" name="grpRender" value="0" id="grpRender"  />
                                      Male</label>
                                    
                                      <label class="radio-inline"><input type="radio" name="grpRender" value="1" id="grpRender" />
                                      
                                      Female</label>

							</div>
                          </div> 
                          
                          <div class="form-group"> 
                            <label for="lblNgaySinh" class="col-sm-2 control-label">Ngày tháng năm sinh(*):  </label>
                            <div class="col-sm-10 input-group">
                                <span class="input-group-btn">
                                  <select name="slDate" id="slDate" class="form-control" >
                						<option value="0">Choose Date</option>
										<?php
                                            for($i=1;$i<=31;$i++)
                                             {                                                
                                                 echo "<option value='".$i."'>".$i."</option>";
                                             }
                                        ?>
                				 </select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slMonth" id="slMonth" class="form-control">
                					<option value="0">Choose Month</option>
									<?php
                                        for($i=1;$i<=12;$i++)
                                         {
                                             echo "<option value='".$i."'>".$i."</option>";
                                         }
                          
                                    ?>
                				</select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slYear" id="slYear" class="form-control">
                                    <option value="0">Choose Year</option>
                                    <?php
                                        for($i=1970;$i<=2020;$i++)
                                         {
                                             echo "<option value='".$i."'>".$i."</option>";
                                         }
                                    ?>
                                </select>
                                </span>
                           </div>
                      </div>	
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="site-btn" name="btnRegister" id="btnRegister" value="Register" />
                              	
						</div>
                     </div>
				</form>
</div>

    

