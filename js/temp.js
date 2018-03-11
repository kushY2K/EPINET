var k=0;
$.each(data.sites, function(i, d) {
  var row = '<tr>';
  $.each(d, function(j, e) {
    var site_id = e.site_id;
    k++;
    row += '<td>' + k + '</td>';
    row += '<td>' + e.site_name + '</td>';
    $.each(data.data_sites, function(o, p) {
      $.each(p, function(l, m) {
        var data_site_id = m.site_id;
        if(site_id == data_site_id){
          row += '<td><input type="number" class="form-control data_sites" value="'+m.ubhi+'" id="ubhi-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control data_sites" value="'+m.ubhi_added_during_month+'" id="ubhi_added_during_month-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control data_sites" value="'+m.total_volume+'" id="total_volume-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control data_sites" value="'+m.data_loaded_month+'" id="data_loaded_month-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control data_sites" value="'+m.cumulative_data_loaded +'" id="cumulative_data_loaded-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control data_sites" value="'+m.cumulative_data_validated+'" id="cumulative_data_validated-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control data_sites" value="'+m.data_gaps_identified+'" id="data_gaps_identified-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control data_sites" value="'+m.data_gaps_filled+'" id="data_gaps_filled-'+site_id+'"></td>';
        }
      });
    });
  });
  row += '</tr>';
  $('#welldata tbody').append(row);
});
//leased objects
$.each(data.data_basin, function(j, e) {
  $.each(e, function(i, d) {
    var row ;
    row += '<td><input type="number" class="form-control data_basin" value="'+d.total_volume+'" id="total_volume-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin" value="'+d.data_loaded_month+'" id="data_loaded_month-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin" value="'+d.cumulative_data_loaded +'" id="cumulative_data_loaded-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin" value="'+d.cumulative_data_validated+'" id="cumulative_data_validated-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin" value="'+d.data_gaps_identified+'" id="data_gaps_identified-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin" value="'+d.data_gaps_filled+'" id="data_gaps_filled-'+d.data_class+'"></td>';

    $("#"+d.data_class).append(row);
  });
});

//reservoir data
$.each(data.data_basin_rd, function(j, e) {
  $.each(e, function(i, d) {
    var row ;
    row += '<td><input type="number" class="form-control data_basin_reservoir_data" value="'+d.total_volume+'" id="total_volume-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin_reservoir_data" value="'+d.data_loaded_month_wells+'" id="data_loaded_month_wells-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin_reservoir_data" value="'+d.data_loaded_month_records+'" id="data_loaded_month_records-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin_reservoir_data" value="'+d.cumulative_data_loaded_wells +'" id="cumulative_data_loaded_wells-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin_reservoir_data" value="'+d.cumulative_data_loaded_records +'" id="cumulative_data_loaded_records-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin_reservoir_data" value="'+d.cumulative_data_validated_wells+'" id="cumulative_data_validated_wells-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin_reservoir_data" value="'+d.data_gaps_identified_wells+'" id="data_gaps_identified_wells-'+d.data_class+'"></td>';
    row += '<td><input type="number" class="form-control data_basin_reservoir_data" value="'+d.data_gaps_filled_wells+'" id="data_gaps_filled_wells-'+d.data_class+'"></td>';

    $("#"+d.data_class).append(row);
  });
});

//drilling data
var k=0;
$.each(data.sites, function(i, d) {
  var row = '<tr>';
  $.each(d, function(j, e) {
    var site_id = e.site_id;
    k++;
    row += '<td>' + k + '</td>';
    row += '<td>' + e.site_name + '</td>';
    $.each(data.data_sites_dd, function(o, p) {
      $.each(p, function(l, m) {
        var data_site_id = m.site_id;
        if(site_id == data_site_id){
          row += '<td><input type="number" class="form-control drillingdata" value="'+m.total_volume+'" id="total_volume-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control drillingdata" value="'+m.data_loaded_month+'" id="data_loaded_month-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control drillingdata" value="'+m.cumulative_data_loaded +'" id="cumulative_data_loaded-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control drillingdata" value="'+m.cumulative_data_validated+'" id="cumulative_data_validated-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control drillingdata" value="'+m.data_gaps_identified+'" id="data_gaps_identified-'+site_id+'"></td>';
          row += '<td><input type="number" class="form-control drillingdata" value="'+m.data_gaps_filled+'" id="data_gaps_filled-'+site_id+'"></td>';
        }
      });
    });
  });
  row += '</tr>';
  $('#drillingdata tbody').append(row);
});
