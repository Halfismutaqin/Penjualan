<?php

use PhpOffice\PhpSpreadsheet\Worksheet\Row;

$session_profile = session()->get(); ?>
<div class="content-wrapper">
  <?php if ($message != "") {
    echo $message;
  } else if ($message == "") {
  } ?>

  <!-- Site Wrapper -->
  <form action="<?php echo $session_profile['session_address']; ?>ReSubmitMasterItem/<?= $miDetail['r_miID']; ?>" class="needs-validation" novalidate method="post" enctype="multipart/form-data" id="newMasterItem_page">
    <section class="pt-3 pb-3 pr-1 pl-1 shadow-lg">
      <div class="container-fluid">

        <div class="card">
          <!-- Card Header -->
          <div class="card-header">
            <div class="row">
              <!-- TITLE -->
              <div class="col-lg-8 col-md-8 col-sm-12" style="margin: auto;">
                <h1 class="card-title page-title"><b> Detail Master Item [Return] </b></h1>
              </div>
              <!-- TITLE -->

              <!-- APPROVAL HISTORY -->
              <div class="col-lg-2 col-md-2 col-sm-12" style="margin: auto;">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalHistorymi" style="width: 100%;"><i class="fa-solid fa-list"> </i> History </a>
              </div>
              <!--/APPROVAL HISTORY -->

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
          <div class="col-lg-12 mb-0 align-items-stretch">
            <div class="card">
              <div class="card-success">
                <div class="card-header card-header-custom">
                  <h1 class="card-title">Pending Request Master Item Information</h1>
                </div>
              </div>

              <!-- Card Body -->
              <div class="card-body card-body-custom" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">

                    <!-- miCode -->
                    <div class="col-lg-2 col-md-2 col-sm-12">
                      <div class="form-group">
                        <label for="miCode">Code</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="miCode" id="miCode" style="text-transform: uppercase;" value="<?= $miDetail['miCode']; ?>" required readonly>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Requester -->

                    <!-- Requester -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="requester">Requester</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="requester" id="requester" style="text-transform: uppercase;" value="<?= $miDetail['requester']; ?>" required readonly>
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
                        <label for="departement">Departement</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="departement" id="departement" style="text-transform: uppercase;" value="<?= $miDetail['requesterDepartement']; ?>" required readonly>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Departement -->

                    <!-- Site -->
                    <div class="col-lg-2 col-md-2 col-sm-12">
                      <div class="form-group">
                        <label for="site">Site</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="site" id="site" style="text-transform: uppercase;" value="<?= $miDetail['requesterSite']; ?>" required readonly>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Departement -->

                    <!-- Change Order Type -->
                    <div class="col-lg-2 col-md-2 col-sm-12">
                      <div class="form-group">
                        <label for="miType">Request Type</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="miType" id="miType" style="text-transform: uppercase;" value="<?= $miDetail['type']; ?>" required readonly>
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Change Order Type -->

                    <div class="col-12">
                      <hr>
                    </div>

                    <!-- :: DETAIL MASTER ITEM IN HERE :: -->
                    <!-- Item Desc -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="itemDesc">Master Item Request Description<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" name="itemDesc" id="itemDesc" style="text-transform: uppercase;" value="<?= $miDetail['miDescription'] ?>" required readonly>

                        </div>
                      </div>
                    </div>
                    <!-- Item Desc -->

                    <!-- For Next... -->
                    <!-- New Item Desc -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="new_itemDesc"> New Master Item Description </label> <label class="small"><a style="color:red;">(Optional)</a></label>
                        <input type="text" class="form-control" name="new_itemDesc" id="new_itemDesc" style="text-transform: uppercase;" placeholder="Insert New Master Item Description" value="">
                      </div>
                    </div>
                    <!-- New Item Desc -->

                    <!-- UOM -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="uom">UOM<a style="color:red;">*</a></label>
                        <select class="form-control select2" name="uom" id="uom" required>
                          <option selected value="<?= $miDetail['uom'] ?>"><?= $miDetail['uom'] ?></option>
                          <?php foreach ($comboUom as $option) { ?>
                            <option value="<?php echo $option['uom']; ?>"><?php echo $option['uom'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- UOM -->

                    <!-- Price -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="form-group">
                        <?php
                        $convert_price = "Rp " . number_format($miDetail['price'], 0, ',', '.');
                        ?>
                        <label for="price">Price<a style="color:red;">*</a></label>
                        <input type="text" class="form-control" id="rupiah" value="<?= $convert_price ?>">

                        <input class="form-control" name="price" id="price" value="<?= $miDetail['price'] ?>" hidden required>
                      </div>
                    </div>
                    <!-- Price -->


                    <!-- Categori -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="category">Request Category<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <select name="category" id="category" class="form-control" readonly required>
                            <option selected value="<?= $miDetail['category'] ?>"><?= $miDetail['category'] ?></option>
                            <?php
                            $code = "";
                            // JIKA MASTER ITEM DENGAN KATEGORI EXPENSE / ASSETS
                            if ($code == "EXPENSE / ASSETS") {
                            ?>
                              <option value="" readonly selected>-</option>
                              <option value="EXPENSE">EXPENSE</option>
                              <option value="ASSETS">ASSETS</option>
                              <option value="RELEASE FIMA">RELEASE FIMA</option>
                            <?php
                            }
                            // JIKA MASTER ITEM DENGAN KATEGORI iNVENTORY SP
                            else if ($code == "INVENTORY SPAREPART") {
                            ?>
                              <option value="INV EAM" selected>INV EAM</option>
                            <?php
                            }
                            // JIKA MASTER ITEM DENGAN KATEGORI iNVENTORY GA
                            else if ($code == "INVENTORY GA") {
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
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="sub_category1">Sub Category 1<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <select name="sub_category1" id="sub_category1" class="form-control primary" required>
                            <option selected value="<?= $miDetail['sub_category1'] ?>"><?= $miDetail['sub_category1'] ?></option>
                            <?php foreach ($comboSubCategory1 as $option) { ?>
                              <option value="<?php echo $option['sub_category1']; ?>"><?php echo $option['sub_category1']; ?></option>
                            <?php } ?>
                          </select>

                        </div>
                      </div>
                    </div>
                    <!-- Sub Category -->

                    <!-- Sub Categori -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="sub_category2">Sub Category 2<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <select name="sub_category2" id="sub_category2" class="form-control" required>
                            <option selected value="<?= $miDetail['sub_category2'] ?>"><?= $miDetail['sub_category2'] ?></option>
                          </select>

                        </div>
                      </div>
                    </div>
                    <!-- Sub Category -->
                    <!-- Sub Inventory / Warehouse -->
                    <?php
                    if ((($miDetail['type']) == "INVENTORY SPAREPART") or (($miDetail['type']) == "INVENTORY GA")) { ?>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="subInventory">Sub Inventory/ Warehouse<a style="color:red;">*</a></label>
                          <div class="input-group has-validation">
                            <select name="subInventory" id="subInventory" class="form-control" required>
                              <option selected value="<?= $miDetail['subInventoryID'] ?>"> <?= $miDetail['idWarehouse'] . " - " . $miDetail['descWarehouse'] ?> </option>
                              <?php foreach ($comboSubInventory as $option) { ?>
                                <option value="<?php echo $option['subInventoryID']; ?>"><?php echo $option['idWarehouse'] . " - " . $option['descWarehouse']; ?></option>
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
                    if (($miDetail['type']) !== "INVENTORY SPAREPART") {
                    ?>

                      <!-- Kode Item -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="specialCode">No Catalog/ No SOP/ Code Special..</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="specialCode" id="specialCode" style="text-transform: uppercase;" value="<?= $miDetail['noCatalog_Sop_Code'] ?>" required>
                          </div>
                          <label class="small" for="specialCode"><a style="color:red;">* ex: CR-153.00/SOP-QC-O044, Jika Tidak Ada silakan diisi : NA</a></label>
                        </div>
                      </div>
                      <!-- Kode Item -->

                    <?php
                    }
                    ?>
                    <!-- END ROW -->
                  </div>
                  <hr>

                  <div class="row">
                    <?php
                    if (($miDetail['type']) == "INVENTORY SPAREPART") {
                      $lock = "";
                    ?>
                      <!-- FIELD TAMBAHAN INVENTORY SPAREPART  -->
                      <!-- Manufacturer -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="manufacturer">Manufacturer</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="manufacturer" id="manufacturer" style="text-transform: uppercase;" value="<?= $miDetail['manufacturer'] ?>">
                          </div>
                        </div>
                      </div>
                      <!-- Manufacturer -->

                      <!-- Machine Name -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="machineName">Machine Name</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="machineName" id="machineName" style="text-transform: uppercase;" value="<?= $miDetail['machineName'] ?>">
                          </div>
                        </div>
                      </div>
                      <!-- Machine Name -->

                      <!-- Part Number -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="partNumber">Part Number</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="partNumber" id="partNumber" style="text-transform: uppercase;" value="<?= $miDetail['partNumber'] ?>">
                          </div>
                        </div>
                      </div>
                      <!-- Part Number -->
                    <?php
                    } elseif (($miDetail['type']) == "EXPENSE / ASSETS") {
                      $lock = "readonly";
                    } else {
                      $lock = "";
                    }
                    ?>
                    <!-- Stock Minimum -->
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="stockMin">Stock Minimum</label>
                        <div class="input-group has-validation">
                          <input type="number" class="form-control" <?= $lock; ?> name="stockMin" id="stockMin" style="text-transform: uppercase;" value="<?= $miDetail['stockMin'] ?>">
                        </div>
                      </div>
                    </div>
                    <!-- Stock Minimum -->

                    <!-- Stock Maximum -->
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="stockMax">Stock Maximum</label>
                        <div class="input-group has-validation">
                          <input type="number" class="form-control" <?= $lock; ?> name="stockMax" id="stockMax" style="text-transform: uppercase;" value="<?= $miDetail['stockMax'] ?>">
                        </div>
                      </div>
                    </div>
                    <!-- Stock Maximum -->

                    <!-- Lead Time -->
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="leadTime">Lead Time</label>
                        <div class="input-group has-validation">
                          <input type="number" class="form-control" name="leadTime" id="leadTime" style="text-transform: uppercase;" value="<?= $miDetail['leadTime'] ?>">
                        </div>
                      </div>
                    </div>
                    <!-- Lead Time -->
                    <!-- Kelipatan / Multiple -> Removed -->
                    <!-- <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="multiple">Multiple (Kelipatan)</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="multiple" id="multiple" style="text-transform: uppercase;" value="" readonly>
                          </div>
                        </div>
                      </div> -->
                    <!-- Kelipatan / Multiple -->
                  </div>
                  <!-- :: END DETAIL MASTER ITEM :: -->

                  <!-- End Foreach -->

                </div>
              </div>
            </div>
            <!-- Card Body -->

          </div>
        </div>
        <!-- ROW 1 -->

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
              <div class="card-body" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">

                    <div class="col-12">
                      <table id="example3" class="table table-bordered table-striped table-hover w-100">
                        <thead>
                          <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 55%;">Document Description</th>
                            <th class="text-center" style="width: 45%;">File</th>

                          </tr>
                        </thead>
                        <tbody id="tbody">
                          <?php $i = 1;
                          foreach ($miAttachment as $row) { ?>
                            <tr>
                              <!-- RUNNING NUMBER -->
                              <td style="text-align: center;vertical-align: middle;"><?= $i++ ?>. </td>
                              <!--/RUNNING NUMBER -->

                              <!-- DOCUMENT NAME -->
                              <td style="vertical-align: middle;"><?= $row['attachmentDetail']; ?>
                              </td>
                              <!--/DOCUMENT NAME -->

                              <!-- FILE -->
                              <td style="vertical-align: middle; text-align: center;">
                                <?php if ($row['attachment'] == "") { ?>
                                <?php } else { ?>
                                  <a target='_blank' href="<?php echo site_url(); ?>file/masterItemDocument/<?= $row['attachment']; ?>">click here</a>
                                <?php } ?>
                              </td>
                              <!-- FILE -->
                            </tr>
                          <?php ;
                          } 
                          ?>
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

        <!-- ROW 2 -->
        <div class="row">
          <div class="col-lg-12 mb-3 align-items-stretch">
            <div class="card">


              <!-- :: cek footer :: -->
              <!-- Card Footer -->
              <div class="card-footer" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">
                    <!-- Master Item Code -->
                    <div class="col-lg-4 col-md-6 col-sm-12">

                      <div class="form-group">
                        <label for="action_mi">Action?<a style="color:red;">*</a> </label>
                        <div class="input-group has-validation">
                          <select id="action_mi" name="action_mi" class="form-control" style="text-transform: uppercase;" data-url="<?php echo $session_profile['session_address']; ?>ComboBox/get_masterCode">
                            <option value="RESUBMIT">RESUBMIT</option>
                            <option value="REJECT" class="text-danger"><strong>REJECT</strong></option>
                          </select>
                        </div>
                      </div>
                      <label for="itemType">Item Type<a style="color:red;">*</a></label>
                      <div class="input-group has-validation">
                        <select class="form-control" name="itemType" id="itemType" required>
                          <option value="<?= $miDetail['itemTypeID'] ?>" readonly selected> <?= $miDetail['itemType'] ?> </option>
                          <?php foreach ($comboItemType as $option) { ?>
                            <option value="<?= $option['itemTypeID']; ?>"><?= $option['itemType'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- Master Item Code -->

                    <!-- Master Code -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="miNumber">Code Master Item </label> <span id="validasi-status"></span>
                        <div class="input-group">
                          <input class="form-control" name="miNumber" id="miNumber" style="text-transform: uppercase;" placeholder="INPUT MASTER ITEM" value="<?= $miDetail['miNumber'] ?>">
                          <div class="input-group-append">
                            <div class="btn btn-primary" id="btn_miNumber" data-toggle="modal" data-target="#modalMasterItem" style="width: 80px;">View &nbsp;<i class="fa-solid fa-clipboard-list"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="masterCode">Master Code</label> <span id="validasi-mc"></span>
                        <div class="input-group">
                          <!-- <select id="masterCode" class="select2 form-control" name="masterCode" style="text-transform: uppercase; display: none;"> -->
                          </select>
                          <input id="masterCode" class="form-control" name="masterCode" style="text-transform: uppercase;" placeholder="INPUT MASTER CODE" value="<?= $miDetail['masterCode'] ?>">
                          <div class="input-group-append">
                            <div class="btn btn-primary" id="btn_masterCode" data-toggle="modal" data-target="#modalMasterCode" id="viewMasterCode" style="width: 80px;">View &nbsp;<i class="fa-solid fa-clipboard-list"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Master Code -->

                    <!-- Note -->
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label for="reason">Reason/ Note<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <textarea class="form-control" name="reason" id="reason" rows="4" style="height: 124px;" required></textarea>
                          <!-- <input type="text" style="height: 122px; " class="form-control" name="reason" id="reason" value="" required style="text-transform: uppercase;"> -->
                          <div class="invalid-feedback">
                            Please Fill In Required Field
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Note -->
                  </div>

                  <div class="row">
                    <div class="col-lg-2"></div>
                    <!-- Item Type -->
                    <div class="col-lg-4 col-md-6 col-sm-12">

                    </div>
                    <!-- Item Type -->

                    <!-- action -->
                    <div class="col-lg-4 col-md-6 col-sm-12">

                    </div>
                    <!-- action -->
                    <div class="col-lg-2"></div>
                    <div class="col-12 mx-auto-fit;" style="text-align: center">
                      <!-- Button Submit -->
                      <input type="hidden" name="request_miID" value="<?= $miDetail['request_miID'] ?>">

                      <div class="form-group" style="padding-top: 10px;" id="submit">
                        <button type="submit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Submit Action?')">Submit</button>

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


</div>
</section>
</form>
</div>

<!-- Modal for Data/list Master Item -->
<div id="modalMasterItem" class="modal">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Check Data Master Item</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <br>
            <div class="col-12">
              <!-- Table Master Item List -->
              <div class="table-responsive">
                <table id="dataMI" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">Code MI</th>
                      <th style="text-align: center; width:50%">Description</th>
                      <th style="text-align: center;"><i class="fa-solid fa-check"></i></th>
                    </tr>
                  </thead>
                  <tbody class="table-content">
                    <?php $i = 1;
                    foreach ($viewMasterItem as $row) :
                    ?>
                      <tr>
                        <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $row['miNumber']; ?></td>
                        <td style="text-align: left; vertical-align: middle;"><?= $row['miDescription']; ?></td>
                        <td style="text-align: center; vertical-align: middle;">
                          <button class="btn btn-primary" id="set" data-dismiss="modal">Select</button>
                        </td>
                      </tr>
                    <?php
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div>
              <!--/Table Master Item List -->
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
<!-- End Modal Master Item  -->

<!-- Modal for Data/list Master Code -->
<div id="modalMasterCode" class="modal">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Check Data Master Code</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <br>
            <div class="col-12">
              <!-- Table Master Item List -->
              <div class="table-responsive">
                <table id="dataMC" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">Master Code</th>
                      <th style="text-align: center; width:50%">Item Description</th>
                      <th style="text-align: center;"><i class="fa-solid fa-check"></i></th>
                    </tr>
                  </thead>
                  <tbody class="table-content">
                    <?php $i = 1;
                    foreach ($viewMasterCode as $row) :
                    ?>
                      <tr>
                        <td style="text-align: center; vertical-align: middle;"><?= $i++; ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $row['masterCode']; ?></td>
                        <td style="text-align: left; vertical-align: middle;"><?= $row['itemDescription']; ?></td>
                        <td style="text-align: center; vertical-align: middle;">
                          <button class="btn btn-primary" id="set" data-dismiss="modal">Select</button>
                        </td>
                      </tr>
                    <?php
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div>
              <!--/Table Master Item List -->
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
<!-- End Modal Master Code  -->

<!-- MODAL APPROVAL HISTORY -->
<div id="modalHistorymi" class="modal">
  <div class="modal-dialog modal-xl" ">
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
              <table id="table" class="table table-bordered table-striped table-hover" id="documentLocal[]" name="documentLocal[]" style="font-size: 80%; vertical-align: middle; width: 100%;">
                <thead>
                  <tr>
                    <th style="width: 5%; text-align: center; vertical-align: middle;">No</th>
                    <th style="width: 25%; text-align: center; vertical-align: middle;">User Name</th>
                    <th style="width: 20%; text-align: center; vertical-align: middle;">Date</th>
                    <th style="width: 10%; text-align: center; vertical-align: middle;">Action</th>
                    <th style="width: 40%; text-align: center; vertical-align: middle;">Reason</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($miHistory as $row) : ?>
                    <tr>
                      <!-- RUNNING NUMBER -->
                      <td style="text-align: center;vertical-align: middle;"><?= $i++ ?>. </td>
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
                      <td style="text-align: center;vertical-align: middle;"><?= $row->action; ?>
                      </td>
                      <!--/action -->

                      <!-- reason -->
                      <td style="vertical-align: middle;"><?= $row->reason; ?>
                      </td>
                      <!--/reason -->

                    </tr>
                  <?php
                  endforeach;

                  foreach ($miHistory_final as $row) : ?>
                    <tr>
                      <!-- RUNNING NUMBER -->
                      <td style="text-align: center;vertical-align: middle;"><?= $i++ ?>. </td>
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
                      <td style="text-align: center;vertical-align: middle;"><?= $row->action; ?>
                      </td>
                      <!--/action -->

                      <!-- reason -->
                      <td style="vertical-align: middle;"><?= $row->reason; ?>
                      </td>
                      <!--/reason -->
                    </tr>
                  <?php endforeach; ?>
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


<!-- :: Function For Component Select2-Search using AJAX :: -->
<!-- using source jquery and select componen (in here we import using cdn) -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.full.min.js" ></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js" defer></script> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" defer rel="stylesheet" /> -->


<!-- Select 2 Jquery & AJAX  -->
<script>
  // const actionMi = document.querySelector("#action_mi");
  // const formInputA = {
  // masterCode1: $("#masterCode1"),
  // btnView: $("#viewMasterCode"),
  // miNumber: $("#miNumber"),
  // };
  // const formInputB = {
  // itemType: $("#itemType"),
  // masterCode: $("#masterCode"),
  // miNumber: $("#miNumber2"),
  // masterCode1: $("#masterCode1"),
  // reason: $("#reason"),
  // };

  // $("#masterCode").html(`<input id="masterCode1" class="form-control" name="masterCode" style="text-transform: uppercase;" placeholder="INPUT NEW MASTER CODE">`);

  // function initializeSelect2() {
  //   $("#masterCode").select2({
  //     visibility: 'hide',
  //     theme: 'bootstrap4',
  //     ajax: {
  //       url: $("#action_mi").data("url"),
  //       dataType: 'json',
  //       q: (params) => {
  //         return {
  //           search: params.term,
  //         }
  //       },
  //       processResults: (data, params) => {
  //         const results = data.map(item => {
  //           return {
  //             id: item.masterCode,
  //             text: item.masterCode + "  [" + item.itemDescription + "] ",
  //             value: item.masterCode,
  //           };
  //         });
  //         return {
  //           results: results,
  //         }
  //       },
  //     },
  //   });
  // }

  // actionMi.addEventListener("change", () => {
  //   if (actionMi.value === "NEW MASTER ITEM") {
  //     Object.values(formInputA).forEach((input) => input.show());
  //     Object.values(formInputB).forEach((input) => input.hide());
  //     $('#submit').html(`<button type="submit" class="btn btn-secondary" disabled style="width: 150px;" onclick="return confirm('Submit Action?')">Submit</button>`);
  //     const $masterCode = $("#masterCode");

  //     $(function() {
  //       $masterCode.select2({
  //         minimumResultsForSearch: Infinity,
  //         dropdownCssClass: "hide",
  //       });
  //     });
  //   } else if (actionMi.value === "EXISTING DATA") {
  //     Object.values(formInputA).forEach((input) => input.hide());
  //     Object.values(formInputB).forEach((input) => input.show());
  //     $('#submit').html(`<button type="submit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Submit Action?')">Submit</button>`);
  //     const $masterCode = $("#masterCode");
  //     initializeSelect2();
  //   }
  // });
</script>

<!-- validasi & Check Code Master Item -->
<script>
  $('#submit').html('<button class="btn btn-secondary" style="width: 150px;" disabled>Submit</button>');

  function buildTableData() {
    let setMI = '';
    let setInput = document.querySelector('#miNumber');
    let buttonSet = document.querySelector('#set');
    let rows = document.querySelectorAll('#dataMI tbody tr');
    let data = Array.from(rows).map(function(tr) {
      return {
        no: tr.querySelectorAll('td:nth-child(1)')[0].textContent,
        setMiNumber: tr.querySelectorAll('td:nth-child(2)')[0].textContent,
        miDescription: tr.querySelectorAll('td:nth-child(3)')[0].textContent
      };
    });

    rows.forEach(function(tr) {
      tr.addEventListener('click', function() {
        setInput.value = tr.querySelectorAll('td:nth-child(2)')[0].textContent;
        $('#validasi-status').html('<span class="unavailable text-primary text-small"><strong> &nbsp; Code Already in Use </strong></span>');
      });
    });
    console.log(data);
  }
  buildTableData();

  $(document).ready(function() {
    $('#miNumber').on('input', function() {
      validateCodeMI();
    });
  });

  function validateCodeMI() {
    var miNumber = $('#miNumber').val();
    if (miNumber !== '') {
      $.ajax({
        url: '<?php echo $session_profile['session_address']; ?>Manage_Master_Item/validate_miNumber',
        type: 'POST',
        data: {
          miNumber: miNumber
        },
        success: function(response) {
          if (response === 'available') {
            $('#validasi-status').html('<span class="available text-success text-small"><strong> &nbsp; Code Available </strong></span>');
            // $('#submit').html(`<button type="submit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Submit Action?')">Submit</button>`);
          } else {
            $('#validasi-status').html('<span class="unavailable text-primary text-small"><strong> &nbsp; Code Already in Use </strong></span>');
            // $('#submit').html(`<button type="susbmit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Submit Action?')">Submit</button>`);
          }
        }
      });
    } else if (miNumber === '') {
      $('#validasi-status').html('');
      $('#submit').html('<button class="btn btn-secondary" style="width: 150px;" disabled>Submit</button>');
    }
  }
</script>

<!-- Validasi & Check Master Code -->
<script>
  $('#submit').html('<button class="btn btn-secondary" style="width: 150px;" disabled>Submit</button>');

  function buildTableData() {
    let setMC = '';
    let setInput = document.querySelector('#masterCode');
    let buttonSet = document.querySelector('#set');
    let rows = document.querySelectorAll('#dataMC tbody tr');
    let data = Array.from(rows).map(function(tr) {
      return {
        no: tr.querySelectorAll('td:nth-child(1)')[0].textContent,
        setMiNumber: tr.querySelectorAll('td:nth-child(2)')[0].textContent,
        miDescription: tr.querySelectorAll('td:nth-child(3)')[0].textContent
      };
    });

    rows.forEach(function(tr) {
      tr.addEventListener('click', function() {
        setInput.value = tr.querySelectorAll('td:nth-child(2)')[0].textContent;
        $('#validasi-mc').html('');
        var miNumber = $('#miNumber').val();
        if (miNumber) {
          $('#submit').html(`<button type="submit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Submit Action?')">Submit</button>`);
          // $('#validasi-mc').html('<span class="unavailable text-primary text-small"><strong> &nbsp; Code Already in Use </strong></span>');
        }
        // $('#validasi-mc').html('<span class="unavailable text-primary text-small"><strong> &nbsp; Code Already in Use </strong></span>');
      });
    });
    console.log(data);
  }
  buildTableData();

  $(document).ready(function() {
    $('#masterCode').on('input', function() {
      validateMasterCode();
    });
  });

  function validateMasterCode() {
    var masterCode = $('#masterCode').val();
    if (masterCode !== '') {
      $.ajax({
        url: '<?php echo $session_profile['session_address']; ?>Manage_Master_Item/validate_masterCode',
        type: 'POST',
        data: {
          masterCode: masterCode
        },
        success: function(response) {
          if (response === 'available') {
            $('#validasi-mc').html('<span class="available text-danger text-small"><strong> &nbsp; Data Not Found </strong> </span>');
            $('#submit').html('<button class="btn btn-secondary" style="width: 150px;" disabled>Submit</button>');
          } else {
            $('#validasi-mc').html('');
            var miNumber = $('#miNumber').val();
            if (miNumber) {
              $('#submit').html(`<button type="submit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Submit Action?')">Submit</button>`);
              // $('#validasi-mc').html('<span class="unavailable text-primary text-small"><strong> &nbsp; Code Already in Use </strong></span>');
            }
          }
        }
      });
    } else if (masterCode === '') {
      $('#validasi-mc').html('');
      $('#submit').html('<button class="btn btn-secondary" style="width: 150px;" disabled>Submit</button>');
    }
  }
</script>

<!-- Configuration Data Table -->
<script>
  $(function() {
    $("#dataMI").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "pageLength": 5
    }).buttons().container().appendTo('#dataMI_wrapper .col-md-6:eq(0)');

    $("#dataMC").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "pageLength": 5
    }).buttons().container().appendTo('#dataMC_wrapper .col-md-6:eq(0)');

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
    var rupiah = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0
    }).format(number_string);
    return rupiah;
  }
</script>

<script>
  var actionMi = document.querySelector("#action_mi");
  var masterCode = document.getElementById("masterCode");
  var miNumber = document.getElementById("miNumber");
  var btn_masterCode = document.getElementById("btn_masterCode");
  var btn_miNumber = document.getElementById("btn_miNumber");
  var itemType = document.getElementById("itemType");

  btn_miNumber.hidden = true;

  $(document).ready(function($) {
    if (miNumber.val && masterCode.val) {
      $('#submit').html('<button class="btn btn-secondary" style="width: 150px;" disabled>Submit</button>');
    } else {
      $('#submit').html(`<button type="submit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Submit Action?')">Submit</button>`);
    }
  });

  actionMi.addEventListener("change", () => {
    if (actionMi.value === "REJECT") {
      // miNumber.value = '';
      // masterCode.value = '';
      miNumber.disabled = true;
      masterCode.disabled = true;
      btn_miNumber.disabled = true;
      btn_masterCode.disabled = true;
      itemType.disabled = true;
      $('#validasi-status').html('');
      $('#validasi-mc').html('');
      $('#submit').html(`<button type="submit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Submit Action?')">Submit</button>`);
    } else if (actionMi.value === "NEW MASTER ITEM") {
      btn_miNumber.hidden = true;
      miNumber.value = '';
      $('#validasi-status').html('');
      $('#submit').html('<button class="btn btn-secondary" style="width: 150px;" disabled>Submit</button>');
    } else {
      btn_miNumber.hidden = false;
      // miNumber.value = '';
      miNumber.disabled = false;
      masterCode.disabled = false;
      btn_miNumber.disabled = false;
      btn_masterCode.disabled = false;
      itemType.disabled = false;
      $('#validasi-status').html('');
      $('#validasi-mc').html('');
      // $('#submit').html('<button class="btn btn-secondary" style="width: 150px;" disabled>Submit</button>');

    }
  });
</script>