<div class="side-bar1">
            <div class="widget search-widget">
                   <div class="widget-title">Search</div>
         <?php
           $attributes = array('class' =>'course-searchside','method'=>'post','autocomplete'=>'off','id'=>'deliverycheck');
                echo form_open("category/$segment2/$segment3",$attributes);
          ?>
                  <div class="row">
                      <div class="col-md-12">
                  <div class="form-group">
                 
                    <label>State</label>
                    <select class="form-control state select2" name="state" id="state" required="required">
                   <option value="All">Select State</option>
                    <?php
          $statedata=$this->customcode->getAllStateSearch();
           foreach($statedata as $staterow){ ?>
                    <option <?php if(isset($dtsearch['state']) && $dtsearch['state']  == $staterow->state_name){ ?> selected <?php } ?>value="<?php echo $staterow->state_name; ?>" <?php echo set_select('state',$staterow->state_name); ?>><?php echo $staterow->state_name; ?></option>
                    <?php } ?>
                   
                  </select>                  
                </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                 
                    <label>City</label>
                    <select class="form-control form-controlsearch city select2" name="city" id="city" tabindex="-1" required >
                  <option value="">Select City</option>
                </select>                  
                  </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                 <label>Course </label>
                 <select class="form-control form-controlsearch course_id select2" name="course_id" id="course_id" tabindex="-1" required>
                    <option value="">Select Course</option>
                  </select>
                <p class="errorhome"><?php echo form_error('course_id'); ?></p>
             </div>
             </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                           <button class="btn button-md" type="submit" name="submit">Search</button>
                        </div>
                    </div>
                  <?php echo form_close(); ?>  
                    
              </div>
              
            </div>
<script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2({
      closeOnSelect: true
    });
  });
</script>
<!-- <script type="text/javascript">
$(function() {
    $("#course").autocomplete({
        source: "<?php echo base_url(); ?>/check-course",
    select: function( event, ui ) {
            event.preventDefault();
      $("#course").val(ui.item.value);
      document.getElementById("course_id").value=ui.item.id; 
    }
    });
});
</script> -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#state').change(function() {

      var state_name = $('#state').val();
      if (state_name != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>check-city",
          method: "POST",
          data: {
            state_name: state_name
          },
          success: function(data) {

            $('#city').html(data);
          }
        });
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#city').change(function() {

      var city_name = $('#city').val();
      if (city_name != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>get-course",
          method: "POST",
          data: {
            city_name: city_name
          },
          success: function(data) {
            $('#course_id').html(data);
          }
        });
      }
    });
  });
</script>