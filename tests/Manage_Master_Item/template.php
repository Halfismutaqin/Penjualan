<?php $session_profile = session()->get(); ?>
<?php if ($message != "") {
  echo $message;
} else if ($message == "") {
} ?>

<!-- Site Wrapper -->
<form action="<?php echo site_url(); ?><?= $controllerName; ?>/<--FUNCTION_NAME-->" class="needs-validation" novalidate method="post" enctype="multipart/form-data" id="---PAGE_NAME---">
  <section class="pt-3 pb-3 pr-1 pl-1 shadow-lg">
    <div class="container-fluid">

      <div class="card">
        <!-- Card Header -->
        <div class="card-header">
          <div class="row">
            <!-- TITLE -->
            <div class="col-lg-10 col-md-10 col-sm-12" style="margin: auto;">
              <h1 class="card-title"><b><?= $pageTitle; ?></b></h1>
            </div>
            <!-- TITLE -->

            <!-- BACK BUTTON -->
            <div class="col-lg-2 col-md-2 col-sm-12" style="margin: auto;">
              <a href="<?php echo site_url(); ?><?= $controllerName; ?>/<?= $parentFunction; ?>" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-square-caret-left"></i> Back </a>
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
            <div class="card-body" style="font-size: 70%; height: 100%;">
              <div class="container">
                <div class="row">

                  <!-- BODY / CONTENT -->
                  <!-- BODY / CONTENT -->
                  <!-- BODY / CONTENT -->
                  <!-- BODY / CONTENT -->
                  <!-- BODY / CONTENT -->
                  <!-- BODY / CONTENT -->
                  <!-- BODY / CONTENT -->
                  <!-- BODY / CONTENT -->

                </div>
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

            <!-- Card Footer -->
            <div class="card-footer" style="font-size: 70%; height: 100%;">
              <div class="container">
                <div class="row">

                  <!-- FOOTER / CONTENT -->
                  <!-- FOOTER / CONTENT -->
                  <!-- FOOTER / CONTENT -->
                  <!-- FOOTER / CONTENT -->
                  <!-- FOOTER / CONTENT -->
                  <!-- FOOTER / CONTENT -->
                  <!-- FOOTER / CONTENT -->

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

<!-- /.Site Wrapper -->