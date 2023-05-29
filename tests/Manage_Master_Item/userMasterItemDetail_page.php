<?php

use PhpOffice\PhpSpreadsheet\Calculation\Category;

$session_profile = session()->get(); ?>

<!-- Site Wrapper -->
<div class="content-wrapper">
  <?php if ($message != "") {
    echo $message;
  } else if ($message == "") {
  } ?>

  <form action="#" class="needs-validation" novalidate method="post" enctype="multipart/form-data" id="newVariationOrder_page">
    <section class="pt-3 pb-3 pr-1 pl-1 shadow-lg">
      <div class="container-fluid">

        <div class="card">
          <!-- Card Header -->
          <div class="card-header">
            <div class="row">
              <!-- TITLE -->
              <div class="col-lg-8 col-md-8 col-sm-12" style="margin: auto;">
                <h1 class="card-title page-title"><b><?= $pageTitle; ?></b></h1>
              </div>
              <!-- TITLE -->

              <!-- APPROVAL HISTORY -->
              <div class="col-lg-2 col-md-2 col-sm-12" style="margin: auto;">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalHistoryVO" style="width: 100%;"><i class="fa-solid fa-list"> </i> History </a>
              </div>
              <!--/APPROVAL HISTORY -->

              <!-- BACK BUTTON -->
              <div class="col-lg-2 col-md-2 col-sm-12" style="margin: auto;">
                <a href="<?php echo $session_profile['session_address']; ?>masterItem_list" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-square-caret-left"></i> Back </a>
              </div>
              <!--/BACK BUTTON -->

            </div>
          </div>
          <!--/.Card Header -->
        </div>

        <?php
        // :: Get detail master item and convert in string in array ::
        $array = get_object_vars($miDetail);
        // d($array);
        ?>
        <!-- ROW 1 -->
        <div class="row">
          <div class="col-lg-12 mb-0 align-items-stretch">
            <div class="card">
              <div class="card-success">
                <div class="card-header card-header-custom">
                  <h1 class="card-title">Master Item Detail Information</h1>
                </div>
              </div>

              <!-- Card Body -->
              <div class="card-body card-body-custom" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">
                    <!-- Requester -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="requester">Requester</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="requester" id="requester" style="text-transform: uppercase;" value="<?= $miDetail->requester; ?>" required readonly>
                        </div>
                      </div>
                    </div>
                    <!-- Requester -->

                    <!-- Departement -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="departement">Departement</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="departement" id="departement" style="text-transform: uppercase;" value="<?= $miDetail->requesterDepartement; ?>" required readonly>

                        </div>
                      </div>
                    </div>
                    <!-- Departement -->

                    <!-- Site -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="site">Site</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="site" id="site" style="text-transform: uppercase;" value="<?= $miDetail->requesterSite; ?>" required readonly>

                        </div>
                      </div>
                    </div>
                    <!-- Departement -->

                    <!-- Change Order Type -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="miType">Type</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="miType" id="miType" style="text-transform: uppercase;" value="<?= $miDetail->type; ?>" required readonly>

                        </div>
                      </div>
                    </div>
                    <!-- Change Order Type -->

                    <div class="col-12">
                      <hr>
                    </div>

                    <!-- :: DETAIL MASTER ITEM IN HERE :: -->
                    <!-- Item Desc -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="itemDesc">Item Description<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="itemDesc" id="itemDesc" style="text-transform: uppercase;" value="<?= $array['itemDesc'] ?>" required readonly>

                        </div>
                      </div>
                    </div>
                    <!-- Item Desc -->

                    <!-- UOM -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="uom">UOM<a style="color:red;">*</a></label>
                        <select class="form-control select2" name="uom" id="uom" value="<?= $array['uom'] ?>" disabled readonly>
                          <option selected value="<?= $array['uom'] ?>"><?= $array['uom'] ?></option>
                        </select>
                      </div>
                    </div>
                    <!-- UOM -->

                    <!-- Price -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <?php
                      $convert_price = "Rp " . number_format($array['price'], 0, ',', '.');
                      ?>
                      <div class="form-group">
                        <label for="price">Price<a style="color:red;">*</a></label>
                        <input class="form-control" name="price" id="price" value="<?= $convert_price ?>" required readonly>
                      </div>
                    </div>
                    <!-- Price -->


                    <!-- Categori -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="category">Category<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <select name="category" id="category" class="form-control" disabled readonly>
                            <option value="<?= $array['category'] ?>"><?= $array['category'] ?></option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Category -->

                    <!-- Sub Categori -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="sub_category1">Sub Category 1<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <select name="sub_category1" id="sub_category1" class="form-control" disabled readonly>
                            <option selected="<?= $array['sub_category1'] ?>"><?= $array['sub_category1'] ?></option>
                          </select>

                        </div>
                      </div>
                    </div>
                    <!-- Sub Category -->

                    <!-- Sub Categori -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="sub_category2">Sub Category 2<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <select name="sub_category2" id="sub_category2" class="form-control" disabled readonly>
                            <option selected="<?= $array['sub_category2'] ?>"><?= $array['sub_category2'] ?></option>
                          </select>

                        </div>
                      </div>
                    </div>
                    <!-- Sub Category -->
                    <!-- Kode Item -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="specialCode">No Catalog/ No SOP/ Code Special..</label>
                        <label class="small" for="specialCode"><a style="color:red;">* ex: CR-153.00/SOP-QC-O044, Jika Tidak Ada silakan diisi : NA</a></label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="specialCode" id="specialCode" style="text-transform: uppercase;" value="<?= $array['noCatalog_Sop_Code'] ?>" required readonly>

                        </div>
                      </div>
                    </div>
                    <!-- Kode Item -->
                    <!-- END ROW -->
                  </div>
                  <hr>

                  <div class="row">
                    <?php
                    if (($array['type']) == "INVENTORY SPAREPART") { ?>
                      <!-- FIELD TAMBAHAN INVENTORY SPAREPART  -->
                      <!-- Manufacturer -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="manufacturer">Manufacturer</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="manufacturer" id="manufacturer" style="text-transform: uppercase;" value="<?= $array['manufacturer'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- Manufacturer -->

                      <!-- Machine Name -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="machineName">Machine Name</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="machineName" id="machineName" style="text-transform: uppercase;" value="<?= $array['machineName'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- Machine Name -->

                      <!-- Part Number -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="partNumber">Part Number</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="partNumber" id="partNumber" style="text-transform: uppercase;" value="<?= $array['partNumber'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- Part Number -->
                    <?php
                    }
                    if ((($array['type']) == "INVENTORY SPAREPART") or (($array['type']) == "INVENTORY GA")) { ?>
                      <!-- FIELD TAMBAHAN INVENTORY SP & GA  -->
                      <!-- Stock Minimum -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="stockMin">Stock Minimum</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="stockMin" id="stockMin" style="text-transform: uppercase;" value="<?= $array['stockMin'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- Stock Minimum -->

                      <!-- Stock Maximum -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="stockMax">Stock Maximum</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="stockMax" id="stockMax" style="text-transform: uppercase;" value="<?= $array['stockMax'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- Stock Maximum -->

                      <!-- Lead Time -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="leadTime">Lead Time</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="leadTime" id="leadTime" style="text-transform: uppercase;" value="<?= $array['leadTime'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- Lead Time -->

                      <!-- Kelipatan / Multiple -->
                      <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="multiple">Multiple (Kelipatan)</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="multiple" id="multiple" style="text-transform: uppercase;" value="" readonly>
                          </div>
                        </div>
                      </div> -->
                      <!-- Kelipatan / Multiple -->
                    <?php
                    }
                    ?>
                  </div>
                  <!-- :: END DETAIL MASTER ITEM :: -->

                </div>
              </div>
            </div>
            <!-- Card Body -->

          </div>
        </div>
        <!-- ROW 1 -->

        <?php
        // d($miAttachment);
        ?>

        <!-- ROW 2 -->
        <div class="row">
          <div class="col-lg-12 mb-3 align-items-stretch">
            <div class="card">
              <div class="card-success">
                <div class="card-header card-header-custom">
                  <h1 class="card-title">Attachment List</h1>
                </div>
              </div>

              <!-- Card Body -->
              <div class="card-body card-body-custom" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">

                    <div class="col-12">
                      <table id="example1" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-title">
                          <tr>
                            <th class="text-center" style="width: 1px;">No</th>
                            <th class="text-center" style="width: 55%;">Document Description</th>
                            <th class="text-center" style="width: 45%;">File</th>
                          </tr>
                        </thead>
                        <tbody id="tbody" class="table-content">
                          <?php $i = 1;
                          foreach ($miAttachment as $row) { ?>
                            <tr>
                              <!-- RUNNING NUMBER -->
                              <td style="text-align: center;vertical-align: middle;"><?= $i ?>. </td>
                              <!--/RUNNING NUMBER -->

                              <!-- DOCUMENT NAME -->
                              <td style="vertical-align: middle;"><?= $row['attachmentDetail']; ?>
                              </td>
                              <!--/DOCUMENT NAME -->

                              <!-- FILE -->
                              <td style="vertical-align: middle; text-align: center;">
                                <?php if ($row['attachment'] == "") { ?>
                                <?php } else { ?>
                                  <a target='_blank' href="<?php echo $session_profile['session_address']; ?>file/masterItemDocument/<?= $row['attachment']; ?>">click here</a>
                                <?php } ?>
                              </td>
                              <!-- FILE -->
                            </tr>
                          <?php $i++;
                          } ?>
                        </tbody>
                      </table>
                    </div>
                    <br>
                    <div class="col-12">
                      <hr>
                    </div>
                    <br>

                  </div>
                </div>
              </div>
              <!-- Card Body -->

            </div>
          </div>
        </div>
        <!-- ROW 2 -->
      </div>
    </section>
  </form>
