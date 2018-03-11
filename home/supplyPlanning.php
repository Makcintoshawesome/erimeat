<?php
$jfList = job_function()->filter("isDeleted='0'");
$ptList = position_type()->all();
?>

<div class="m-b-30" style="position:relative;">
  <img src="../include/assets/images/teamire-aboutus-img.png" style="width: 100%;">
  <div class="homepage-top-text text-center m-t-50 container-fluid">
    <h2 class="text-white">Supply Planning</h2>
  </div>
</div>
<div class="container-fluid m-b-30">

  <!-- Start About Us Content -->
  <div class="center-page container-80">

    <h3 class="text-center m-b-30">Simplify your search for top supply planning talent</h3>
    <p class="text-center m-b-30" style="font-size: 17px;">
      Involve with determining how best to fulfill the requirements created from the Demand Plan.
      Our objective is to balance supply and demand in a manner that we achieve the financial and
      service objectives of the enterprise.
    </p>

    <div class="form-container m-b-30 m-t-30">
      <div class="row">
        <form action="process.php?action=create" method="POST" id="default-wizard" data-parsley-validate="">
        <div class="col-sm-8 center-page">
              <div class="form-group">
                  <label for="firstname">Job Category <span style="color: red;">*</span></label>
                  <select class="form-control" name="jobFunctionId" required="">
                   <option>Please Select</option>
                    <?php
                      foreach($jfList as $row) {
                    ?>
                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                    <?php } ?>
                  </select>
              </div>

              <div id="hire" class="display-none">
              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Employment Type <span style="color: red;">*</span></label>
                  <select class="form-control" name="positionTypeId" required="">
                  <option>Please Select</option>
                    <?php foreach($ptList as $row) {?>
                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                    <?php } ?>
                  </select>
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Job Classification <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" name="position" required="">
              </div>
              </div>

              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Company Representative <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" name="contactName" required="">
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Company Representative Email <span style="color: red;">*</span></label>
                  <input type="email" class="form-control" name="workEmail" data-parsley-trigger="change" required="">
              </div>
              </div>

              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Company Name <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" name="company" required="" >
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Company ABN <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" data-mask="99999999999" name="abn" required="">
              </div>
              </div>

              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Job Position <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" name="jobTitle" required="">
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Business Phone <span style="color: red;">*</span></label>
                  <input type="text" placeholder="" data-mask="(+61) 999-999-999" class="form-control" name="businessPhone" required="">
              </div>
              </div>

              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Postal Code <span style="color: red;">*</span></label>
                  <input type="text" placeholder="" data-mask="9999" class="form-control" name="zipCode" required="">
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <label for="username">Required Experience <span style="color: red;">*</span></label>
                  <select class="form-control" name="requiredExperience" required="">
                    <option>Please Select</option>
                    <option value="0-1 Year">0-1 Year</option>
                    <option value="1-3 Years">1-3 Years</option>
                    <option value="3-5 Years">3-5 Years</option>
                    <option value="5-7 Years">5-7 Years</option>
                    <option value="7-10 Years">7-10 Years</option>
                    <option value="10+ Years Years">10+ Years</option>
                  </select>
              </div>
              </div>

              <div class="form-group">
                  <label for="username">Company Address <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" name="address" required="">
              </div>

              <div class="form-group">
                  <label for="username">Tell us your hiring needs</label>

                    <textarea id="message" class="form-control" name="comment"
                                      data-parsley-trigger="keyup" data-parsley-minlength="20"
                                      data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                      data-parsley-validation-threshold="10"></textarea>
              </div>
            <div class="text-center m-t-30">
                <button type="submit" class="btn btn-primary stepy-finish"> SEND REQUEST </button>
            </div>
            <div class="text-center m-t-30">
              <p style="color: #000000;">Or call us at <strong style="color: #4489e4;">+61452 364 793</strong></p>
            </div>
          </form>
        </div>
        <div class="text-center m-t-30">
          <button type="button" id="requestBtn" class="btn btn-primary stepy-finish">REQUEST TALENT</button>
        </div>
        </div>
      </div>
    </div>
</div>
      <div class="row form-container container-80 center-page">
          <div class="col-md-12 center-page">
              <div class="input-group m-t-5">
                <form method="GET">
                  <input type="hidden" name="view" value="jobList">
                  <input type="text" id="" name="s" class="form-control" style="width:700px; height:67px;" placeholder="Job Title, Skills or Keyword">
                  <span class="input-group-btn">
                      <button type="submit" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search m-r-5"></i> Search Jobs</button>
                  </span>
                </form>
              </div>
          </div>
      </div>
</div>
