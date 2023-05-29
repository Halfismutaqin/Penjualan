<?php $session_profile = session()->get(); ?>
<!-- Site Wrapper -->
<div class="content-wrapper">
  <?php if ($message != "") {
    echo $message;
  } else if ($message == "") {
  }

  if ($_GET['code'] !== "") {
    $id_page = $_GET['code'];
    if ($id_page == 1) {
      $back = $session_profile['session_address'] . "manageMasterItem_list";
    } else {
      $back = $session_profile['session_address'] . "manage_add_MI";
    }
  } else {
    // default value for $back
    $back = $session_profile['session_address'] . "manage_add_MI";
    // or display error message
    // echo "Invalid URL";
  }
  ?>


  <form action="<?php echo $session_profile['session_address']; ?>finalizeMI/<?= $miDetail->r_miID; ?>" class="needs-validation" novalidate method="post" enctype="multipart/form-data" id="newMasterItemDetails_page">
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalHistorymi" style="width: 100%;"><i class="fa-solid fa-list"> </i> History </a>
              </div>
              <!--/APPROVAL HISTORY -->

              <!-- BACK BUTTON -->
              <div class="col-lg-2 col-md-2 col-sm-12" style="margin: auto;">
                <a href="<?= $back ?>" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-square-caret-left"></i> Back </a>
              </div>
              <!--/BACK BUTTON -->

            </div>
          </div>
          <!--/.Card Header -->
        </div>

        <?php
        // :: Get detail master item and convert in string in array ::
        $data = get_object_vars($miDetail);
        // dd($data);
        ?>

        <!-- ROW 1 -->
        <div class="row">
          <div class="col-lg-12 mb-0 align-items-stretch">
            <div class="card">
              <div class="card-success">
                <div class="card-header card-header-custom">
                  <h1 class="card-title">Request New Master Item Information</h1>
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
                          <input type="text" class="form-control" name="miCode" id="miCode" style="text-transform: uppercase;" value="<?= $miDetail->miCode; ?>" required readonly>
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
                          <input type="text" class="form-control" name="requester" id="requester" style="text-transform: uppercase;" value="<?= $miDetail->requester; ?>" required readonly>
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
                          <input type="text" class="form-control" name="departement" id="departement" style="text-transform: uppercase;" value="<?= $miDetail->requesterDepartement; ?>" required readonly>
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
                          <input type="text" class="form-control" name="site" id="site" style="text-transform: uppercase;" value="<?= $miDetail->requesterSite; ?>" required readonly>
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
                          <input type="text" class="form-control" name="miType" id="miType" style="text-transform: uppercase;" value="<?= $miDetail->type; ?>" required readonly>
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
                          <input type="text" class="form-control" name="itemDesc" id="itemDesc" style="text-transform: uppercase;" value="<?= $data['itemDesc'] ?>" required readonly>

                        </div>
                      </div>
                    </div>
                    <!-- Item Desc -->

                    <!-- For Next... -->
                    <!-- New Item Desc -->
                    <?php
                    if ($data['miDescription'] == "") {
                      $newDescription = "";
                    } else {
                      $newDescription = $data['miDescription'];
                      echo '<div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="new_itemDesc"> New Master Item Description </label> <label class="small"><a style="color:red;">(Optional)</a></label>
                              <input type="text" class="form-control" name="new_itemDesc" id="new_itemDesc" style="text-transform: uppercase;"  value="' . $newDescription . '" readonly>
                            </div>
                          </div>
                          ';
                    }
                    ?>
                    <!-- New Item Desc -->

                    <!-- UOM -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="uom">UOM<a style="color:red;">*</a></label>
                        <select class="form-control select2" name="uom" id="uom" readonly required>
                          <option selected value="<?= $data['uom'] ?>"><?= $data['uom'] ?></option>
                          <?php foreach ($comboUom as $option) { ?>
                            <option disabled value="<?php echo $option['uom']; ?>"><?php echo $option['uom'] . " - " . $option['uomDescription']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- UOM -->

                    <!-- Price -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <?php
                      $convert_price = "Rp " . number_format($data['price'], 0, ',', '.');
                      ?>
                      <div class="form-group">
                        <label for="price">Price<a style="color:red;">*</a></label>
                        <input class="form-control" name="price" id="price" value="<?= $convert_price ?>" readonly required>
                      </div>
                    </div>
                    <!-- Price -->


                    <!-- Categori -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="category">Request Category<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <select name="category" id="category" class="form-control" readonly required>
                            <option selected value="<?= $data['category'] ?>"><?= $data['category'] ?></option>
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
                          <select name="sub_category1" id="sub_category1" class="form-control primary" readonly required>
                            <option selected value="<?= $data['sub_category1'] ?>"><?= $data['sub_category1'] ?></option>

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
                          <select name="sub_category2" id="sub_category2" class="form-control" readonly required>
                            <option selected value="<?= $data['sub_category2'] ?>"><?= $data['sub_category2'] ?></option>
                          </select>

                        </div>
                      </div>
                    </div>
                    <!-- Sub Category -->
                    <!-- Sub Inventory / Warehouse -->
                    <?php
                    if ((($data['type']) == "INVENTORY SPAREPART") or (($data['type']) == "INVENTORY GA")) { ?>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="subInventory">Sub Inventory/ Warehouse<a style="color:red;">*</a></label>
                          <div class="input-group has-validation">
                            <select name="subInventory" id="subInventory" class="form-control" required readonly>
                              <option selected value="<?= $data['subInventoryID'] ?>"> <?= $data['idWarehouse'] . " - " . $data['descWarehouse'] ?> </option>
                              <?php foreach ($comboSubInventory as $option) { ?>
                                <option disabled value="<?php echo $option['subInventoryID']; ?>"><?php echo $option['idWarehouse'] . " - " . $option['descWarehouse']; ?></option>
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
                    if (($data['type']) !== "INVENTORY SPAREPART") {
                    ?>

                      <!-- Kode Item -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="specialCode">No Catalog/ No SOP/ Code Special..</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="specialCode" id="specialCode" style="text-transform: uppercase;" value="<?= $data['noCatalog_Sop_Code'] ?>" readonly>
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
                    if (($data['type']) == "INVENTORY SPAREPART") { ?>
                      <!-- FIELD TAMBAHAN INVENTORY SPAREPART  -->
                      <!-- Manufacturer -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="manufacturer">Manufacturer</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="manufacturer" id="manufacturer" style="text-transform: uppercase;" value="<?= $data['manufacturer'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- Manufacturer -->

                      <!-- Machine Name -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="machineName">Machine Name</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="machineName" id="machineName" style="text-transform: uppercase;" value="<?= $data['machineName'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- Machine Name -->

                      <!-- Part Number -->
                      <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="partNumber">Part Number</label>
                          <div class="input-group has-validation">
                            <input type="text" class="form-control" name="partNumber" id="partNumber" style="text-transform: uppercase;" value="<?= $data['partNumber'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- Part Number -->
                    <?php
                    }
                    ?>
                    <!-- Stock Minimum -->
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="stockMin">Stock Minimum</label>
                        <div class="input-group has-validation">
                          <input type="number" class="form-control" name="stockMin" id="stockMin" style="text-transform: uppercase;" value="<?= $data['stockMin'] ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <!-- Stock Minimum -->

                    <!-- Stock Maximum -->
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="stockMax">Stock Maximum</label>
                        <div class="input-group has-validation">
                          <input type="number" class="form-control" name="stockMax" id="stockMax" style="text-transform: uppercase;" value="<?= $data['stockMax'] ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <!-- Stock Maximum -->

                    <!-- Lead Time -->
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="leadTime">Lead Time</label>
                        <div class="input-group has-validation">
                          <input type="number" class="form-control" name="leadTime" id="leadTime" style="text-transform: uppercase;" value="<?= $data['leadTime'] ?>" readonly>
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
              <div class="card-body card-body-custom" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">

                    <div class="col-12">
                      <table id="example2" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-title">
                          <tr>
                            <th class="text-center" style="width: 5%;">No</th>
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

        <?php
        foreach ($miHistory_final as $row) {
          $note = $row->note;
          if ($note == "NEW MASTER ITEM") {
            $color = "success";
          }elseif ($note == ""){
            $note = "NEED APPROVAL";
            $color = "primary";
          } 
          else {
            $color = "primary";
          }
        }
        $lock = "";

        if ($miDetail->status_request == 'INPROCESS') {
          // dd($$miDetail->status_request);
          $lock = "";
          $btn = "success";
        } else {
          $lock = "readonly";
          $btn = "primary";
        }
        ?>
        <!-- ROW 2 -->
        <div class="row">
          <div class="col-lg-12 mb-3 align-items-stretch">
            <div class="card">

              <!-- Card Footer -->
              <div class="card-footer" style="height: 100%;">
                <div class="container-fluid">
                  <div class="row">

                    <!-- Master Item Code -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="miNumber">Code Master Item </label>
                        <input class="form-control" name="miNumber" id="miNumber" style="text-transform: uppercase;" value="<?= $data['miNumber'] ?>" <?= $lock ?> <?= $lock_miNumber ?>>
                      </div>
                      <div class="form-group ">
                        <!-- Master Code -->
                        <label for="masterCode">Master Code</label>
                        <div class="input-group">
                          <input class="form-control" name="masterCode" id="masterCode" style="text-transform: uppercase;" value="<?= $data['masterCode'] ?>" <?= $lock ?> <?= $lock_masterCode ?>>
                        </div>
                        <!-- Master Code -->
                      </div>
                    </div>
                    <!-- Master Item Code -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="reason">Last Reason: </label>
                        <input class="form-control text-<?= $color ?>" value="<?= $note ?>" readonly> </span>

                      </div>
                      <div class="form-group">
                        <label for="action">Action?<a style="color:red;">*</a> </label>
                        <div class="input-group has-validation">
                          <select class="form-control" name="action" id="action" required <?= $lock_action ?>>
                            <option value="CLOSED">CLOSED</option>
                            <option value="REJECT">REJECT</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <!-- Note -->
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label for="reason">Reason/ Note<a style="color:red;">*</a></label>
                        <div class="input-group has-validation">
                          <textarea name="reason" id="reason" class="form-control" rows="4" style="height: 124px;" <?= $lock_note ?>></textarea>
                          <!-- <input type="text" class="form-control" name="reason" id="reason" value=""   required style="text-transform: uppercase;"> -->
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
                      <div class="form-group" style="padding-top: 10px;">
                        <button type="submit" <?= $btn_hidden ?> class="btn btn-<?= $btn ?>" style="width: 150px;" onclick="return confirm('Submit Action?')" <?= $lock_button ?>>Submit</button>

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

<!-- MODAL APPROVAL HISTORY -->
<!-- The Modal -->
<div id="modalHistorymi" class="modal">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <!-- Modal content -->
    <div class=" modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>History</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 400px;">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <table id="example3" class="table table-bordered table-striped table-hover" id="documentLocal[]" name="documentLocal[]" style="vertical-align: middle; width: 100%;">
                <thead class="table-title">
                  <tr>
                    <th style="width: 5%; text-align: center; vertical-align: middle;">No</th>
                    <th style="width: 25%; text-align: center; vertical-align: middle;">User Name</th>
                    <th style="width: 20%; text-align: center; vertical-align: middle;">Date</th>
                    <th style="width: 10%; text-align: center; vertical-align: middle;">Action</th>
                    <th style="width: 40%; text-align: center; vertical-align: middle;">Reason/ Note</th>
                  </tr>
                </thead>
                <tbody class="table-content">
                  <?php $i = 1;
                  foreach ($miHistory as $row) { ?>
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
                      $date = date('d M Y / H:i:s', strtotime($row->approveDate));
                      // $date = date_format($timeStamp, $dateFormat);
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
                      <?php
                      $note = $row->note;
                      if (empty($note)) {
                        $note = "";
                      } else {
                        $note = "<span class='text-primary'>  [" . $row->note . "] </span>";
                      }
                      ?>
                      <td style="vertical-align: middle;"><?= $row->reason . $note ?>
                      </td>
                      <!--/reason -->

                    </tr>
                  <?php $i++;
                  }
                  foreach ($miHistory_final as $row) { ?>
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
                      $date = date('d M Y / H:i:s', strtotime($row->approveDate));
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
                      <?php
                      $note = $row->note;
                      if (empty($note)) {
                        $note = "";
                      } else {
                        $note = "<span class='text-primary'>  [" . $row->note . "] </span>";
                      }
                      ?>
                      <td style="vertical-align: middle;"><?= $row->reason . $note ?>
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
      "table-layout": fixed
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