</div>


<!-- MODAL APPROVAL HISTORY -->
<!-- The Modal -->
<div id="modalHistoryVO" class="modal">
  <div class="modal-dialog modal-xl">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>History</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <table id="example3" class="table table-bordered table-striped table-hover" id="documentLocal[]" name="documentLocal[]" style="font-size: 80%; vertical-align: middle; width: 100%;">
                <thead class="table-title">
                  <tr>
                    <th style="width: 5%; text-align: center; vertical-align: middle;">No</th>
                    <th style="width: 25%; text-align: center; vertical-align: middle;">User Name</th>
                    <th style="width: 20%; text-align: center; vertical-align: middle;">Date</th>
                    <th style="width: 10%; text-align: center; vertical-align: middle;">Action</th>
                    <th style="width: 40%; text-align: center; vertical-align: middle;">Reason</th>
                  </tr>
                </thead>
                <tbody class="table-content">
                  <?php $i = 1;
                  foreach ($miHistory as $row) { 
                    if ($row->action == 'REVIEW'){
                      $action = 'INPROCESS';
                    }else{
                      $action = $row->action; 
                    }
                    ?>
                    <tr>
                      <!-- RUNNING NUMBER -->
                      <td style="text-align: center;vertical-align: middle;"><?= $i ?>. </td>
                      <!--/RUNNING NUMBER -->

                      <!-- ApproveBy -->
                      <td style="vertical-align: middle;"><?= $row->approveBy; ?>
                      </td>
                      <!--/ApproveBy -->

                      <!-- approveDate -->
                      <?php
                      $timeStamp = date_create($row->approveDate);
                      $date = date_format($timeStamp, $dateFormat);
                      ?>
                      <td style="text-align: center;vertical-align: middle;">
                        <?= $date; ?>
                      </td>
                      <!--/approveDate -->

                      <!-- action -->
                      <td style="text-align: center;vertical-align: middle;"><?= $action ; ?>
                      </td>
                      <!--/action -->

                      <!-- reason -->
                      <td style="vertical-align: middle;"><?= $row->reason; ?>
                      </td>
                      <!--/reason -->

                    </tr>
                  <?php $i++;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class=" modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Close</span>
        </button>
      </div>
    </div>
  </div>
</div>
<!--/MODAL APPROVAL HISTORY -->

<!-- /.Site Wrapper -->

<!-- Page specific script -->
<!-- jQuery -->
<script type="text/javascript" src="<?php echo $session_profile['session_address']; ?>themes/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/dist/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/dist/js/jquery-3.5.1.js"></script>


<!-- DataTable -->
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": false,
      "lengthChange": false,
      "autoWidth": false,
      "scrollX": true,
      "table-layout": fixed
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "scrollX": true,
    });
    $('#example3').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "scrollX": true,
      "table-layout": fixed
    });
  });
</script>
<script>
  $(document).ready(function($) {
    $(".table-row").click(function() {
      window.document.location = $(this).data("href");
    });
  });
</script>