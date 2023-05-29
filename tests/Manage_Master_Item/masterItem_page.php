<?php $session_profile = session()->get(); ?>
<div class="content-wrapper">
  <?php if ($message != "") {
    echo $message;
  } else if ($message == "") {
  } ?>

  <!-- Site Wrapper -->
  <form action="<?php echo $session_profile['session_address']; ?>/#" class="needs-validation" novalidate method="post" enctype="multipart/form-data" id="---PAGE_NAME---">
    <section class="pt-3 pb-3 pr-1 pl-1 shadow-lg">
      <div class="container-fluid">

        <div class="card">
          <!-- Card Header -->
          <div class="card-header">
            <div class="row">
              <!-- TITLE -->
              <div class="col-lg-10 col-md-9 col-sm-12" style="margin: auto;">
                <h1 class="card-title page-title"><b>My <?= $pageTitle; ?></b></h1>
              </div>
              <!-- TITLE -->


              <!--/Pending Master Item -->

              <div class="col-lg-2 col-md-3 col-sm-12" style="text-align: right">
                <a href="<?php echo site_url() ?>Manage_Master_Item/newMasterItem" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMI" style="width: 100%;"><i class="fa-solid fa-plus"> </i> New / Add Master Item</a>
              </div>
              <!-- MODAL CHOOSE TYPE -->
              <!-- The Modal -->
              <div id="modalAddMI" class="modal">
                <div class="modal-dialog" style="width: 100%">
                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"><b>Add New Master Item</b></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <div class="row">

                          <div class="col-lg-12 col-md-12 col-sm-12" style="margin: auto;">
                            <a href="<?php echo $session_profile['session_address']; ?>masterItem_new/0" class="btn btn-primary" style="width: 100%;"> Expense / Assets </a>
                          </div>

                          <div class="col-12">
                            <br>
                          </div>

                          <div class="col-lg-12 col-md-12 col-sm-12" style="margin: auto;">
                            <a href="<?php echo $session_profile['session_address']; ?>masterItem_new/1" class="btn btn-primary" style="width: 100%;"> Inventory Sparepart </a>
                          </div>

                          <div class="col-12">
                            <br>
                          </div>

                          <div class="col-lg-12 col-md-12 col-sm-12" style="margin: auto;">
                            <a href="<?php echo $session_profile['session_address']; ?>masterItem_new/2" class="btn btn-primary" style="width: 100%;"> Inventory GA </a>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/Pending Master Item -->

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
                        <li class="nav-item ml-auto ml-0" role="presentation">
                          <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">ALL DATA</button>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                          <button class="nav-link" id="inprocess-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="inprocess" aria-selected="false">PENDING</button>
                        </li> -->
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="closed-tab" data-bs-toggle="tab" data-bs-target="#inprocess" type="button" role="tab" aria-controls="closed" aria-selected="false">INPROCESS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="closed-tab" data-bs-toggle="tab" data-bs-target="#closed" type="button" role="tab" aria-controls="closed" aria-selected="false">CLOSED</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="closed-tab" data-bs-toggle="tab" data-bs-target="#reject" type="button" role="tab" aria-controls="closed" aria-selected="false">REJECT</button>
                        </li>
                      </ul>
                      <!-- Content : -->
                      <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="closed-tab">
                          <br>
                          <!-- Content Tab Component -->
                          <!-- Table User List -->
                          <div class="table-responsive">
                            <table id="tableMasterItem" class="table table-bordered table-striped table-hover" style="width: 100%;">
                              <thead class="table-title">
                                <tr>
                                  <th style="text-align: center; vertical-align: middle;">No</th>
                                  <th style="text-align: center; vertical-align: middle;">Category</th>
                                  <th style="text-align: center; vertical-align: middle;">MI Code</th>
                                  <th style="text-align: center; vertical-align: middle;">Type</th>
                                  <!-- <th style="text-align: center; vertical-align: middle;">Site - [Departement]</th>  -->
                                  <th style="text-align: center; vertical-align: middle;">Item Description</th>
                                  <th style="text-align: center; vertical-align: middle;">Request Date</th>
                                  <th style="text-align: center; vertical-align: middle;">Status</th>
                                  <th style="text-align: center; vertical-align: middle;"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                                </tr>
                                <tr id="tSearch">
                                  <th style="text-align: center; vertical-align: middle;"></th>
                                  <th style="text-align: center; vertical-align: middle;">Category</th>
                                  <th style="text-align: center; vertical-align: middle;">MI Code</th>
                                  <th style="text-align: center; vertical-align: middle;">Type</th>
                                  <!-- <th style="text-align: center; vertical-align: middle;">Site - [Departement]</th>  -->
                                  <th style="text-align: center; vertical-align: middle;">Item Description</th>
                                  <th style="text-align: center; vertical-align: middle;">Request Date</th>
                                  <th style="text-align: center; vertical-align: middle;">Status</th>
                                  <td style="text-align: center; vertical-align: middle;"><strong> Action </strong></td>
                                </tr>
                              </thead>
                              <tbody class="table-content">
                                <?php $i = 1;
                                foreach ($listMasterItemRequester as $row) :
                                  if ($row['status_request'] == "INPROCESS") {
                                    $badge = "<div class='badge badge-pill badge-primary'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "PENDING") {
                                    $badge = "<div class='badge badge-pill badge-warning'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "CLOSED") {
                                    $badge = "<div class='badge badge-pill badge-danger'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "REJECT") {
                                    $badge = "<div class='badge badge-pill badge-secondary'>" . $row['status_request'] . "</div>";
                                  } else {
                                    $badge = $row['status_request'];
                                  }

                                  // format tanggal
                                  $date = date('d F Y / H:i:s', strtotime($row['requestDate']));
                                  // dd($row);
                                ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['category'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['type'] ?></td>
                                    <!-- <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [ " . $row['requesterDepartement'] ?>]</td> -->
                                    <td style="text-align: justify; vertical-align: middle;"><?= $row['itemDesc'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_profile['session_address']; ?>masterItem_detail/<?= $row['r_miID'] ?>" class="btn btn-primary">Detail</a></td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                          <!--/Table User List -->
                          <!-- End Content Tab Component -->
                        </div>

                        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="closed-tab">
                          <br>
                          <!-- Content Tab Component -->
                          <!-- Table User List -->
                          <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-hover" style="width: 100%;">
                              <thead class="table-title">
                                <tr>
                                  <th style="text-align: center; vertical-align: middle;">No</th>
                                  <th style="text-align: center; vertical-align: middle;">Category</th>
                                  <th style="text-align: center; vertical-align: middle;">MI Code</th>
                                  <th style="text-align: center; vertical-align: middle;">Type</th>
                                  <!-- <th style="text-align: center; vertical-align: middle;">Site - [Departement]</th>  -->
                                  <th style="text-align: center; vertical-align: middle;">Item Description</th>
                                  <th style="text-align: center; vertical-align: middle;">Request Date</th>
                                  <th style="text-align: center; vertical-align: middle;">Status</th>
                                  <th style="text-align: center; vertical-align: middle;"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                                </tr>
                              </thead>
                              <tbody class="table-content">
                                <?php $i = 1;
                                foreach ($listMasterItemRequester_pending as $row) :
                                  if ($row['status_request'] == "INPROCESS") {
                                    $badge = "<div class='badge badge-pill badge-primary'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "PENDING") {
                                    $badge = "<div class='badge badge-pill badge-warning'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "CLOSED") {
                                    $badge = "<div class='badge badge-pill badge-danger'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "REJECT") {
                                    $badge = "<div class='badge badge-pill badge-secondary'>" . $row['status_request'] . "</div>";
                                  } else {
                                    $badge = $row['status_request'];
                                  }

                                  // format tanggal
                                  $date = date('d F Y / H:i:s', strtotime($row['requestDate']));
                                  // dd($row);
                                ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['category'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['type'] ?></td>
                                    <!-- <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [ " . $row['requesterDepartement'] ?>]</td> -->
                                    <td style="text-align: justify; vertical-align: middle;"><?= $row['itemDesc'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_profile['session_address']; ?>masterItem_detail/<?= $row['r_miID'] ?>" class="btn btn-primary">Detail</a></td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                          <!--/Table User List -->
                          <!-- End Content Tab Component -->
                        </div>

                        <div class="tab-pane fade" id="inprocess" role="tabpanel" aria-labelledby="inprocess-tab">
                          <br>
                          <!-- Content Tab Component -->
                          <!-- Table User List -->
                          <div class="table-responsive">
                            <table id="tb_inprocessMI" class="table table-bordered table-striped table-hover" style="width: 100%;">
                              <thead class="table-title">
                                <tr>
                                  <th style="text-align: center; vertical-align: middle;">No</th>
                                  <th style="text-align: center; vertical-align: middle;">Category</th>
                                  <th style="text-align: center; vertical-align: middle;">MI Code</th>
                                  <th style="text-align: center; vertical-align: middle;">Type</th>
                                  <!-- <th style="text-align: center; vertical-align: middle;">Site - [Departement]</th>  -->
                                  <th style="text-align: center; vertical-align: middle;">Item Description</th>
                                  <th style="text-align: center; vertical-align: middle;">Request Date</th>
                                  <th style="text-align: center; vertical-align: middle;">Status</th>
                                  <th style="text-align: center; vertical-align: middle;"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                                </tr>
                                <tr id="tSearch">
                                  <th style="text-align: center; vertical-align: middle;"></th>
                                  <th style="text-align: center; vertical-align: middle;">Category</th>
                                  <th style="text-align: center; vertical-align: middle;">MI Code</th>
                                  <th style="text-align: center; vertical-align: middle;">Type</th>
                                  <!-- <th style="text-align: center; vertical-align: middle;">Site - [Departement]</th>  -->
                                  <th style="text-align: center; vertical-align: middle;">Item Description</th>
                                  <th style="text-align: center; vertical-align: middle;">Request Date</th>
                                  <th style="text-align: center; vertical-align: middle;">Status</th>
                                  <td style="text-align: center; vertical-align: middle;"><strong> Action </strong></td>
                                </tr>
                              </thead>
                              <tbody class="table-content">
                                <?php $i = 1;
                                foreach ($listMasterItemRequester_inprocess as $row) :
                                  if ($row['status_request'] == "INPROCESS") {
                                    $badge = "<div class='badge badge-pill badge-primary'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "PENDING") {
                                    $badge = "<div class='badge badge-pill badge-warning'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "CLOSED") {
                                    $badge = "<div class='badge badge-pill badge-danger'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "REJECT") {
                                    $badge = "<div class='badge badge-pill badge-secondary'>" . $row['status_request'] . "</div>";
                                  } else {
                                    $badge = $row['status_request'];
                                  }

                                  // format tanggal
                                  $date = date('d F Y / H:i:s', strtotime($row['requestDate']));
                                  // dd($row);
                                ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['category'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['type'] ?></td>
                                    <!-- <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [ " . $row['requesterDepartement'] ?>]</td> -->
                                    <td style="text-align: justify; vertical-align: middle;"><?= $row['itemDesc'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_profile['session_address']; ?>masterItem_detail/<?= $row['r_miID'] ?>" class="btn btn-primary">Detail</a></td>
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
                            <table id="tb_closedMI" class="table table-bordered table-striped table-hover" style="width: 100%;">
                              <thead class="table-title">
                                <tr>
                                  <th style="text-align: center; vertical-align: middle;">No</th>
                                  <th style="text-align: center; vertical-align: middle;">Category</th>
                                  <th style="text-align: center; vertical-align: middle;">MI Code</th>
                                  <th style="text-align: center; vertical-align: middle;">Type</th>
                                  <!-- <th style="text-align: center; vertical-align: middle;">Site - [Departement]</th>  -->
                                  <th style="text-align: center; vertical-align: middle;">Item Description</th>
                                  <th style="text-align: center; vertical-align: middle;">Request Date</th>
                                  <th style="text-align: center; vertical-align: middle;">Status</th>
                                  <th style="text-align: center; vertical-align: middle;"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                                </tr>
                                <tr id="tSearch">
                                  <th style="text-align: center; vertical-align: middle;"></th>
                                  <th style="text-align: center; vertical-align: middle;">Category</th>
                                  <th style="text-align: center; vertical-align: middle;">MI Code</th>
                                  <th style="text-align: center; vertical-align: middle;">Type</th>
                                  <!-- <th style="text-align: center; vertical-align: middle;">Site - [Departement]</th>  -->
                                  <th style="text-align: center; vertical-align: middle;">Item Description</th>
                                  <th style="text-align: center; vertical-align: middle;">Request Date</th>
                                  <th style="text-align: center; vertical-align: middle;">Status</th>
                                  <td style="text-align: center; vertical-align: middle;"><strong> Action </strong></td>
                                </tr>
                              </thead>
                              <tbody class="table-content">
                                <?php $i = 1;
                                foreach ($listMasterItemRequester_closed as $row) :
                                  if ($row['status_request'] == "INPROCESS") {
                                    $badge = "<div class='badge badge-pill badge-primary'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "PENDING") {
                                    $badge = "<div class='badge badge-pill badge-warning'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "CLOSED") {
                                    $badge = "<div class='badge badge-pill badge-danger'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "REJECT") {
                                    $badge = "<div class='badge badge-pill badge-secondary'>" . $row['status_request'] . "</div>";
                                  } else {
                                    $badge = $row['status_request'];
                                  }

                                  // format tanggal
                                  $date = date('d F Y / H:i:s', strtotime($row['requestDate']));
                                  // dd($row);
                                ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['category'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['type'] ?></td>
                                    <!-- <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [ " . $row['requesterDepartement'] ?>]</td> -->
                                    <td style="text-align: justify; vertical-align: middle;"><?= $row['itemDesc'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_profile['session_address']; ?>masterItem_detail/<?= $row['r_miID'] ?>" class="btn btn-primary">Detail</a></td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                          <!--/Table User List -->
                          <!-- End Content Tab Component -->
                        </div>

                        <div class="tab-pane fade" id="reject" role="tabpanel" aria-labelledby="closed-tab">
                          <br>
                          <!-- Content Tab Component -->
                          <!-- Table User List -->
                          <div class="table-responsive">
                            <table id="tb_rejectMI" class="table table-bordered table-striped table-hover" style="width: 100%;">
                              <thead class="table-title">
                                <tr>
                                  <th style="text-align: center; vertical-align: middle;">No</th>
                                  <th style="text-align: center; vertical-align: middle;">Category</th>
                                  <th style="text-align: center; vertical-align: middle;">MI Code</th>
                                  <th style="text-align: center; vertical-align: middle;">Type</th>
                                  <!-- <th style="text-align: center; vertical-align: middle;">Site - [Departement]</th>  -->
                                  <th style="text-align: center; vertical-align: middle;">Item Description</th>
                                  <th style="text-align: center; vertical-align: middle;">Request Date</th>
                                  <th style="text-align: center; vertical-align: middle;">Status</th>
                                  <th style="text-align: center; vertical-align: middle;"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                                </tr>
                                <tr id="tSearch">
                                  <th style="text-align: center; vertical-align: middle;"></th>
                                  <th style="text-align: center; vertical-align: middle;">Category</th>
                                  <th style="text-align: center; vertical-align: middle;">MI Code</th>
                                  <th style="text-align: center; vertical-align: middle;">Type</th>
                                  <!-- <th style="text-align: center; vertical-align: middle;">Site - [Departement]</th>  -->
                                  <th style="text-align: center; vertical-align: middle;">Item Description</th>
                                  <th style="text-align: center; vertical-align: middle;">Request Date</th>
                                  <th style="text-align: center; vertical-align: middle;">Status</th>
                                  <td style="text-align: center; vertical-align: middle;"><strong> Action </strong></td>
                                </tr>
                              </thead>
                              <tbody class="table-content">
                                <?php $i = 1;
                                foreach ($listMasterItemRequester_reject as $row) :
                                  if ($row['status_request'] == "INPROCESS") {
                                    $badge = "<div class='badge badge-pill badge-primary'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "PENDING") {
                                    $badge = "<div class='badge badge-pill badge-warning'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "CLOSED") {
                                    $badge = "<div class='badge badge-pill badge-danger'>" . $row['status_request'] . "</div>";
                                  } else if ($row['status_request'] == "REJECT") {
                                    $badge = "<div class='badge badge-pill badge-secondary'>" . $row['status_request'] . "</div>";
                                  } else {
                                    $badge = $row['status_request'];
                                  }

                                  // format tanggal
                                  $date = date('d F Y / H:i:s', strtotime($row['requestDate']));
                                  // dd($row);
                                ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['category'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $row['type'] ?></td>
                                    <!-- <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [ " . $row['requesterDepartement'] ?>]</td> -->
                                    <td style="text-align: justify; vertical-align: middle;"><?= $row['itemDesc'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_profile['session_address']; ?>masterItem_detail/<?= $row['r_miID'] ?>" class="btn btn-primary">Detail</a></td>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
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

<!-- FITUR SEARCH BY COLUMN IN DATATABLE -->
<script>
  // all data (DataTable)
  $(document).ready(function() {
    $('#tableMasterItem #tSearch th').each(function(i) {
      if (i > 0) {
        var title = $('#tableMasterItem #tSearch th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control text-sm d-flex justify-content-center" style="min-width:auto;" placeholder="' + title + '" data-index="' + i + '">');
      }
    });

    tableMI = $('#tableMasterItem').DataTable({
      "orderCellsTop": true,
      "lengthMenu": [5, 10, 20, 50, 100, 200, 500],
      "paging": true,
      // "responsive": false,
      "lengthChange": true,
      "autoWidth": false,
      // "scrollX": true,
      "searching": true,
    });
    $(tableMI.table().container()).on('keyup', '#tSearch input', function() {
      tableMI
        .column($(this).data('index'))
        .search(this.value)
        .draw();
    });
  });
  // END FITUR TABLE SEARCH BY COLUMN
</script>
<script>
  // Inprocess (DataTable)
  $(document).ready(function() {
    $('#tb_inprocessMI #tSearch th').each(function(i) {
      if (i > 0) {
        var title = $('#tb_inprocessMI #tSearch th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control text-sm d-flex justify-content-center" style="min-width:auto;" placeholder="' + title + '" data-index="' + i + '">');
      }
    });

    tableInprocess = $('#tb_inprocessMI').DataTable({
      "orderCellsTop": true,
      "lengthMenu": [5, 10, 20, 50, 100, 200, 500],
      "paging": true,
      // "responsive": false,
      "lengthChange": true,
      "autoWidth": false,
      // "scrollX": true,
      "searching": true,
    });
    $(tableInprocess.table().container()).on('keyup', '#tSearch input', function() {
      tableInprocess
        .column($(this).data('index'))
        .search(this.value)
        .draw();
    });
  });
  // END FITUR TABLE SEARCH BY COLUMN
</script>
<script>
  // Closed (DataTable)
  $(document).ready(function() {
    $('#tb_closedMI #tSearch th').each(function(i) {
      if (i > 0) {
        var title = $('#tb_closedMI #tSearch th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control text-sm d-flex justify-content-center" style="min-width:auto;" placeholder="' + title + '" data-index="' + i + '">');
      }
    });

    tableClosed = $('#tb_closedMI').DataTable({
      "orderCellsTop": true,
      "lengthMenu": [5, 10, 20, 50, 100, 200, 500],
      "paging": true,
      // "responsive": false,
      "lengthChange": true,
      "autoWidth": false,
      // "scrollX": true,
      "searching": true,
    });
    $(tableClosed.table().container()).on('keyup', '#tSearch input', function() {
      tableClosed
        .column($(this).data('index'))
        .search(this.value)
        .draw();
    });
  });
  // END FITUR TABLE SEARCH BY COLUMN
</script>
<script>
  // Reject (DataTable)
  $(document).ready(function() {
    $('#tb_rejectMI #tSearch th').each(function(i) {
      if (i > 0) {
        var title = $('#tb_rejectMI #tSearch th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control text-sm d-flex justify-content-center" style="min-width:auto;" placeholder="' + title + '" data-index="' + i + '">');
      }
    });

    tablereject = $('#tb_rejectMI').DataTable({
      "orderCellsTop": true,
      "lengthMenu": [5, 10, 20, 50, 100, 200, 500],
      "paging": true,
      // "responsive": false,
      "lengthChange": true,
      "autoWidth": false,
      // "scrollX": true,
      "searching": true,
    });
    $(tablereject.table().container()).on('keyup', '#tSearch input', function() {
      tablereject
        .column($(this).data('index'))
        .search(this.value)
        .draw();
    });
  });
  // END FITUR TABLE SEARCH BY COLUMN
</script>