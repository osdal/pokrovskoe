jQuery(document).ready(function($) {

  $('#classified-node-form .field-name-field-location select').change(function (e) {
    if ($('#classified-node-form .form-item-locations-0-city input').val() == '' || $("#classified-node-form .field-name-field-location select option:contains('" + $('#classified-node-form .form-item-locations-0-city input').val() + "')").text())
      $('#classified-node-form .form-item-locations-0-city input').val(
        $('#classified-node-form .field-name-field-location select option:selected').text()
      );
  });

  $('.pch-view').hide();
  $('.pch-view-'+$('#classified-node-form .field-name-field-category select option:selected').val()).show();
  
  $('#classified-node-form .field-name-field-category select').change(function (e) {
    $('.pch-view').slideUp(300);
    $('.pch-view-'+$('#classified-node-form .field-name-field-category select option:selected').val()).slideDown(300);
  });
  
  $('.field-name-field-icon-fa select option').each(function(){
    var vall = $(this).val();
    if (vall != '_none') $(this).html(vall);
  });
  
});
