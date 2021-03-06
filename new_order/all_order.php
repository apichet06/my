<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../header/css.php' ?>
</head>

<body class="hold-transition  accent-darksidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="wrapper">

        <?php  include '../header/menu_header.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container text-center">
                    <!-- Info boxes -->
                    <div class="row"> 
                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-users mr-1"></i>
                                        แสดงรายการใบจัดทำงานใหม่ทั้งหมด
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a href="../new_order/index.php" class="btn btn-sm btn-info" ><?= $plus ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row"> <!-- start row head -->
                                        <div class="col">
                                            <label class="form-check-label">#</label>
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">เลขที่ JOB</label>
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">รหัสลูกค้า</label>
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">ชื่อลูกค้า</label>
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">วันที่จัดทำ</label>
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">พิมพ์เอกสาร</label>
                                        </div>
                                    </div> <!-- end row head -->
                                        <hr>

                                    <?php
                                        $i=1;
                                        $sql01 = "SELECT * FROM new_order";
                                        $rs01 = mysqli_query($conn,$sql01);
                                        while($rows01=mysqli_fetch_array($rs01)){
                                            $sql02 = "SELECT * FROM customer WHERE c_id = '".$rows01['c_id']."' ";
                                            $rs02 = mysqli_query($conn,$sql02);
                                            $rows02=mysqli_fetch_array($rs02)
                                    ?>
                                    <div class="row mt-2"> <!-- start row while -->
                                        <div class="col">
                                            <label class="form-check-label"><?=$i++?></label>
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label"><?=$rows01['n_number']?></label>
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label"><?=$rows01['c_id']?></label>
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label"><?=$rows02['customer_name']?></label>
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label"><?=$rows01['n_datejob']?></label>
                                        </div>
                                        <div class="col">
                                            <a href="../new_order/new_order_print.php?n_id=<?=$rows01['n_id']?>" class="btn btn-sm btn-info" >พิมพ์&nbsp;<i class="fas fa-print"></i></a>
                                        </div>
                                        <hr>
                                    </div> <!-- end row while -->
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <hr>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
 
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
 
        <?php 
        /* include 'edit_customer.php'; */
        include '../footer/footer.html'?>
    </div>
    <?php include '../header/js.php'?>


    <!-- ADD Modal -->
    <div class="modal fade" id="add_exampleModal" tabindex="-1" role="dialog" aria-labelledby="add_exampleModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="frm_edit" action="add_customer.php">
                            <table width="100%" class="text-center">
                                <tr>
                                    <td>รหัสลูกค้า</td>
                                    <td>
                                        <input class="form-control text-center" name="frm_customer_id" type="text" autocomplete="off" placeholder="กรุณากรอกรหัสลูกค้า">
                                    </td>
                                </tr>
                                    <tr height="10px"></tr>
                                <tr>
                                    <td>ชื่อลูกค้า</td>
                                    <td>
                                        <input class="form-control text-center" name="frm_customer_name" type="text" autocomplete="off" placeholder="กรุณากรอกชื่อลูกค้า">
                                    </td>
                                </tr>
                            </table>
                            <div class="modal-body text-right">
                                <button class="btn btn-primary mr-3" type="submit">บันทึก</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="edit_list2"></div>

                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">  

    $('.del').click(function(){
            var uid=$(this).attr("id");
            var status = confirm("ยืนยันการลบข้อมูล ??");
                if (status) {
                    $.ajax({
                        url:"delete_customer.php",
                        method:"post",
                        data:{id:uid},
                        success:function(data){
                        location.reload();
                    }
                });
            }
        });
        // Delete Row ------------------------------------------- -------------------------------------------       
    $('.edit').click(function(){
        var uid=$(this).attr("id");
        $.ajax({
            url:"edit_customer.php",
            method:"post",
            data:{id:uid},
            success:function(data){
                $('#edit_list2').html(data);
                $('#edit_list').modal('show');
            }
        });
    });
</script>

</body>

</html>