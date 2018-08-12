<?php
	require'../../class.php';

	$id = $_GET['data'];

	$obj = new Dataphp();
	$obj->workerinformation($id);

	$data = mysqli_fetch_assoc($obj->workerinformation);

?>


                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg">
                                <img width="100%" alt="user" src="../plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)">
                                            <img src="../plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
                                        </a>
                                        <h4 class="text-white"><?php echo $data['Fname']." ".$data['Lname']; ?></h4>
                                        <h5 class="text-white"><?php echo $data['Email']; ?></h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success" onclick="change_workerinformation()">บันทึกข้อมูล</button>
                        <button class="btn btn-danger" onclick="delete_worker()">ปิดบัญชี</button>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" id="data_change">
                                <div class="form-group">
                                    <label class="col-md-12">สถานะการทำงาน</label>
                                    <div class="col-md-6">
                                        <select name="status" class="form-control form-control-line">
                                            <option>พร้อมทำงาน</option>
                                            <option>ไม่พร้อมทำงาน</option>
                                        </select>
                                    </div>
                                    </div>
                                <div class="form-group">
                                    <label class="col-md-12">ชื่อเต็ม</label>
                                    <div class="col-md-12">
                                        <input type="text" name="fname" placeholder="<?php echo $data['Fname']; ?>" class="form-control form-control-line"> 
                                    <input type="text" name="lname" placeholder="<?php echo $data['Lname']; ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">อีเมลล์</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" placeholder="<?php echo $data['Email']; ?>" class="form-control form-control-line" name="example-email"
                                            id="example-email"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">เบอร์โทร</label>
                                    <div class="col-md-12">
                                        <input name="phone" type="text" placeholder="<?php echo $data['Phone']; ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-12">ที่อยู่</label>
                                        <div class="col-md-12">
                                            <input name="addr" type="text" placeholder="<?php echo $data['Address']; ?>" class="form-control form-control-line"> </div>
                                    </div>

                            </form>
                        </div>
                    </div>