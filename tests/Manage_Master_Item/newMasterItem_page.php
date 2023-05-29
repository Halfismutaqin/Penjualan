<?php

use PhpParser\Node\Stmt\If_;

$session_profile = session()->get(); ?>
<!-- Site Wrapper -->
<div class="content-wrapper">
  <?php if ($message != "") {
    echo $message;
  } else if ($message == "") {
  }

  //  :: GET TYPE MASTER ITEM ::
  if ($code == "0") {
    $pageName = "Expense / Assets";
  } elseif ($code == "1") {
    $pageName = "Inventory Sparepart";
  } elseif ($code == "2") {
    $pageName = "Inventory GA";
  } else {
    $pageName = "";
  }
  ?>

  <form action="<?php echo $session_profile['session_address']; ?>masterItem_insertNew/<?= $session_profile['session_userID']; ?>" class="needs-validation" novalidate method="post" enctype="multipart/form-data" id="newVariationOrder_page">
    <section class="pt-3 pb-3 pr-1 pl-1 shadow-lg">
      <div class="container-fluid">

        <div class="card">
          <!-- Card Header -->
          <div class="card-header">
            <div class="row">
              <!-- TITLE -->
              <div class="col-lg-10 col-md-10 col-sm-12" style="margin: auto;">
                <h1 class="card-title page-title"><b><?= $pageTitle . " [" . $pageName . "]"; ?></b></h1>
              </div>
              <!-- TITLE -->

              <!-- BACK BUTTON -->
              <div class="col-lg-2 col-md-2 col-sm-12" style="margin: auto;">
                <a href="<?php echo $session_profile['session_address']; ?>masterItem_list" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-square-caret-left"></i> Back </a>
              </div>
              <!--/BACK BUTTON -->

            </div>
          </div>
          <!--/.Card Header -->
        </div>

        <!-- ROW 1 -->
        <div class="row">
          <div class="col-lg-12 mb-0 align-items-stretch">
            <div class="card">
              <div class="card-success">
                <div class="card-header card-header-custom">
                  <h1 class="card-title">Master Item Information</h1>
                </div>
              </div>

              <!-- Card Body -->
              <div class=" card-body card-body-custom" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">

                    <!-- Requester -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="requester">Requester<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="requester" id="requester" style="text-transform: uppercase;" value="<?= $session_profile['session_email']; ?>" required readonly>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Requester -->

                    <!-- Departement -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="departement">Departement<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="departement" id="departement" style="text-transform: uppercase;" value="<?= $requesterDepartement; ?>" required readonly>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Departement -->

                    <!-- Site -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="site">Site<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="site" id="site" style="text-transform: uppercase;" value="<?= $session_profile['session_site']; ?>" required readonly>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Departement -->

                    <!-- Order Type -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="miType">Request Type<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="miType" id="miType" style="text-transform: uppercase;" value="<?= $miType; ?>" required readonly>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Order Type -->

                    <div class="col-12">
                      <hr>
                    </div>

                    <!-- Item Desc -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="itemDesc">Item Description<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="itemDesc" id="itemDesc" autocomplete="off" required>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Item Desc -->

                    <!-- UOM -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="uom">UOM<a style="color:red;">*</a></label>
                        <select class="form-control select2" name="uom" id="uom" required style="text-transform: uppercase;">
                          <option value="" selected disabled>-</option>
                          <?php foreach ($comboUom as $option) { ?>
                            <option value="<?php echo $option['uom']; ?>"><?php echo $option['uom']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- UOM -->

                    <!-- Price -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="price">Estimated Price<a style="color:red;">*</a></label>
                        <input type="text" class="form-control" id="rupiah">
                        <input class="form-control" hidden name="price" id="price" required>
                      </div>
                    </div>
                    <!-- Price -->


                    <!-- Categori -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="category">Category<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <select name="category" id="category" class="form-control" required>
                            <?php
                            // JIKA MASTER ITEM DENGAN KATEGORI EXPENSE / ASSETS
                            if ($code == "0") {
                            ?>
                              <option value="" disabled selected>-</option>
                              <option value="EXPENSE">EXPENSE</option>
                              <option value="ASSETS">ASSETS</option>
                              <option value="RELEASE FIMA">RELEASE FIMA</option>
                            <?php
                            }
                            // JIKA MASTER ITEM DENGAN KATEGORI iNVENTORY SP
                            else if ($code == "1") {
                            ?>
                              <option value="INV EAM" selected>INV EAM</option>
                            <?php
                            }
                            // JIKA MASTER ITEM DENGAN KATEGORI iNVENTORY GA
                            else if ($code == "2") {
                            ?>
                              <option value="INV GA" selected>INV GA</option>
                            <?php
                            }
                            ?>
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
                          <select name="sub_category1" id="sub_category1" class="form-control" required>
                            <option value="-"> - </option>
                            <?php foreach ($comboSubCategory1 as $option) { ?>
                              <option value="<?php echo $option['sub_category1']; ?>"><?php echo $option['sub_category1']; ?></option>
                            <?php } ?>
                          </select>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Sub Category -->

                    <!-- Sub Categori -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="sub_category2">Sub Category 2<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <select name="sub_category2" id="sub_category2" class="form-control" required>
                            <option value=""> - </option>
                          </select>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Sub Category -->
                    <?php
                    if ($code == "1") {
                      $read = "readonly";
                    } else {
                      $read = "";
                    }
                    ?>
                    <!-- Kode Item -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="specialCode">No Catalog/ No SOP/ Code Special..</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="specialCode" id="specialCode" style="text-transform: uppercase;" autocomplete="off" <?= $read ?> required>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                        <label class="small" for="specialCode"><a style="color:red;">* ex: CR-153.00/SOP-QC-O044, Jika Tidak Ada silakan diisi : NA</a></label>
                      </div>
                    </div>
                    <!-- Kode Item -->

                    <!-- Sub Inventory -->
                    <?php
                    if (($code == "1") or ($code == "2")) { ?>
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="subInventory">Sub Inventory/ Warehouse</label>
                          <div class="input-group has-validation">
                            <select name="subInventory" id="subInventory" class="form-control" required>
                              <option value="-"> - </option>
                              <?php foreach ($comboSubInventory as $option) { ?>
                                <option value="<?php echo $option['subInventoryID']; ?>"><?php echo $option['siteName'] . " - " . $option['descWarehouse']; ?></option>
                              <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                              Please Fill In Required Field
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Sub Inventory -->
                    <?php
                    }
                    ?>
                    <!-- End Row -->
                  </div>
                  <!-- END ROW -->

                  <?php
                  if ($code == "1") {
                    $lock = "";
                  ?>
                    <hr>
                    <div class="row">

                      <!-- Manufacturer -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="manufacturer">Manufacturer/ Brand</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="manufacturer" id="manufacturer" style="text-transform: uppercase;" autocomplete="off">
                            <div class="invalid-feedback">
                              Please Fill In Required Field
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Manufacturer -->

                      <!-- Machine Name -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="machineName">Machine Name</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="machineName" id="machineName" style="text-transform: uppercase;" autocomplete="off">
                            <div class="invalid-feedback">
                              Please Fill In Required Field
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Machine Name -->

                      <!-- Part Number -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="partNumber">Part Number</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="partNumber" id="partNumber" style="text-transform: uppercase;" autocomplete="off">
                            <div class="invalid-feedback">
                              Please Fill In Required Field
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Part Number -->

                      <!-- Multiples -> Removed -->
                      <!-- <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="kelipatan">Multiples<a style="color:red;">*</a></label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="kelipatan" id="kelipatan" autocomplete="off" required>
                            <div class="invalid-feedback">
                              Please Fill In Required Field
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <!-- Multiples -->
                    </div>
                  <?php
                  } else if ($code == "0") {
                    $lock = "disabled";
                  } else {
                    $lock = "";
                  }
                  ?>
                  <div class="row">

                    <!-- Stok Min -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="stockMin">Stok Min</label>
                        <div class="input-group has-validation">
                          <input type="number" class="form-control" name="stockMin" id="stockMin" <?= $lock ?> autocomplete="off">
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Stok Min -->

                    <!-- Stok Max -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="stockMax">Stok Max</label>
                        <div class="input-group has-validation">
                          <input type="number" class="form-control" name="stockMax" id="stockMax" <?= $lock ?> autocomplete="off">
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Stok Max -->

                    <!-- Lead Time -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="leadTime">Lead Time (Hari Kerja)</label>
                        <div class="input-group has-validation">
                          <input type="number" class="form-control" name="leadTime" id="leadTime" autocomplete="off">
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Lead Time -->
                  </div>

                  <hr>
                </div>
              </div>
              <!-- Card Body -->

            </div>
          </div>
        </div>
        <!-- ROW 1 -->

        <!-- ROW 2 -->
        <div class="row">
          <div class="col-lg-12 mb-3 align-items-stretch">
            <div class="card">
              <div class="card-success">
                <div class="card-header  card-header-custom">
                  <h1 class="card-title">Attachment List</h1>
                </div>
              </div>

              <!-- Card Body -->
              <div class="card-body card-body-custom" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">

                    <div class="col-12">
                      <table id="Table3" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-title">
                          <tr>
                            <!-- <th class="text-center" style="width: 10%;">No</th> -->
                            <th class="text-center" style="width: 55%;">Document Name</th>
                            <th class="text-center" style="width: 40%;">File <i>(Max 10MB)</i></th>
                            <!-- <th class="text-center" style="width: 50%;">Remove</th> -->
                          </tr>
                        </thead>
                        <tbody id="tbody" class="table-content">
                          <!-- :: UPLOAD/ ATTACHMENT LAMPIRAN PENAWARAN :: -->
                          <tr>
                            <td style="text-align: center;vertical-align: middle;">
                              <div style="text-align: left;vertical-align: middle;">
                                <a>LAMPIRAN PENAWARAN </a>
                                <a style="color:red;">*</a>
                              </div>
                              <input type="text" class="form-control" name="attachmentDescription_1" id="attachmentDescription_1" style="text-transform: uppercase;" value="LAMPIRAN PENAWARAN" required hidden readonly>
                            </td>
                            <!-- FILE UPLOAD -->
                            <td>
                              <div class="form-group pt-3 pr-1 pl-1">
                                <div class="input-group has-validation">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_1" name="documentFile[1]" onchange="return validateFile(this)" required>
                                    <label class="custom-file-label" for="documentFile">Choose file</label>
                                  </div>
                                  <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <!-- FILE UPLOAD -->
                            <!-- <td style="text-align: center;vertical-align: middle;">
                              <button class="btn btn-danger remove" disabled type="button"><i class="fa-solid fa-xmark"></i></button>
                            </td> -->
                          </tr>

                          <!-- UPLOAD/ ATTACHMENT EA -->
                          <?php
                          if (($code == "0") or ($code == "2")) {
                          ?>
                            <tr>
                              <td style="text-align: center;vertical-align: middle;">
                                <div style="text-align: left;vertical-align: middle;">
                                  <a>OLD DESIGN DRAFT</a>
                                </div>
                                <input type="text" class="form-control" name="attachmentDescription_2" id="attachmentDescription_2" style="text-transform: uppercase;" value="OLD DESIGN DRAFT" hidden readonly>
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_2" name="documentFile[2]" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <!-- FILE UPLOAD -->
                            </tr>

                            <tr>
                              <td style="text-align: center;vertical-align: middle;">
                                <div style="text-align: left;vertical-align: middle;">
                                  <a>NEW DESIGN DRAFT</a>
                                </div>
                                <input type="text" class="form-control" name="attachmentDescription_3" id="attachmentDescription_3" style="text-transform: uppercase;" value="NEW DESIGN DRAFT" hidden readonly>
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_3" name="documentFile[3]" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>

                            <!-- ATTACHMENT BLANK 4 -->
                            <tr>
                              <td style="text-align: center;vertical-align: middle;">
                                <input type="text" class="form-control" name="attachmentDescription_4" id="attachmentDescription_4" style="text-transform: uppercase;">
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_4" name="documentFile[4]" autocomplete="off" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <!-- FILE UPLOAD -->
                            </tr>

                            <!-- ATTACHMENT BLANK 5 -->
                            <tr>
                              <td style="text-align: center;vertical-align: middle;">
                                <input type="text" class="form-control" name="attachmentDescription_5" id="attachmentDescription_5" style="text-transform: uppercase;">
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_5" name="documentFile[5]" autocomplete="off" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <!-- FILE UPLOAD -->
                            </tr>

                            <!-- ATTACHMENT BLANK 6 -->
                            <tr>
                              <td style="text-align: center;vertical-align: middle;">

                                <input type="text" class="form-control" name="attachmentDescription_6" id="attachmentDescription_6" style="text-transform: uppercase;">
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_6" name="documentFile[6]" autocomplete="off" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <!-- FILE UPLOAD -->
                            </tr>

                            <!-- ATTACHMENT BLANK 7 -->
                            <tr hidden>
                              <td style="text-align: center;vertical-align: middle;" >

                                <input type="text" class="form-control" name="attachmentDescription_7" id="attachmentDescription_7" style="text-transform: uppercase;">
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_7" name="documentFile[7]" autocomplete="off" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <!-- FILE UPLOAD -->
                            </tr>

                            <!-- :: ATTACHMENT FOR INVENTORY SP :: -->
                          <?php
                          } else if ($code == "1") {
                          ?>
                            <tr>
                              <td style="text-align: center;vertical-align: middle;">
                                <div style="text-align: left;vertical-align: middle;">
                                  <a>SCAN FORM REGISTER</a>
                                </div>
                                <input type="text" class="form-control" name="attachmentDescription_2" id="attachmentDescription_2" style="text-transform: uppercase;" value="SCAN FORM REGISTER" hidden readonly>
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_2" name="documentFile[2]" onchange="return validateFile(this)" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>

                            <!-- ATTACHMENT BLANK 3 -->
                            <tr>
                              <td style="text-align: center;vertical-align: middle;">
                                <input type="text" class="form-control" name="attachmentDescription_3" id="attachmentDescription_3" style="text-transform: uppercase;">
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_3" name="documentFile[3]" autocomplete="off" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <!-- FILE UPLOAD -->
                            </tr>

                            <!-- ATTACHMENT BLANK 4 -->
                            <tr>
                              <td style="text-align: center;vertical-align: middle;">
                                <input type="text" class="form-control" name="attachmentDescription_4" id="attachmentDescription_4" style="text-transform: uppercase;">
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_4" name="documentFile[4]" autocomplete="off" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <!-- FILE UPLOAD -->
                            </tr>

                            <!-- ATTACHMENT BLANK 5 -->
                            <tr>
                              <td style="text-align: center;vertical-align: middle;">

                                <input type="text" class="form-control" name="attachmentDescription_5" id="attachmentDescription_5" style="text-transform: uppercase;">
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_5" name="documentFile[5]" autocomplete="off" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <!-- FILE UPLOAD -->
                            </tr>
                            <!-- ATTACHMENT BLANK 6 -->
                            <tr hidden>
                              <td style="text-align: center;vertical-align: middle;">

                                <input type="text" class="form-control" name="attachmentDescription_6" id="attachmentDescription_6" style="text-transform: uppercase;">
                              </td>
                              <!-- FILE UPLOAD -->
                              <td>
                                <div class="form-group pt-3 pr-1 pl-1">
                                  <div class="input-group has-validation">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_6" name="documentFile[6]" autocomplete="off" onchange="return validateFile(this)">
                                      <label class="custom-file-label" for="documentFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Upload</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <!-- FILE UPLOAD -->
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <br>
                    <br>
                    <div class="col-12">
                      <div class="button-group" style="text-align: right; font-size: 60%;">
                        <button id="addBtn" class="btn-lg btn-primary" type="button" hidden><i class="fas fa-solid fa-plus"></i></button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- Card Body -->

            </div>
          </div>
        </div>
        <!-- ROW 2 -->

        <!-- ROW 2 -->
        <div class="row">
          <div class="col-lg-12 mb-3 align-items-stretch">
            <div class="card">

              <!-- Card Footer -->
              <div class="card-footer" style="font-size: 80%; height: 100%;">
                <div class="container">
                  <div class="form-group">
                    <label for="reason">Add Reason/ Note (Optional)</label>
                    <div class="input-group has-validation">
                      <textarea name="reason" id="reason" class="form-control" rows="4" style="height: 124px;"></textarea>
                      <!-- <input type="text" class="form-control" name="reason" id="reason" value=""   required style="text-transform: uppercase;"> -->
                      <div class="invalid-feedback">
                        Please Fill In Required Field
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-12 mx-auto-fit;" style="text-align: center">
                      <!-- Button Submit -->
                      <div class="form-group" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Request New Master Item?')">Submit</button>
                      </div>
                      <!--/.Button Submit-->
                    </div>
                  </div>
                </div>
              </div>
              <!-- Card Footer -->

            </div>
          </div>
        </div>
        <!-- ROW 2 -->
      </div>
    </section>
  </form>
</div>
<!-- /.Site Wrapper -->

<!-- Page specific script -->
<!-- jQuery -->

<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTable -->
<script src="<?php echo $session_profile['session_address']; ?>themes/dist/js/jquery.dataTables.min.js"></script>
<!--Page Script for Table-->
<script>
  $(function() {
    $("#Table1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#Table1_wrapper .col-md-6:eq(0)');
    $('#Table3').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
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

<script>
  function test() {
    $('#Table3 tbody').find("tr").each(function(index, element) {
      console.log(element);
      // var colSize = $(element).find('td').length;
      // console.log("  Number of cols in row " + (index + 1) + " : " + colSize);
      $(element).find('td').each(function(index, element) {
        var colVal = $(element).text();
        console.log("    Value in col " + (index + 1) + " : " + colVal.trim());
      });
    });
  }

  $(document).ready(function() {
    // Denotes total number of rows
    var rowIdx = 3;

    $('#submitBtn').on('click', function() {
      var value_subject = $('#subject').val();


      var outer_table_array = [];
      var inner_table_array = [];
      $('#Table3 tbody').find("tr").each(function(i, e) {
        inner_table_array = [];
        $(e).find("input, select").each(function(i_2, e_2) {
          inner_table_array.push($(e_2).val());
        });
        outer_table_array.push(inner_table_array);

      });
      console.log(outer_table_array);



    });

    // jQuery button click event to add a row
    $('#addBtn').on('click', function() {

      // Adding a row inside the tbody.
      $('#tbody').append(
        `<tr id="R${++rowIdx}"> 
        <?php $i = 5; ?>
          
        <td style="text-align: center;vertical-align: middle;">

            <input type="text" class="form-control" name="attachmentDescription_<?php echo $i ?>" id="attachmentDescription_<?php echo $i ?>" style="text-transform: uppercase;" value="" required>
          </td>

          <!-- FILE UPLOAD -->
          <td>
            <div class="form-group pt-3 pr-1 pl-1">
              <div class="input-group has-validation">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" accept='image/jpeg, image/png, application/pdf' id="documentFile_<?php echo $i ?>" name="documentFile[<?php echo $i ?>]">
                  <label class="custom-file-label" for="documentFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
          </td>
          <!-- FILE UPLOAD -->

          // <td style="text-align: center;vertical-align: middle;">
          //   <button class="btn btn-danger remove" type="button"><i class="fa-solid fa-xmark"></i></button>
          // </td>
        </tr>`);
      <?php $i++ ?>
    });

    // jQuery button click event to remove a row.
    $('#tbody').on('click', '.remove', function() {

      // Getting all the rows next to the row
      // containing the clicked button
      var child = $(this).closest('tr').nextAll();

      // Iterating across all the rows 
      // obtained to change the index
      child.each(function() {

        // Getting <tr> id.
        var id = $(this).attr('id');

        // Getting the <p> inside the .row-index class.
        var idx = $(this).children('.row-index').children('p');

        // Gets the row number from <tr> id.
        var dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(`Row ${dig - 1}`);

        // Modifying row id.
        $(this).attr('id', `R${dig - 1}`);
      });

      // Removing the current row.
      $(this).closest('tr').remove();

      // Decreasing total number of rows by 1.
      rowIdx--;
    });
  });
</script>

<!-- BS Custom File Input -->
<script src="<?php echo $session_profile['session_address']; ?>themes/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="<?php echo $session_profile['session_address']; ?>themes/dist/js/jquery-3.5.1.js"></script>

<!-- CUSTOM FILE UPLOAD -->
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>

<!-- Custom Input Validation -->
<script type="text/javascript">
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')


    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        //console.log('test ', form)
        form.addEventListener('submit', function(event) {
          //console.log(event)
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>

<!-- script for sub category :: wait on progress -->
<script type='text/javascript'>
  var baseURL = "<?php echo $session_profile['session_address']; ?>";
  $(document).ready(function() {
    $('#sub_category1').change(function() {
      console.log('data change')

      var sub_category1 = $(this).val();
      console.log('sub_category1 ', sub_category1)
      var url = '<?php echo $session_profile['session_address']; ?>/ComboBox/get_subCategoy2'
      // console.log('url ', url)

      $.ajax({
        url: url,
        method: 'POST',
        data: {
          'sub_category1': sub_category1
        },

        dataType: 'json',
        success: function(response) {
          console.log('response ', response)
          $('#sub_category2').find('option').not(':first').remove();
          $.each(response, function(index, data) {
            $('#sub_category2').append('<option value="' + data['sub_category2'] + '">' + data['sub_category2'] + '</option>');
          });
        }
      });
    });
  });
</script>

<!-- validasi upload file (only allow images or pdf) -->
<script>
  const allowedTypes = ["application/pdf", "image/jpeg", "image/png", "image/gif"];
  const maxFileSize = 10 * 1024 * 1024; // 10 MB

  function validateFile(fileInput) {
    const files = fileInput.files;

    // Check file type
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const fileType = file.type;

      if (!allowedTypes.includes(fileType)) {
        alert("Notice: File type not allowed! (Only accept image or PDF document)");
        fileInput.value = "";
        return false;
      }
    }

    // Check file size
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const fileSize = file.size;

      if (fileSize > maxFileSize) {
        alert("Notice: File size exceeds 10 MB limit!");
        fileInput.value = "";
        return false;
      }
    }

    return true;
  }
</script>

<!-- funsgsi untuk konversi integer ke mata uang -->
<script>
var rupiah = document.getElementById("rupiah");
var price = document.getElementById("price");

rupiah.addEventListener("keyup", function(e) {
  var formattedRupiah = formatRupiah(this.value);
  rupiah.value = formattedRupiah;
  
  // Parse the formattedRupiah value to integer
  var parsedRupiah = parseInt(formattedRupiah.replace(/\D/g, ''));
  
  // Assign the parsedRupiah value to price input
  price.value = parsedRupiah;
});

function formatRupiah(angka) {
  var number_string = angka.replace(/[^0-9]/g, "");
  var rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number_string);
  return rupiah;
}
</script>