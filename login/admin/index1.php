<?php
require("header.php");
?>
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item active">แผนควบคุมของฉัน</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-address-book-o"></i>
              </div>
              <div class="mr-5">ดูตารางสอนทั้งหมด!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-check-square-o"></i>
              </div>
              <div class="mr-5">เข้าเรียน 123 คน</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">ดูรายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-info-circle"></i>
              </div>
              <div class="mr-5">เข้าเรียนสาย 11 คน</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">ดูรายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-times-circle"></i>
              </div>
              <div class="mr-5">ขาดเรียน 13 คน</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">ดูรายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

      </div>

<!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> เช็คชื่อนักศึกษา</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable" autofocus>
                </div>

                <div class="col-sm-2 text-center my-auto">
                <button type="button" class="btn btn-primary btn-block">เช็คชื่อนักศึกษา</button>
                </div>           
                <div class="col-sm-2 text-center my-auto">
                <!-- ใส่วัตถุได้ -->
                <!-- <font size="3" color="red">ไม่สำเร็จ ! </font> -->
                <!-- <font size="3" color="#008000">สำเร็จ ! </font> -->
                </div>


                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-primary">32 คน</div>
                  <div class="small text-muted">นักเรียนทั้งหมด</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-success">20 คน</div>
                  <div class="small text-muted">เข้าเรียนแล้ว</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-warning">10 คน</div>
                  <div class="small text-muted">เข้าเรียนสาย</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-danger">2 คน</div>
                  <div class="small text-muted">ขาดเรียน</div>
                  <hr>
                </div>




              </div>
            </div>
            <div class="card-footer small text-muted">อัปเดตเมื่อเวลา 11:59 นาฬิกา</div>
          </div>

<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ตารางแสดงรายชื่อ</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align:center">รหัสนักศึกษา</th>
                  <th style="text-align:center">ชื่อ-นามสกุล</th>
                  <th style="text-align:center">ชั้น/ห้อง</th>
                  <th style="text-align:center">สาขา</th>
                  <th style="text-align:center">วัน-เวลา</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="text-align:center">รหัสนักศึกษา</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>ชั้น/ห้อง</th>
                  <th>สาขา</th>
                  <th>วัน-เวลา</th>
                </tr>
              </tfoot>
              <tbody>




                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041001.jpg" title="ดูรูปนักศึกษา" >5932041001</a></td>
                  <td>นายกรอบทอง ศรีพิจารย์</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:50</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041002.jpg" title="ดูรูปนักศึกษา" >5932041002</a></td>
                  <td>นางสาวกัญญารัตน์ เกิดดี</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:40</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041003.jpg" title="ดูรูปนักศึกษา" >5932041003</a></td>
                  <td>นายจิติวัฒนา รุ่งพิทยานนท์</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:45</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041004.jpg" title="ดูรูปนักศึกษา" >5932041004</a></td>
                  <td>นางสาวจิราภรณ์ พวงเข็มแดง</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:29:50</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041027.jpg" title="ดูรูปนักศึกษา" >5932041027</a></td>
                  <td>นายสิทธิพงษ์ เส็งดอนไพร</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:30:00</td>
                </tr>
                <tr class="list-group-item-action list-group-item-success">
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041028.jpg" title="ดูรูปนักศึกษา" >5932041028</td>
                  <td >นางสาวสิริภัทร เถาว์น้อย</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:30:20</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041029.jpg" title="ดูรูปนักศึกษา" >5932041029</td>
                  <td>นางสาวสิริรักษ์ ทับแก้ว</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:30:30</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041030.jpg" title="ดูรูปนักศึกษา" >5932041030</td>
                  <td>นางสาวสุชาดา เต็กสุวรรณ</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:31:00</td>
                </tr>
                <tr class="list-group-item-action list-group-item-warning">
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041031.jpg" title="ดูรูปนักศึกษา" >5932041031</td>
                  <td>นางสาวสุพรรษา จิตอ่ำ</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:32:00</td>
                </tr>
                <tr class="list-group-item-action list-group-item-danger">
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041032.jpg" title="ดูรูปนักศึกษา" >5932041032</td>
                  <td><font size="3" color="red">ไม่พบข้อมูลนักศึกษา</font></td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:32:20</td>
                </tr>
                <tr>
                  <td style="text-align:center"><a href="http://182.93.148.91/files/importpicstd/01/5932041033.jpg" title="ดูรูปนักศึกษา" >5932041033</td>
                  <td>นายอริญชย์ ทองจาด</td>
                  <td>ปวส.2/1</td>
                  <td>คอมพิวเตอร์ธุรกิจ</td>
                  <td>2011/04/25 10:32:50</td>
                </tr>


              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">อัปเดตเมื่อเวลา 11:59 นาฬิกา</div>
      </div>
    </div>
    <!-- /.container-fluid-->
<!-- ตารางแสดงรายชื่อ จบ -->






    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบใช้หรือไม่?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">เลือก "ออกจากระบบ" ด้านล่างเพื่อยืนยันการออกจากระบบของคุณ</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-primary" href="../../logout.php">ออกจากระบบ</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
