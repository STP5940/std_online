<?php
require("header.php");

#จำนวนนักเรียน
$result_std = mysqli_query($con, "SELECT ID FROM student");
$Num_std = mysqli_num_rows($result_std);

#จำนวนครู
$result_teacher  = mysqli_query($con, "SELECT ID FROM user WHERE Userlevel='T' ");
$Num_teacher = mysqli_num_rows($result_teacher);
?>

<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item active">แผนควบคุมของฉัน</li>
      </ol>

      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-users"></i>
              </div>
              <div class="mr-5">จัดการรายชื่อนักศึกษา</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="add_studen.php">
              <span class="float-left">ดูรายละเอียด</span>
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
                <i class="fa fa-street-view"></i>
              </div>
              <div class="mr-5">จัดการรายชื่อครูผู้สอน</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="add_teacher.php">
              <span class="float-left">ดูรายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-file-text-o"></i>
              </div>
              <div class="mr-5">จัดการตารางสอนครู</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="add_subjects.php">
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
                <i class="fa fa-calendar"></i>
              </div>
              <div class="mr-5">เพิ่มวันหยุดนักขัตฤกษ์</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="add_holiday.php">
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
              <i class="fa fa-bar-chart"></i> จำนวนผู้ใช้ในระบบ</div>
            <div class="card-body">
              <div class="row">

                <div class="col-sm-3 text-center my-auto">
                </div>

                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-primary"><?php echo $Num_std; ?> คน</div>
                  <div class="small text-muted">จำนวนนักเรียนทั้งหมด</div>
                  <hr>
                </div>
                <div class="col-sm-3 text-center my-auto">
                  <hr>
                  <div class="h4 mb-0 text-success"><?php echo $Num_teacher; ?> คน</div>
                  <div class="small text-muted">จำนวนครูทั้งหมด</div>
                  <hr>
                </div>
                


                <div class="col-sm-3 text-center my-auto">
                </div>
              

              </div>
            </div>
            <div class="card-footer small text-muted">อัปเดตเมื่อเวลา <?php Time_now() ?> นาฬิกา</div>
          </div>

          

<?php
require("footer.php");
?>
