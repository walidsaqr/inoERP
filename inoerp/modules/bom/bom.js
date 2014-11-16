function setValFromSelectPage(bom_header_id, item_id_m, item_number, item_description, uom_id, org_id) {
 this.bom_header_id = bom_header_id;
 this.item_id_m = item_id_m;
 this.item_number = item_number;
 this.item_description = item_description;
 this.uom_id = uom_id;
 this.org_id = org_id;
}

setValFromSelectPage.prototype.setVal = function() {
 var bom_header_id = this.bom_header_id;
 if (bom_header_id) {
  $("#bom_header_id").val(bom_header_id);
 }
 var row_class = localStorage.getItem("row_class");
 ;
 var rowClass = '.' + row_class;
 rowClass = rowClass.replace(/\s+/g, '.');

 if (this.org_id) {
  $('#org_id').val(this.org_id);
 }

 if (!(row_class) || row_class == 'null') {
  if (this.item_number) {
   $('#item_number').val(this.item_number);
  }
  if (this.item_id_m) {
   $('#item_id_m').val(this.item_id_m);
  }
  if (this.item_description) {
   $('#item_description').val(this.item_description);
  }
 }

 var item_obj = [{id: 'component_item_id_m', data: this.item_id_m},
  {id: 'component_item_number', data: this.item_number},
  {id: 'component_description', data: this.item_description},
  {id: 'uom', data: this.uom_id}
 ];

 $(item_obj).each(function(i, value) {
  if (value.data) {
   var fieldClass = '.' + value.id;
   $('#content').find(rowClass).find(fieldClass).val(value.data);
  }
 });

 localStorage.removeItem("row_class");
 localStorage.removeItem("field_class");
};

function disableField_forCommonBom() {
 $('#form_line').find(':input').not('input[name="line_id_cb"]')
  .not('.bom_line_id, .bom_header_id, .routing_sequence,.item_id_m , .wip_supply_type, .supply_sub_inventory, .yield, .planning_percentage, .supply_locator')
  .attr('disabled', true).css("background-color", "#ccc");
}

$(document).ready(function() {
//mandatory and field sequence
 var mandatoryCheck = new mandatoryFieldMain();
 mandatoryCheck.header_id = 'bom_header_id';
 mandatoryCheck.mandatoryHeader();
// mandatoryCheck.form_area = 'form_header';
// mandatoryCheck.mandatory_fields = ["org_id", "item_number"];
// mandatoryCheck.mandatory_messages = ["First Select Org", "No Item Number"];
// mandatoryCheck.mandatoryField();

 //setting the first line number
 if (!($('.lines_number:first').val())) {
  $('.lines_number:first').val('10');
 }

 if ($('#commonBom_item_number').val()) {
  disableField_forCommonBom();
 }

 $('#commonBom_item_number').on('blur', function() {
  disableField_forCommonBom();
 })

 //Popup for selecting bom
 $(".bom_header_id.select_popup").click(function() {
  void window.open('select.php?class_name=bom_all_v', '_blank',
   'width=1000,height=800,TOOLBAR=no,MENUBAR=no,SCROLLBARS=yes,RESIZABLE=yes,LOCATION=no,DIRECTORIES=no,STATUS=no');
  return false;
 });

 //Get the bom_id on find button click
 $('#form_header a.show.bom_header_id').click(function() {
  var headerId = $('#bom_header_id').val();
  $(this).attr('href', modepath() + 'bom_header_id=' + headerId);
 });

 //Get the bom_id on find button click
 $('#form_header a.show.item_id_m').click(function() {
   var link = modepath() + 'item_id_m=' + $('#item_id_m').val() + '&org_id=' + $('#org_id').val();
   if($('#revision_name').val()){
    link += '&revision_name=' + $('#revision_name').val();
   }
  $(this).attr('href',link);
 });

 //add a new row
// onClick_add_new_row('tr.bom_line0', 'tbody.form_data_line_tbody', 3);
 $("#content").on("click", ".add_row_img", function() {
  var addNewRow = new add_new_rowMain();
  addNewRow.trClass = 'bom_line';
  addNewRow.tbodyClass = 'form_data_line_tbody';
  addNewRow.noOfTabs = 3;
  addNewRow.lineNumberIncrementValue = 10;
  addNewRow.removeDefault = true;
  addNewRow.add_new_row();
 });

 //get subinventories on selecting org
 $('#content').on('blur', '#org_id', function() {
  var org_id = $(this).val();
  getSubInventory('modules/inv/subinventory/json_subinventory.php', org_id);
 });

 //get locators on changing sub inventory
 $('#content').on('blur', '.subinventory_id', function() {
  var trClass = '.' + $(this).closest('tr').attr('class');
  var subinventory_id = $(this).val();
  getLocator('modules/inv/locator/json_locator.php', subinventory_id, 'subinventory', trClass);
 });

//get the attachement form
 deleteData('form.php?class_name=bom_header&line_class_name=bom_line');


 //popu for selecting items
 $('#content').on('click', '.select_item_number1.select_popup', function() {
  var openUrl = 'select.php?class_name=item';
  if ($(this).siblings('.item_number').val()) {
   openUrl += '&item_number=' + $(this).siblings('.item_number').val();
  }
  void window.open(openUrl, '_blank',
   'width=1000,height=800,TOOLBAR=no,MENUBAR=no,SCROLLBARS=yes,RESIZABLE=yes,LOCATION=no,DIRECTORIES=no,STATUS=no');
 });
 
$('#content').on('blur', '#org_id, #item_number', function() {
 getItemRevision({
  'org_id': $('#org_id').val(),
  'item_id_m': $('#item_id_m').val(),
   'show_date' : false
 });
});

});
