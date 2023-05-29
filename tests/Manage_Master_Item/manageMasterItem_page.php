<?php $session_closed = session()->get(); ?>
<div class="content-wrapper">
  <?php if ($message != "") {
    echo $message;
  } else if ($message == "") {
  } ?>


  <!-- Site Wrapper -->
  <form action="<?php echo $session_closed['session_address']; ?>/#" class="needs-validation" novalidate method="post" enctype="multipart/form-data" id="---PAGE_NAME---">
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

              <!-- Pending Master Item -->
              <!-- <div class="col-lg-2 col-md-2 col-sm-12" style="text-align: right">
                <a href="<?php //echo site_url() 
                          ?>Manage_Master_Item/newMasterItem" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMI" style="width: 100%;"><i class="fa-solid fa-plus"> </i> New / Add Master Item</a>
              </div> -->

              <!-- MI PENDING -->
              <div class="col-lg-2 col-md-2 col-sm-12" style="text-align: right">
                <a href="<?php echo $session_closed['session_address']; ?>pending_reqMasterItem" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-list"> </i> Pending Request MI &nbsp;<span class="badge badge-warning text-small"> <?= $count_pending->jml ?></span></a>
              </div>
              <!-- MI PENDING -->

              <!-- MI REJECT -->
              <div class="col-lg-2 col-md-2 col-sm-12" style="text-align: right">
                <a href="<?php echo $session_closed['session_address']; ?>rejected_reqMasterItem" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-list"> </i> Rejected Request MI </a>
              </div>
              <!--/MI REJECT -->

            </div>
          </div>
          <!--/.Card Header -->
        </div>

        <!-- ROW 1 -->
        <div class="row">
          <div class="col-lg-12 mb-3 align-items-stretch">
            <div class="card">

              <!-- Card Body -->
              <div class="card-body" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" role="tab" aria-controls="return" aria-selected="false">RETURN &nbsp;<span class="badge badge-success  text-small"> <?= $getMI_return ?></span></button>
                        </li>
                        <li class="nav-item ml-auto ml-0" role="presentation">
                          <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">ALL DATA</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="inprocess-tab" data-bs-toggle="tab" data-bs-target="#inprocess" type="button" role="tab" aria-controls="inprocess" aria-selected="false">INPROCESS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="closed-tab" data-bs-toggle="tab" data-bs-target="#closed" type="button" role="tab" aria-controls="closed" aria-selected="false">CLOSED</button>
                        </li>
                      </ul>
                      <!-- Content : -->
                      <div class="tab-content" id="myTabContent">


                        <div class="tab-pane fade " id="return" role="tabpanel" aria-labelledby="return-tab">
                          <br>
                          <!-- Content Tab Component -->
                          <!-- Table User List -->
                          <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-hover responsive nowrap" style="width:100%">
                              <thead>
                                <tr>
                                  <th style="text-align: center;">No</th>
                                  <th style="text-align: center;">Category</th>
                                  <th style="text-align: center;">MI Code</th>
                                  <th style="text-align: center;">Item Description</th>
                                  <th style="text-align: center;">Requester</th>
                                  <th style="text-align: center;">Site - [Departement]</th>
                                  <th style="text-align: center;">Request Date</th>
                                  <th style="text-align: center;">Status</th>
                                  <th style="text-align: center; width: 5%"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                                </tr>
                              </thead>
                              <tbody class="table-content">
                                <?php $i = 1;
                                foreach ($listManageMasterItem_return as $row) :
                                  if ($row['status'] == "INPROCESS") {
                                    $badge = "<div class='badge badge-pill badge-primary'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "PENDING") {
                                    $badge = "<div class='badge badge-pill badge-warning'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "CLOSED") {
                                    $badge = "<div class='badge badge-pill badge-danger'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "REJECT") {
                                    $badge = "<div class='badge badge-pill badge-secondary'>" . $row['status'] . "</div>";
                                  } else {
                                    $badge = $row['status'];
                                  }
                                  // format tanggal
                                  $date = date('d M Y / H:i:s', strtotime($row['requestDate']));
                                ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['category'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['miDescription'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['requester'] ?></td>
                                    <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [" . $row['requesterDepartement'] ?>]</td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_closed['session_address']; ?>return_mi_detail/<?= $row['r_miID'] ?>" class="btn btn-primary">Detail</a></td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                          <!--/Table User List -->
                          <!-- End Content Tab Component -->
                        </div>

                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="closed-tab">
                          <br>
                          <!-- Content Tab Component -->
                          <!-- Table Master Item List -->
                          <div class="table-responsive">
                            <table id="AllData" class="table table-bordered table-striped table-hover">
                              <thead>
                                <tr>
                                  <th style="text-align: center; vertical-align: middle;">No</th>
                                  <th style="text-align: center;">Category</th>
                                  <th style="text-align: center;">MI Code</th>
                                  <th style="text-align: center;">Item Description</th>
                                  <th style="text-align: center;">Requester</th>
                                  <th style="text-align: center;">Site - [Departement]</th>
                                  <th style="text-align: center;">Request Date</th>
                                  <th style="text-align: center;">Status</th>
                                  <th style="text-align: center; width: 5%">Note</th>
                                  <th style="text-align: center; vertical-align: middle; width: 5%"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                                </tr>
                                <tr id="tSearch">
                                  <th style="text-align: center;"></th>
                                  <th style="text-align: center;">Category</th>
                                  <th style="text-align: center;">MI Code</th>
                                  <th style="text-align: center;">Item Description</th>
                                  <th style="text-align: center;">Requester</th>
                                  <th style="text-align: center;">Site - [Departement]</th>
                                  <th style="text-align: center;">Request Date</th>
                                  <th style="text-align: center;">Status</th>
                                  <th style="text-align: center;">Note</th>
                                  <td style="text-align: center;"></td>
                                </tr>
                              </thead>
                              <tbody class="table-content">
                                <?php $i = 1;
                                foreach ($listManageMasterItem as $row) :
                                  if ($row['status'] == "INPROCESS") {
                                    $badge = "<div class='badge badge-pill badge-primary'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "PENDING") {
                                    $badge = "<div class='badge badge-pill badge-warning'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "CLOSED") {
                                    $badge = "<div class='badge badge-pill badge-danger'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "REJECT") {
                                    $badge = "<div class='badge badge-pill badge-secondary'>" . $row['status'] . "</div>";
                                  } else {
                                    $badge = $row['status'];
                                  }
                                  // format tanggal
                                  $date = date('d M Y / H:i:s', strtotime($row['requestDate']));
                                ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle; width: 4%; "><?= $i++; ?></td>
                                    <td style="text-align: center; vertical-align: middle; width: 8%; "><?= $row['category'] ?></td>
                                    <td style="text-align: center; vertical-align: middle; width: 10%; "><?= $row['miCode'] ?></td>
                                    <td style="text-align: justify; vertical-align: middle; width: 25%; "><?= $row['itemDesc'] ?></td>
                                    <td style="text-align: center; vertical-align: middle; width: 15%; "><?= $row['requester'] ?></td>
                                    <td style="text-align: justify; vertical-align: middle; width: 17%; "><?= $row['requesterSite'] . " - [" . $row['requesterDepartement'] ?>]</td>
                                    <td style="text-align: center; vertical-align: middle; width: 12%; "><?= $date ?></td>
                                    <td style="text-align: center; vertical-align: middle; width: 10%; "><?= $badge ?></td>
                                    <td style="text-align: center; vertical-align: middle; width: 12%; "><?= $row['status_final'] ?></td>
                                    <td style="text-align: center; vertical-align: middle; width: 10%; "><a href="<?php echo $session_closed['session_address']; ?>manage_mi_detail/<?= $row['r_miID'] ?>?code=0" class="btn btn-primary">Detail</a></td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                          <!--/Table Master Item List -->
                          <!-- End Content Tab Component -->
                        </div>

                        <div class="tab-pane fade " id="inprocess" role="tabpanel" aria-labelledby="inprocess-tab">
                          <br>
                          <!-- Content Tab Component -->
                          <!-- Table User List -->
                          <div class="table-responsive">
                            <table id="tbInprocess" class="table table-bordered table-striped table-hover">
                              <thead>
                                <tr>
                                  <th style="text-align: center;">No</th>
                                  <th style="text-align: center;">Category</th>
                                  <th style="text-align: center;">MI Code</th>
                                  <th style="text-align: center;">Item Description</th>
                                  <th style="text-align: center;">Requester</th>
                                  <th style="text-align: center;">Site - [Departement]</th>
                                  <th style="text-align: center;">Request Date</th>
                                  <th style="text-align: center;">Status</th>
                                  <th style="text-align: center; vertical-align: middle; width: 5%"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                                </tr>
                                <tr id="inprocessSearch">
                                  <th style="text-align: center;"></th>
                                  <th style="text-align: center;">Category</th>
                                  <th style="text-align: center;">MI Code</th>
                                  <th style="text-align: center;">Item Description</th>
                                  <th style="text-align: center;">Requester</th>
                                  <th style="text-align: center;">Site - [Departement]</th>
                                  <th style="text-align: center;">Request Date</th>
                                  <th style="text-align: center;">Status</th>
                                  <td style="text-align: center; min-width: 60px"></td>
                                </tr>
                              </thead>
                              <tbody class="table-content">
                                <?php $i = 1;
                                foreach ($listManageMasterItem_inprocess as $row) :
                                  if ($row['status'] == "INPROCESS") {
                                    $badge = "<div class='badge badge-pill badge-primary'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "PENDING") {
                                    $badge = "<div class='badge badge-pill badge-warning'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "CLOSED") {
                                    $badge = "<div class='badge badge-pill badge-danger'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "REJECT") {
                                    $badge = "<div class='badge badge-pill badge-secondary'>" . $row['status'] . "</div>";
                                  } else {
                                    $badge = $row['status'];
                                  }
                                  // format tanggal
                                  $date = date('d M Y / H:i:s', strtotime($row['requestDate']));
                                ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['category'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['itemDesc'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['requester'] ?></td>
                                    <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [" . $row['requesterDepartement'] ?>]</td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_closed['session_address']; ?>manage_mi_detail/<?= $row['r_miID'] ?>?code=0" class="btn btn-primary">Detail</a></td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                          <!--/Table User List -->
                          <!-- End Content Tab Component -->
                        </div>

                        <div class="tab-pane fade" id="closed" role="tabpanel" aria-labelledby="closed-tab">
                          <br>
                          <!-- Content Tab Component -->
                          <!-- Table User List -->
                          <div class="table-responsive">
                            <table id="tbClosed" class="table table-bordered table-striped table-hover">
                              <thead>
                                <tr>
                                  <th style="text-align: center;">No</th>
                                  <th style="text-align: center;">Category</th>
                                  <th style="text-align: center;">MI Code</th>
                                  <th style="text-align: center;">Item Description</th>
                                  <th style="text-align: center;">Requester</th>
                                  <th style="text-align: center;">Site - [Departement]</th>
                                  <th style="text-align: center;">Request Date</th>
                                  <th style="text-align: center;">Status</th>
                                  <th style="text-align: center; vertical-align: middle; width: 5%"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                                </tr>
                                <tr id="closedSearch">
                                  <th style="text-align: center;"></th>
                                  <th style="text-align: center;">Category</th>
                                  <th style="text-align: center;">MI Code</th>
                                  <th style="text-align: center;">Item Description</th>
                                  <th style="text-align: center;">Requester</th>
                                  <th style="text-align: center;">Site - [Departement]</th>
                                  <th style="text-align: center;">Request Date</th>
                                  <th style="text-align: center;">Status</th>
                                  <td style="text-align: center; min-width: 60px"></td>
                                </tr>
                              </thead>
                              <tbody class="table-content">
                                <?php $i = 1;
                                foreach ($listManageMasterItem_closed as $row) :
                                  if ($row['status'] == "INPROCESS") {
                                    $badge = "<div class='badge badge-pill badge-primary'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "PENDING") {
                                    $badge = "<div class='badge badge-pill badge-warning'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "CLOSED") {
                                    $badge = "<div class='badge badge-pill badge-danger'>" . $row['status'] . "</div>";
                                  } else if ($row['status'] == "REJECT") {
                                    $badge = "<div class='badge badge-pill badge-secondary'>" . $row['status'] . "</div>";
                                  } else {
                                    $badge = $row['status'];
                                  }
                                  // format tanggal
                                  $date = date('d F Y / H:i:s', strtotime($row['requestDate']));
                                ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['category'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['itemDesc'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['requester'] ?></td>
                                    <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [" . $row['requesterDepartement'] ?>]</td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_closed['session_address']; ?>manage_mi_detail/<?= $row['r_miID'] ?>?code=0" class="btn btn-primary">Detail</a></td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                          <!--/Table User List -->
                          <!-- End Content Tab Component -->
                        </div>


                      </div>
                    </div>
                  </div>
                  <!-- End Tab Component -->
                </div>

              </div>
            </div>
          </div>
          <!-- Card Body -->
        </div>
      </div>
</div>
<!-- ROW 1 -->
</div>
</section>
</form>
</div>
<!-- /.Site Wrapper -->

<!-- jQuery -->
<script type="text/javascript" src="<?php echo $session_closed['session_address']; ?>themes/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/dist/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/dist/js/jquery-3.5.1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>

<!-- DataTable -->
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $session_closed['session_address']; ?>themes/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(document).ready(function() {

    $('#AllData #tSearch th').each(function(i) {
      if (i > 0) {
        var title = $('#AllData #tSearch th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control text-sm d-flex justify-content-center" style="min-width:auto;" placeholder="' + title + '" data-index="' + i + '">');
      }
    });

    tableActive = $('#AllData').DataTable({
      "orderCellsTop": true,
      "lengthMenu": [5, 10, 20, 50, 100, 200, 500],
      "paging": true,
      // "responsive": false,
      "lengthChange": true,
      "autoWidth": false,
      // "scrollX": true,
      "searching": true,
    });

    $(tableActive.table().container()).on('keyup', '#tSearch input', function() {
      tableActive
        .column($(this).data('index'))
        .search(this.value)
        .draw();
    });
    // ==================================================
    $('#tbInprocess #inprocessSearch th').each(function(i) {
      if (i > 0) {
        var title = $('#tbInprocess #inprocessSearch th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control text-sm d-flex justify-content-center" style="min-width:auto;" placeholder="' + title + '" data-index="' + i + '">');
      }
    });

    tableInprocess = $('#tbInprocess').DataTable({
      "orderCellsTop": true,
      "lengthMenu": [5, 10, 20, 50, 100, 200, 500],
      "paging": true,
      // "responsive": false,
      "lengthChange": true,
      "autoWidth": false,
      // "scrollX": true,
      "searching": true,
    });

    $(tableInprocess.table().container()).on('keyup', '#inprocessSearch input', function() {
      tableInprocess
        .column($(this).data('index'))
        .search(this.value)
        .draw();
    });
    // ======================================================
    $('#tbClosed #closedSearch th').each(function(i) {
      if (i > 0) {
        var title = $('#tbClosed #closedSearch th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control text-sm d-flex justify-content-center" style="min-width:auto;" placeholder="' + title + '" data-index="' + i + '">');
      }
    });

    tableClosed = $('#tbClosed').DataTable({
      "orderCellsTop": true,
      "lengthMenu": [5, 10, 20, 50, 100, 200, 500],
      "paging": true,
      // "responsive": false,
      "lengthChange": true,
      "autoWidth": false,
      // "scrollX": true,
      "searching": true,
    });

    $(tableClosed.table().container()).on('keyup', '#closedSearch input', function() {
      tableClosed
        .column($(this).data('index'))
        .search(this.value)
        .draw();
    });

  });

  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "scrollX": true,
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
  });
  $(document).ready(function() {
    $('#example.table').DataTable({
      // $("#example").DataTable({
      aaSorting: [],
      responsive: true,

      columnDefs: [{
          responsivePriority: 1,
          targets: 0
        },
        {
          responsivePriority: 2,
          targets: -1
        }
      ]
    });

    $(".dataTables_filter input")
      .attr("placeholder", "Search here...")
      .css({
        width: "240px",
        height: "38px",
        display: "inline-block",
      });

    $('[data-toggle="tooltip"]').tooltip();
  });
</script>