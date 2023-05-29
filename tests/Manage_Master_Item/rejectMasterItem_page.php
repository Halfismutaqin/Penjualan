<?php $session_profile = session()->get(); ?>
<div class="content-wrapper">
  <?php if ($message != "") {
    echo $message;
  } else if ($message == "") {
  } ?>

  <!-- Site Wrapper -->
  <form action="<?php echo $session_profile['session_address']; ?>#" class="needs-validation" novalidate method="post" enctype="multipart/form-data" id="---PAGE_NAME---">
    <section class="pt-3 pb-3 pr-1 pl-1 shadow-lg">
      <div class="container-fluid">

        <div class="card">
          <!-- Card Header -->
          <div class="card-header">
            <div class="row">
              <!-- TITLE -->
              <div class="col-lg-10 col-md-10 col-sm-12" style="margin: auto;">
                <h1 class="card-title page-title"><b><?= $pageTitle; ?></b></h1>
              </div>
              <!-- TITLE -->

              <!-- BACK BUTTON -->
              <div class="col-lg-2 col-md-2 col-sm-12" style="margin: auto;">
                <a href="<?php echo $session_profile['session_address']; ?>manage_add_MI" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-square-caret-left"></i> Back </a>
              </div>
              <!--/BACK BUTTON -->

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
                      <!-- Table User List -->
                      <table id="example" class="table table-bordered table-striped table-hover" style="width: 100%;">
                        <thead class="table-title">
                          <tr>
                            <th style="text-align: center; vertical-align: middle; width:5%">No</th>
                            <th style="text-align: center; vertical-align: middle; width:10%">Type</th>
                            <th style="text-align: center; vertical-align: middle; width:10%">Code</th>
                            <th style="text-align: center; vertical-align: middle; width:30%">Item Description</th>
                            <th style="text-align: center; vertical-align: middle; width:20%">Requester</th>
                            <th style="text-align: center; vertical-align: middle; width:10%">Site</th>
                            <th style="text-align: center; vertical-align: middle; width:20%">Departement</th>
                            <th style="text-align: center; vertical-align: middle; width:20%">Request Date</th>
                            <th style="text-align: center; vertical-align: middle; width:15%">Status</th>
                            <th style="text-align: center; vertical-align: middle; width:5%"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                          </tr>
                        </thead>
                        <tbody class="table-content">
                          <?php $i = 1;
                          foreach ($rejectedMasterItemList_table as $row) : 
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
                              <td style="text-align: center; vertical-align: middle;"><?= $row['type']; ?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $row['miCode']; ?></td>
                              <td style="text-align: start; vertical-align: middle;"><?= $row['itemDesc']; ?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $row['requester']; ?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $row['requesterSite']; ?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $row['requesterDepartement']; ?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $date; ?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $badge; ?></td>
                              <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_profile['session_address']; ?>reject_mi_detail/<?= $row['r_miID']; ?>" class="btn btn-primary">Detail</a></td>
                            </tr>
                          <?php endforeach ?>

                        </tbody>
                      </table>
                      <!--/Table User List -->

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
      "lengthChange": true,
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
  $(document).ready(function() {
    $('table.table').DataTable({
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