<?php $session_closed = session()->get(); ?>
<div class="content-wrapper">
  <?php if ($message != "") {
    echo $message;
  } else if ($message == "") {
  } ?>


  <!-- Site Wrapper -->
  <!-- <form action="<?php echo $session_closed['session_address']; ?>/#" class="needs-validation" novalidate method="post" enctype="multipart/form-data" id="---PAGE_NAME---"> -->
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
            <div class="col-lg-4 col-md-4"></div>
            <!-- TITLE -->

            <!-- ACTIVE Master Item -->
            <!-- <div class="col-lg-2 col-md-2 col-sm-12" style="text-align: right">
                <a href="<?php //echo site_url() 
                          ?>Manage_Master_Item/newMasterItem" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMI" style="width: 100%;"><i class="fa-solid fa-plus"> </i> New / Add Master Item</a>
              </div> -->
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
                        <button class="nav-link active" id="approvment-tab" data-bs-toggle="tab" data-bs-target="#approvment" type="button" role="tab" aria-controls="NEED APPROVAL" aria-selected="true">NEED APPROVAL</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="active-tab" data-bs-toggle="tab" data-bs-target="#active" type="button" role="tab" aria-controls="closed" aria-selected="false">ACTIVE</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="inactive-tab" data-bs-toggle="tab" data-bs-target="#inactive" type="button" role="tab" aria-controls="closed" aria-selected="false">INACTIVE</button>
                      </li>
                    </ul>
                    <!-- Content : -->
                    <div class="tab-content" id="myTabContent">

                      <div class="tab-pane fade show active " id="approvment" role="tabpanel" aria-labelledby="closed-tab">
                        <br>
                        <!-- Content Tab Component -->
                        <!-- Table User List -->
                        <div class="table-responsive">
                          <table id="tableApprovment" class="table table-bordered table-striped table-hover table-responsive nowrap" style="width:100%">
                            <thead>
                              <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">MI Code</th>
                                <th style="text-align: center;">Type</th>
                                <th style="text-align: center;">Item Description</th>
                                <th style="text-align: center;">Requester</th>
                                <th style="text-align: center;">Site - [Departement]</th>
                                <th style="text-align: center;">Request Date</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center; width: 5%"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                              </tr>
                              <tr id="aSearch">
                                <th></th>
                                <th>Mi Code</th>
                                <th>Type</th>
                                <th>Item Description</th>
                                <th>Requester</th>
                                <th>Site</th>
                                <th>Assigned Date</th>
                                <th>Status</th>
                                <td aria-disabled="true" style="text-align: center; min-width: 70px;"><strong>Action</strong></td>
                              </tr>
                            </thead>
                            <tbody class="table-content">
                              <?php $i = 1;
                              foreach ($listManageMasterItem_approvment as $row) :
                                if ($row['status'] == "NEED APPROVAL") {
                                  $badge = "<div class='badge badge-pill badge-primary'>" . $row['status'] . "</div>";
                                } else if ($row['status'] == "ACTIVE") {
                                  $badge = "<div class='badge badge-pill badge-success'>" . $row['status'] . "</div>";
                                } else {
                                  $badge = $row['status'];
                                }
                                // format tanggal
                                $date = date('d F Y / H:i:s', strtotime($row['requestDate']));
                              ?>
                                <tr>
                                  <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $row['type'] ?></td>
                                  <td style="text-align: justify; vertical-align: middle;"><?= $row['miDescription'] ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $row['requester'] ?></td>
                                  <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [" . $row['requesterDepartement'] ?>]</td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><a href="<?php echo $session_closed['session_address']; ?>manage_mi_detail/<?= $row['r_miID'] ?>?code=1" class="<?= $button ?>">Detail</a></td>
                                </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                        </div>
                        <!--/Table User List -->
                        <!-- End Content Tab Component -->
                      </div>

                      <!-- TAB ACTIVE -->
                      <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="closed-tab">
                        <br>
                        <!-- Table User List -->
                        <div class="table-responsive">
                          <table id="tableActive" class="table table-bordered table-striped table-hover responsive" style="width:100%">
                            <thead>
                              <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">MI Code</th>
                                <th style="text-align: center;">Type</th>
                                <th style="text-align: center;">Item Description</th>
                                <th style="text-align: center;">Requester</th>
                                <th style="text-align: center;">Site - [Departement]</th>
                                <th style="text-align: center;">Assigned Date</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center; width: 5%"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                              </tr>
                              <tr id="tSearch">
                                <th></th>
                                <th>Mi Code</th>
                                <th>Type</th>
                                <th>Item Description</th>
                                <th>Requester</th>
                                <th>Site</th>
                                <th>Assigned Date</th>
                                <th>Status</th>
                                <td aria-disabled="true" style="text-align: center; min-width: 140px;"><strong>Action</strong></td>
                              </tr>
                            </thead>
                            <tbody class="table-content">
                              <?php $i = 1;
                              foreach ($listManageMasterItem_active as $row) {
                                if ($row['status'] == "NEED APPROVAL") {
                                  $badge = "<div class='badge badge-pill badge-primary'>" . $row['status'] . "</div>";
                                } else if ($row['status'] == "ACTIVE") {
                                  $badge = "<div class='badge badge-pill badge-success'>" . $row['status'] . "</div>";
                                } else {
                                  $badge = "<div class='badge badge-pill badge-danger'>" . $row['status'] . "</div>";
                                }
                                // format tanggal
                                $date = date('d M Y / H:i:s', strtotime($row['assigned_date']));
                              ?>
                                <tr>
                                  <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $row['type'] ?></td>
                                  <td style="text-align: justify; vertical-align: middle;"><?= $row['miDescription'] ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $row['requester'] ?></td>
                                  <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [" . $row['requesterDepartement'] ?>]</td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                  <td style="text-align: center; vertical-align: middle;">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEditStatus<?= $row['r_miID_final'] ?>"><i class="fa fa-edit"></i> Status</a>
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalActiveViewMI<?= $row['r_miID_final'] ?>"><i class="fa fa-eye"></i> View</a>
                                  </td>
                                </tr>


                                <!-- Modal for Data/list Master Item -->
                                <div id="modalActiveViewMI<?= $row['r_miID_final'] ?>" class="modal">
                                  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                      <div class="modal-header navbar-custom">
                                        <h4 class="modal-title ">Detail Master Item Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="container">
                                          <div class="row d-flex justify-content-center text-lg text-primary"><strong>
                                              <?= $row['miDescription'] ?>
                                            </strong>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <!-- miCode -->
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="miCode">Code</label>
                                                <input type="text" class="form-control" name="miCode" id="miCode" style="text-transform: uppercase;" value="<?= $row['miCode']; ?>" required readonly>
                                              </div>
                                            </div>
                                            <!-- miCode -->

                                            <!-- Requester -->
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="requester">Requester</label>
                                                <input type="text" class="form-control" name="requester" id="requester" style="text-transform: uppercase;" value="<?= $row['requester']; ?>" required readonly>
                                              </div>
                                            </div>
                                            <!-- Requester -->

                                            <!-- Departement -->
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="departement">Departement</label>
                                                <input type="text" class="form-control" name="departement" id="departement" style="text-transform: uppercase;" value="<?= $row['requesterDepartement']; ?>" required readonly>
                                              </div>
                                            </div>
                                            <!-- Departement -->

                                            <!-- Site -->
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="site">Site</label>
                                                <input type="text" class="form-control" name="site" id="site" style="text-transform: uppercase;" value="<?= $row['requesterSite']; ?>" required readonly>
                                              </div>
                                            </div>
                                            <!-- Departement -->

                                          </div>
                                          <!-- end row -->
                                          <hr>

                                          <div class="row">
                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Master Item Description : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['miDescription'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Type : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['type'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">UoM : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['uom'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Category : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['category'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Sub Categoey 1 : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['sub_category1'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Sub Category 2 : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['sub_category2'] ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <!-- end row -->
                                          <div class="row">
                                            <?php
                                            if ($row['idWarehouse'] == "") {
                                              $idWarehouse = "";
                                            } else {
                                              $idWarehouse = $row['idWarehouse'];
                                              echo '
                                              <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                  <label for="type">Sub Inventory : </label>
                                                  <input class="form-control" type="text" disabled value="' . $idWarehouse . '">
                                                </div>
                                              </div>
                                              ';
                                            }

                                            if ($row['manufacturer'] == "") {
                                              $manufacturer = "";
                                            } else {
                                              $manufacturer = $row['manufacturer'];
                                              echo '
                                              <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                  <label for="type">Manufacturer / Brand : </label>
                                                  <input class="form-control" type="text" disabled value="' . $manufacturer . '">
                                                </div>
                                              </div>
                                              ';
                                            }

                                            if ($row['machineName'] == "") {
                                              $machineName = "";
                                            } else {
                                              $machineName = $row['machineName'];
                                              echo '
                                              <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                  <label for="type">Machine Name : </label>
                                                  <input class="form-control" type="text" disabled value="' . $machineName . '">
                                                </div>
                                              </div>
                                              ';
                                            }

                                            if ($row['partNumber'] == "") {
                                              $partNumber = "";
                                            } else {
                                              $partNumber = $row['partNumber'];
                                              echo '
                                              <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                  <label for="type">Part Number : </label>
                                                  <input class="form-control" type="text" disabled value="' . $partNumber . '">
                                                </div>
                                              </div>
                                              ';
                                            }
                                            ?>
                                          </div>
                                          <!-- end rows -->
                                          <hr>
                                          <div class="row d-flex justify-content-center">
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Status : </label>
                                                <input class="form-control text-primary" type="text" disabled value="<?= $row['status'] ?>">
                                              </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Assigned Date : </label>
                                                <input class="form-control text-primary" type="text" disabled value="<?= $row['assigned_date'] ?>">
                                              </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Last Update : </label>
                                                <input class="form-control text-primary" type="text" disabled value="<?= $row['updatedBy'] ?>">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class=" modal-footer text-center">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">Close</span>
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- End Modal Master Item  -->

                                <!-- Modal for Data/list Master Item -->
                                <div id="modalEditStatus<?= $row['r_miID_final'] ?>" class="modal">
                                  <div class="modal-dialog modal-md modal-dialog-centered">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title ">Edit Status Master Item</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="<?= $session_profile['session_address'] ?>MasterItemStatus" method="post">
                                          <div class="container">
                                            <div class="text-center">
                                              Yakin ingin menonaktifkan Master Item <strong><?= $row['miDescription'] ?></strong>
                                            </div>
                                            <input type="hidden" name="r_miID" value="<?= $row['r_miID_final'] ?>">
                                            <br>
                                            <div class="row text-center d-flex justify-content-center">
                                              <div class="col-4">
                                                <button type="submit" name="action" value="inactive" class="btn-danger form-control">INACTIVE</button>
                                              </div>
                                            </div>
                                        </form>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                <!-- End Modal Master Item  -->

                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <!--/Table User List -->
                        <!-- End Content Tab Component -->
                      </div>

                      <!-- TAB INACTIVE -->
                      <div class="tab-pane fade" id="inactive" role="tabpanel" aria-labelledby="closed-tab">
                        <br>
                        <!-- Table User List -->
                        <div class="table-responsive">
                          <table id="example" class="table table-bordered table-striped table-hover responsive nowrap" style="width:100%">
                            <thead>
                              <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">MI Code</th>
                                <th style="text-align: center;">Type</th>
                                <th style="text-align: center;">Item Description</th>
                                <th style="text-align: center;">Requester</th>
                                <th style="text-align: center;">Site - [Departement]</th>
                                <th style="text-align: center;">Assigned Date</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center; width: 5%"><i class="fa-solid fa-arrow-right-from-bracket"></i></th>
                              </tr>
                            </thead>
                            <tbody class="table-content">
                              <?php $i = 1;
                              foreach ($listManageMasterItem_inactive as $row) {
                                if ($row['status'] == "NEED APPROVAL") {
                                  $badge = "<div class='badge badge-pill badge-primary'>" . $row['status'] . "</div>";
                                } else if ($row['status'] == "ACTIVE") {
                                  $badge = "<div class='badge badge-pill badge-success'>" . $row['status'] . "</div>";
                                } else {
                                  $badge = "<div class='badge badge-pill badge-danger'>" . $row['status'] . "</div>";
                                }
                                // format tanggal
                                $date = date('d F Y / H:i:s', strtotime($row['assigned_date']));
                              ?>
                                <tr>
                                  <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $row['miCode'] ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $row['type'] ?></td>
                                  <td style="text-align: justify; vertical-align: middle;"><?= $row['miDescription'] ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $row['requester'] ?></td>
                                  <td style="text-align: justify; vertical-align: middle;"><?= $row['requesterSite'] . " - [" . $row['requesterDepartement'] ?>]</td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $date ?></td>
                                  <td style="text-align: center; vertical-align: middle;"><?= $badge ?></td>
                                  <td style="text-align: center; vertical-align: middle;">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalInactiveStatus<?= $row['r_miID_final'] ?>"><i class="fa fa-edit"></i> Status</a>
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalViewMI<?= $row['r_miID_final'] ?>"><i class="fa fa-eye"></i> View</a>
                                  </td>
                                </tr>

                                <!-- Modal for Data/list Master Item -->
                                <div id="modalViewMI<?= $row['r_miID_final'] ?>" class="modal">
                                  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                      <div class="modal-header navbar-custom">
                                        <h4 class="modal-title ">Detail Master Item Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="container">
                                          <div class="row d-flex justify-content-center text-lg text-primary"><strong>
                                              <?= $row['miDescription'] ?>
                                            </strong>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <!-- miCode -->
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="miCode">Code</label>
                                                <input type="text" class="form-control" name="miCode" id="miCode" style="text-transform: uppercase;" value="<?= $row['miCode']; ?>" required readonly>
                                              </div>
                                            </div>
                                            <!-- miCode -->

                                            <!-- Requester -->
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="requester">Requester</label>
                                                <input type="text" class="form-control" name="requester" id="requester" style="text-transform: uppercase;" value="<?= $row['requester']; ?>" required readonly>
                                              </div>
                                            </div>
                                            <!-- Requester -->

                                            <!-- Departement -->
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="departement">Departement</label>
                                                <input type="text" class="form-control" name="departement" id="departement" style="text-transform: uppercase;" value="<?= $row['requesterDepartement']; ?>" required readonly>
                                              </div>
                                            </div>
                                            <!-- Departement -->

                                            <!-- Site -->
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="site">Site</label>
                                                <input type="text" class="form-control" name="site" id="site" style="text-transform: uppercase;" value="<?= $row['requesterSite']; ?>" required readonly>
                                              </div>
                                            </div>
                                            <!-- Departement -->

                                          </div>
                                          <!-- end row -->
                                          <hr>

                                          <div class="row">
                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Master Item Description : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['miDescription'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Type : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['type'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">UoM : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['uom'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Category : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['category'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Sub Categoey 1 : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['sub_category1'] ?>">
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Sub Category 2 : </label>
                                                <input class="form-control" type="text" disabled value="<?= $row['sub_category2'] ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <!-- end row -->
                                          <div class="row">
                                            <?php
                                            if ($row['idWarehouse'] == "") {
                                              $idWarehouse = "";
                                            } else {
                                              $idWarehouse = $row['idWarehouse'];
                                              echo '
                                              <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                  <label for="type">Sub Inventory : </label>
                                                  <input class="form-control" type="text" disabled value="' . $idWarehouse . '">
                                                </div>
                                              </div>
                                              ';
                                            }

                                            if ($row['manufacturer'] == "") {
                                              $manufacturer = "";
                                            } else {
                                              $manufacturer = $row['manufacturer'];
                                              echo '
                                              <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                  <label for="type">Manufacturer / Brand : </label>
                                                  <input class="form-control" type="text" disabled value="' . $manufacturer . '">
                                                </div>
                                              </div>
                                              ';
                                            }

                                            if ($row['machineName'] == "") {
                                              $machineName = "";
                                            } else {
                                              $machineName = $row['machineName'];
                                              echo '
                                              <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                  <label for="type">Machine Name : </label>
                                                  <input class="form-control" type="text" disabled value="' . $machineName . '">
                                                </div>
                                              </div>
                                              ';
                                            }

                                            if ($row['partNumber'] == "") {
                                              $partNumber = "";
                                            } else {
                                              $partNumber = $row['partNumber'];
                                              echo '
                                              <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                  <label for="type">Part Number : </label>
                                                  <input class="form-control" type="text" disabled value="' . $partNumber . '">
                                                </div>
                                              </div>
                                              ';
                                            }
                                            ?>
                                          </div>
                                          <!-- end rows -->
                                          <hr>
                                          <div class="row d-flex justify-content-center">
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Status : </label>
                                                <input class="form-control text-primary" type="text" disabled value="<?= $row['status'] ?>">
                                              </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Assigned Date : </label>
                                                <input class="form-control text-primary" type="text" disabled value="<?= $row['assigned_date'] ?>">
                                              </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                              <div class="form-group">
                                                <label for="type">Last Update : </label>
                                                <input class="form-control text-primary" type="text" disabled value="<?= $row['updatedBy'] ?>">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class=" modal-footer text-center">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">Close</span>
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- End Modal Master Item  -->


                                <!-- Modal for Edit Status Master Item -->
                                <div id="modalInactiveStatus<?= $row['r_miID_final'] ?>" class="modal">
                                  <div class="modal-dialog modal-md modal-dialog-centered">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title ">Edit Status Master Item</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="<?= $session_profile['session_address'] ?>MasterItemStatus" method="post">
                                          <div class="container">
                                            <div class="text-center">
                                              Yakin ingin mengaktifkan Master Item <strong><?= $row['miDescription'] ?></strong>
                                            </div>
                                            <input type="hidden" name="r_miID" value="<?= $row['r_miID_final'] ?>">
                                            <br>
                                            <div class="row text-center d-flex justify-content-center">
                                              <div class="col-4">
                                                <button type="submit" name="action" value="active" class="btn-success form-control">ACTIVE</button>
                                              </div>
                                            </div>
                                        </form>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                <!-- End Modal Master Item  -->

                              <?php } ?>
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
<!-- </form> -->
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
  var tableActive = null;
  var tableApprovment = null;
  $(document).ready(function() {

    $('#tableActive #tSearch th').each(function(i) {
      if (i > 0) {
        var title = $('#tableActive #tSearch th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control text-sm d-flex justify-content-center" style="min-width:auto;" placeholder="' + title + '" data-index="' + i + '">');
      }});

    tableActive = $('#tableActive').DataTable({
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

    $('#tableApprovment #aSearch th').each(function(i) {
      if (i > 0) {
        var title = $('#tableApprovment #aSearch th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control text-sm d-flex justify-content-center" style="min-width:auto;" placeholder="' + title + '" data-index="' + i + '">');
      }});

    tableAprovment = $('#tableApprovment').DataTable({
      "orderCellsTop": true,
      "lengthMenu": [5, 10, 20, 50, 100, 200, 500],
      "paging": true,
      // "responsive": false,
      "lengthChange": true,
      "autoWidth": false,
      // "scrollX": true,
      "searching": true,
    });

    $(tableAprovment.table().container()).on('keyup', '#aSearch input', function() {
      tableAprovment
        .column($(this).data('index'))
        .search(this.value)
        .draw();
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