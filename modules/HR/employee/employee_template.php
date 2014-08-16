<div id="all_contents">
 <div id="content_left"></div>
 <div id="content_right">
  <div id="content_right_left">
   <div id="content_top"></div>
   <div id="content">
    <div id="structure">
     <div id="hr_employee_divId">
      <div id="form_top">
      </div>
      <!--    START OF FORM HEADER-->
      <div class="error"></div><div id="loading"></div>
      <div class="show_loading_small"></div>
      <?php
       echo (!empty($show_message)) ? $show_message : "";
       $f = new inoform();
      ?> 
      <!--    End of place for showing error messages-->
      <div id ="form_header">
       <form action=""  method="post" id="hr_employee"  name="hr_employee"><span class="heading">Employee Header </span>
        <div id ="form_header">
         <div id="tabsHeader">
          <ul class="tabMain">
           <li><a href="#tabsHeader-1">Basic Info</a></li>
           <li><a href="#tabsHeader-2">Personal</a></li>
           <li><a href="#tabsHeader-3">Contact</a></li>
           <li><a href="#tabsHeader-4">Attachments</a></li>
           <li><a href="#tabsHeader-5">Notes</a></li>
          </ul>
          <div class="tabContainer"> 
           <div id="tabsHeader-1" class="tabContent">
            <div class="large_shadow_box"> 
             <ul class="column five_column"> 
              <li> 
               <label><img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="hr_employee_id select_popup clickable">
                Employee Id : </label><?php $f->text_field_ds('hr_employee_id') ?>
               <a name="show" href="form.php?class_name=hr_employee" class="show hr_employee_id">	<img src="<?php echo HOME_URL; ?>themes/images/refresh.png" class="clickable"></a> 
              </li>
              <li><label>First Name :</label><?php $f->text_field_d('first_name'); ?> 					</li>
              <li><label>Last Name :</label><?php $f->text_field_d('last_name'); ?> 					</li>
              <li><label>Title :</label><?php $f->text_field_d('title'); ?> 					</li>
              <li><label>Gender :</label>
               <?php echo $f->select_field_from_object('gender', hr_employee::gender(), 'option_line_code', 'option_line_value', $$class->gender, '', 'gender', '', $readonly); ?>              </li>
              <li><label>Person Type :</label>
               <?php echo $f->select_field_from_object('person_type', hr_employee::person_type(), 'option_line_code', 'option_line_value', $$class->person_type, '', 'person_type', '', $readonly); ?>              </li>
              <li><label>Identification Type :</label>
               <?php echo $f->select_field_from_object('identification_type', hr_employee::identification_type(), 'option_line_code', 'option_line_value', $$class->identification_type, '', 'identification_type', '', $readonly); ?>              </li>
              <li><label>Identification No :</label><?php $f->text_field_d('identification_id'); ?> 					</li>
              <li><label>Citizen No :</label><?php $f->text_field_d('citizen_number'); ?> 					</li>
              <li><label>ORG Name : </label>
               <?php echo $f->select_field_from_object('org_id', org::find_all_enterprise(), 'org_id', 'org', $$class->org_id, 'org_id', '', 1, $readonly); ?>
              </li>
              <li><label>Ledger Name : </label>
               <?php echo form::select_field_from_object('ledger_id', gl_ledger::find_all(), 'gl_ledger_id', 'ledger', $$class->ledger_id, 'ledger_id', $readonly, '', '', 1); ?>
              </li>
              <li><label>Status : </label><?php echo form::status_field($$class->status, $readonly); ?></li>
             </ul>
            </div>
           </div>
           <div id="tabsHeader-2" class="tabContent">
            <div class="large_shadow_box"> 
             <ul class="column five_column"> 
              <li><label>DOB :</label><?php echo $f->date_fieldAnyDay('date_of_birth', $$class->date_of_birth); ?> </li>
              <li><label>Country Of Birth :</label>
               <?php echo $f->select_field_from_object('country_of_birth', mdm_tax_region::country(), 'option_line_code', 'option_line_value', $$class->country_of_birth, '', 'country_code', '', $readonly); ?>              </li>
              <li><label>City Of Birth :</label><?php $f->text_field_d('city_of_birth'); ?> 					</li>
              <li><label>Nationality :</label><?php $f->text_field_d('nationality'); ?> 					</li>
              <li><label>Disability Code :</label><?php $f->text_field_d('disability_code'); ?> 					</li>
              <li><label>Marital Status :</label>
               <?php echo $f->select_field_from_object('marital_status', hr_employee::marital_status(), 'option_line_code', 'option_line_value', $$class->marital_status, '', 'marital_status', '', $readonly); ?>              </li>
              <li><label>No Of Children :</label><?php $f->text_field_d('no_of_children'); ?> 					</li>
              <li><label>Passport No :</label><?php $f->text_field_d('passport_number'); ?> 					</li>
             </ul>
            </div>
           </div>
           <div id="tabsHeader-3" class="tabContent">
            <div class="large_shadow_box"> 
             <ul class="column five_column"> 
              <li><label>Home Phone :</label><?php echo $f->text_field_d('home_phone_number'); ?> </li>
              <li><label>Off. Phone :</label><?php echo $f->text_field_d('phone'); ?> </li>
              <li><label>Mobile :</label><?php echo $f->text_field_d('mobile_number'); ?> </li>
              <li><label>Email :</label><?php echo $f->text_field_d('email'); ?> </li>
              <li><label>Personal email :</label><?php $f->text_field_d('other_email'); ?> 			
              <li><label>Home Address :</label><?php $f->text_field_dl('home_address'); ?> 					</li>
              <li><label>Permanent Address :</label><?php $f->text_field_dl('permanent_address'); ?> 					</li>
              <li><label>Location :</label><?php $f->text_field_d('location_id'); ?> 					</li>
             </ul>
            </div>
           </div>
           <div id="tabsHeader-4" class="tabContent">
            <div> <?php echo ino_attachement($file) ?> </div>
           </div>
           <div id="tabsHeader-5" class="tabContent">
            <div> 
             <div id="comments">
              <div id="comment_list">
               <?php echo!(empty($comments)) ? $comments : ""; ?>
              </div>
              <div id ="display_comment_form">
               <?php
                $reference_table = 'hr_employee';
                $reference_id = $$class->hr_employee_id;
               ?>
              </div>
              <div id="new_comment">
              </div>
             </div>
            </div>
           </div>
          </div>

         </div>
        </div>
        <div id ="form_line" class="form_line"><span class="heading">Employee Details </span>
         <div id="tabsLine">
          <ul class="tabMain">
           <li><a href="#tabsLine-1">Assignments</a></li>
           <li><a href="#tabsLine-2">Financial Info</a></li>
           <li><a href="#tabsLine-3">Education</a></li>
           <li><a href="#tabsLine-4">Work Experience</a></li>
           <li><a href="#tabsLine-5">On Boarding</a></li>
           <li><a href="#tabsLine-6">Exit</a></li>
           <li><a href="#tabsLine-7">Job History</a></li>
          </ul>
          <div class="tabContainer"> 
           <div id="tabsLine-1" class="tabContent">
            <div> 
             <ul class="column four_column"> 
              <li><label>Job :</label>
               <?php echo $f->select_field_from_object('job_id', hr_job::find_all(), 'hr_job_id', 'job_name', $$class->job_id, 'job_id'); ?> 					</li>
              <li><label>Position :</label>
               <?php echo $f->select_field_from_object('position_id', hr_position::find_all(), 'hr_position_id', 'position_name', $$class->position_id, 'position_id'); ?>  </li>

              <li><label>Payroll :</label><?php $f->text_field_d('payroll_id'); ?> 					</li>
              <li><label>Supervisor :</label><?php $f->text_field_d('supervisor_employee_id'); ?> 					</li>
             </ul> 
            </div> 
           </div> 
           <div id="tabsLine-2"  class="tabContent">
            <div> 
             <ul class="column four_column"> 
              <li><label>Tax Reg# :</label><?php $f->text_field_d('tax_reg_number'); ?> 					</li>
              <li><label>Bank Account :</label><?php $f->text_field_d('bank_account_id'); ?> 					</li>
              <li><label>Expense Ac :</label><?php echo $f->ac_field_d('expense_ac_id'); ?> 					</li>
             </ul> 
            </div> 
           </div>
           <div id="tabsLine-3"  class="tabContent">
            <div class="tabsDetail">
             <ul class="tabMain">
              <li><a href="#tabsLine-11">Basic </a></li>
              <li><a href="#tabsLine-12">Details </a></li>
             </ul>
             <div class="tabContainer"> 
              <div id="tabsLine-11" class="tabContent">
               <table class="form_table">
                <thead> 
                 <tr>
                  <th>Action</th>
                  <th>Seq#</th>
                  <th>Line Id</th>
                  <th>Degree Name</th>
                  <th>University</th>
                  <th>Start Date </th>
                  <th>End Date</th>
                  <th>Mode</th>
                  <th>Percentage</th>
                  <th>Grade</th>
                 </tr>
                </thead>
                <tbody class="form_data_line_tbody employee_education_values" >
                 <?php
                  $count = 0;
                  $employee_education_object1 = hr_employee_education::find_by_employeeId($$class->hr_employee_id);
                  $employee_education_object = empty($employee_education_object1) ? array(new hr_employee_education()) : $employee_education_object1;
                  foreach ($employee_education_object as $hr_employee_education) {
                   ?>         
                   <tr class="employee_education_line<?php echo $count ?>">
                    <td>    
                     <ul class="inline_action">
                      <li class="add_row_img"><img  src="<?php echo HOME_URL; ?>themes/images/add.png"  alt="add new line" /></li>
                      <li class="remove_row_img"><img src="<?php echo HOME_URL; ?>themes/images/remove.png" alt="remove this line" /> </li>
                      <li><input type="checkbox" name="line_id_cb" value="<?php echo htmlentities($$class_second->hr_employee_education_id); ?>"></li> 
                      <li><?php echo $f->hidden_field('education_line_id_cb', ''); ?>
                       <?php echo form::hidden_field('employee_id', $$class->hr_employee_id); ?></li>

                     </ul>
                    </td>
                    <td><?php $f->seq_field_d($count) ?></td>
                    <td><?php $f->text_field_wid2sr('hr_employee_education_id') ?></td>
                    <td><?php $f->text_field_wid2m('degree_name'); ?></td>
                    <td><?php $f->text_field_wid2m('university'); ?></td>
                    <td><?php echo $f->date_fieldAnyDay('edu_start_date', $$class_second->edu_start_date); ?></td>
                    <td><?php echo $f->date_fieldAnyDay('edu_end_date', $$class_second->edu_end_date); ?></td>
                    <td><?php $f->text_field_wid2('mode_of_education'); ?></td>
                    <td><?php $f->text_field_wid2s('marks_percentage'); ?></td>
                    <td><?php $f->text_field_wid2s('grade'); ?></td>
                   </tr>
                   <?php
                   $count = $count + 1;
                  }
                 ?>
                </tbody>
               </table>
              </div>
              <div id="tabsLine-12" class="tabContent">
               <table class="form_table">
                <thead> 
                 <tr>
                  <th>Seq#</th>
                  <th>Specialization</th>
                  <th>University Address</th>
                  <th>Notes</th>
                 </tr>
                </thead>
                <tbody class="form_data_line_tbody employee_education_values" >
                 <?php
                  $count = 0;
                  foreach ($employee_education_object as $employee_education) {
                   ?>         
                   <tr class="employee_education_line<?php echo $count ?>">
                    <td><?php $f->seq_field_d($count) ?></td>
                    <td><?php $f->text_field_wid2('specialization'); ?></td>
                    <td><?php $f->text_field_wid2l('university_address'); ?></td>
                    <td><?php
                     echo $f->text_area_ap(array('name' => 'comments', 'value' => $$class_second->comments,
                      'row_size' => '1', 'column_size' => '60'));
                     ?> 	
                    </td> 
                   </tr>
                   <?php
                   $count = $count + 1;
                  }
                 ?>
                </tbody>
               </table>
              </div>
             </div>
            </div>
           </div>
           <div id="tabsLine-4"  class="tabContent">
            <div class="tabsDetail">
             <ul class="tabMain">
              <li><a href="#tabsLine-21">Basic </a></li>
              <li><a href="#tabsLine-22">Details </a></li>
             </ul>
             <div class="tabContainer"> 
              <div id="tabsLine-21" class="tabContent">
               <table class="form_table">
                <thead> 
                 <tr>
                  <th>Action</th>
                  <th>Seq#</th>
                  <th>Line Id</th>
                  <th>Organization Name</th>
                  <th>Designation</th>
                  <th>Start Date </th>
                  <th>End Date</th>
                  <th>Employee#</th>
                  <th>Department</th>
                  <th>Last Manager</th>
                 </tr>
                </thead>
                <tbody class="form_data_line_tbody2 employee_experience_values" >
                 <?php
                  $count = 0;
                  $employee_experience_object1 = hr_employee_experience::find_by_employeeId($$class->hr_employee_id);
                  $employee_experience_object = empty($employee_experience_object1) ? array(new hr_employee_experience()) : $employee_experience_object1;
                  foreach ($employee_experience_object as $hr_employee_experience) {
                   ?>         
                   <tr class="employee_experience_line<?php echo $count ?>">
                    <td>    
                     <ul class="inline_action">
                      <li class="add_row_img"><img  src="<?php echo HOME_URL; ?>themes/images/add.png"  alt="add new line" /></li>
                      <li class="remove_row_img"><img src="<?php echo HOME_URL; ?>themes/images/remove.png" alt="remove this line" /> </li>
                      <li><input type="checkbox" name="line_id_cb" value="<?php echo htmlentities($$class_third->hr_employee_experience_id); ?>"></li> 
                      <li><?php echo $f->hidden_field('experience_line_id_cb', ''); ?>
                       <?php echo form::hidden_field('employee_id', $$class->hr_employee_id); ?></li>

                     </ul>
                    </td>
                    <td><?php $f->seq_field_d($count) ?></td>
                    <td><?php $f->text_field_wid3sr('hr_employee_experience_id') ?></td>
                    <td><?php $f->text_field_wid3m('organization_name'); ?></td>
                    <td><?php $f->text_field_wid3m('designation'); ?></td>
                    <td><?php echo $f->date_fieldAnyDay('work_start_date', $$class_third->work_start_date); ?></td>
                    <td><?php echo $f->date_fieldAnyDay('work_end_date', $$class_third->work_end_date); ?></td>
                    <td><?php $f->text_field_wid3('employee_number'); ?></td>
                    <td><?php $f->text_field_wid3s('department'); ?></td>
                    <td><?php $f->text_field_wid3('last_manager'); ?></td>
                   </tr>
                   <?php
                   $count = $count + 1;
                  }
                 ?>
                </tbody>
               </table>
              </div>
              <div id="tabsLine-22" class="tabContent">
               <table class="form_table">
                <thead> 
                 <tr>
                  <th>Seq#</th>
                  <th>Last Salary</th>
                  <th>Communication Details</th>
                  <th>Projects</th>
                 </tr>
                </thead>
                <tbody class="form_data_line_tbody2 employee_experience_values" >
                 <?php
                  $count = 0;
                  foreach ($employee_experience_object as $employee_experience) {
                   ?>         
                   <tr class="employee_experience_line<?php echo $count ?>">
                    <td><?php $f->seq_field_d($count) ?></td>
                    <td><?php $f->text_field_wid3('last_drawn_salary'); ?></td>
                    <td><?php echo $f->text_area_ap(array('name' => 'communication_details', 'value' => $$class_third->communication_details, 'row_size' => '1', 'column_size' => '40')); ?> 	
                    </td>
                    <td><?php echo $f->text_area_ap(array('name' => 'project_details', 'value' => $$class_third->project_details, 'row_size' => '1', 'column_size' => '40')); ?> 	
                    </td> 
                   </tr>
                   <?php
                   $count = $count + 1;
                  }
                 ?>
                </tbody>
               </table>
              </div>
             </div>
            </div>
           </div>
           <div id="tabsLine-5"  class="tabContent">
            <div> 
             <ul class="column four_column"> 
              <li><label>Probation Period UOM :</label><?php $f->text_field_d('probation_period_uom'); ?> 					</li>
              <li><label>Probation Period :</label><?php $f->text_field_d('probation_period'); ?> 					</li>
              <li><label>Notice Period UOM :</label><?php echo $f->text_field_d('notice_period_uom'); ?> 					</li>
              <li><label>Notice Period :</label><?php echo $f->text_field_d('notice_period'); ?> 					</li>
              <li><label>Vehicle Number :</label><?php echo $f->text_field_d('vehicle_number'); ?> 					</li>
              <li><label>Asset Number :</label><?php echo $f->text_field_dl('asset_numbers'); ?> 					</li>
             </ul> 
            </div> 
           </div>
           <div id="tabsLine-6"  class="tabContent">
            <div> 
             <ul class="column four_column"> 
              <li><label>Date of Notification :</label><?php echo $f->date_fieldAnyDay('date_of_notification', $$class_fourth->date_of_notification); ?> 					</li>
              <li><label>Reason :</label><?php echo $f->text_field('reason', $$class_fourth->reason); ?> 					</li>
              <li><label>Projected Last Date :</label><?php echo $f->date_fieldAnyDay('projected_last_date', $$class_fourth->projected_last_date); ?> 					</li>
              <li><label>Actual Last Date :</label><?php echo $f->date_fieldAnyDay('actual_last_date', $$class_fourth->actual_last_date); ?> 	
              <li><label>Accepted Date :</label><?php echo $f->date_fieldAnyDay('accpeted_date', $$class_fourth->accpeted_date); ?> 	
              <li><label>Accepted By :</label><?php echo  $f->text_field('accpeted_by_employee_id', $$class_fourth->accpeted_by_employee_id); ?> 	
             </ul> 
            </div> 
           </div>
          </div>
         </div> 
        </div> 
       </form>
      </div>
      <!--END OF FORM HEADER-->

     </div>
    </div>
    <!--   end of structure-->
   </div>
   <div id="content_bottom"></div>
  </div>
  <div id="content_right_right"></div>
 </div>

</div>
<div id="js_data">
 <ul id="js_saving_data">
  <li class="headerClassName" data-headerClassName="hr_employee" ></li>
  <li class="savingOnlyHeader" data-savingOnlyHeader="true" ></li>
  <li class="primary_column_id" data-primary_column_id="hr_employee_id" ></li>
  <li class="form_header_id" data-form_header_id="hr_employee" ></li>
 </ul>
 <ul id="js_contextMenu_data">
  <li class="docHedaderId" data-docHedaderId="hr_employee_id" ></li>
  <li class="btn1DivId" data-btn1DivId="hr_employee_id" ></li>
 </ul>
</div>

<?php include_template('footer.inc') ?>