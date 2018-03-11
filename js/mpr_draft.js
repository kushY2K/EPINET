//Global vars

var d_table=[];
var d_var=[];
var d_val=[];

var ds_table=[];
var ds_var=[];
var ds_val=[];

var db_table=[];
var db_var=[];
var db_val=[];

var rd_table=[];
var rd_var=[];
var rd_val=[];

var dd_table=[];
var dd_var=[];
var dd_val=[];


$(document).on({
  ajaxStart: function () {
    $('#wait-modal').modal({
      backdrop: 'static',
      keyboard: false
    });
  },
  ajaxStop: function () { $("#wait-modal").modal('hide'); }
});

$(function(){
  //Render textboxes





  //Check for MPR draft
  $("#waitmsg").text("Checking for MPR Draft...");
  $.ajax({
    url: "db_draft.php",
    data: {"mode": "check"},
    method: "POST"
  })
  .done(function(data) {

    data = data.split(":");
    /*-- FETCH DATA IF DRAFT EXISTS--*/
    if(data[0]=="exists"){
      //Display a modal box to show this
      console.log("Draft already exists. Fetching data for editing...");
      console.log(data);
      $("#month_year").text(data[1]);

      //Fetch data
      $("#waitmsg").text("Fetching Draft...");
      $.ajax({
        url: "db_draft.php",
        data: {"mode": "fetch"},
        method: "POST",
        dataType: "json"
      })
      .done(function(data) {
        var data1 = data.data_header[0];
        console.log(data1);
        $.each( data1 , function( key, val ) {
          //items.push( "<li id='" + key + "'>" + val + "</li>" );
          console.log(key+":"+val);
          // target_id = "#"+key;
          // console.log(target_id);
          $("#" + key).val(val);
        });
        //$("#highlights").val("test")
        /*	var i=0;
        while(i < data.sites.length){
        var data2 = data.sites[i];
        i++;
        var j=0;
        $.each(data2 , function(key,val) {
        console.log(key+":"+val);
        while(j<data.data_sites.length) {
        var data3 = data.data_sites[j];
        j++;
        $.each(data3 , function(k,v){
        console.log(k+":"+v);
        $('#welldata tbody').append(

        "<td>"+val+"</td>"
      );
    });
  }
  $('#welldata tbody').append(
  "<tr>"+
  "<td>"+i+"</td>"+
  "<td>"+val+"</td>"
);
});

}

*/
//well data
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

displayMessage("Draft exists already. Data has been fetched successfully!","info");
});


}



/*-- DRAFT IS CREATED IN "db_draft.php" IF IT DOES NOT EXIST--*/
else{ //data contains month and year
  console.log("Draft has been freshly created...");
  displayMessage("Draft has been freshly created for "+data,"success");
  $("#month_year").text(data);
}

});


});




function saveMPR(type){
  if(type){ //If type == 1, then save draft
    console.log("save draft");
  }
  else{ //If type == 0, then submit
    console.log("submit");
  }

  collectData();

  //Save Draft
  $("#waitmsg").text("Saving...");
  $.ajax({
    url: "db_save.php",
    data: {table: d_table, var: d_var, val: d_val, draft: type, s_table: ds_table, s_var: ds_var, s_val: ds_val, b_table: db_table, b_var: db_var, b_val: db_val, rd_table: rd_table, rd_var: rd_var, rd_val: rd_val, dd_table: dd_table, dd_var: dd_var, dd_val: dd_val},
    method: "POST"
  })
  .done(function(data) {
    //console.log(data);
    if(type)
    displayMessage("Draft has been saved successfully!","info");
    else{
      var mon_year = $("#month_year").text();
      //console.log(mon_year);
      displayMessage("MPR for "+ mon_year +" has been submitted successfully!","success");
      $("#btn_submit").hide();
      $("#btn_savedraft").hide();
    }

  });

}

function collectData(){
  f_text = $(".form-control");
  n = f_text.length;
  console.log(f_text);
  for(i=0;i<n;i++){
    //var tmpClassList = $.inArray("record_header", f_text[i].classList);
    if(f_text[i].classList[1] == 'data_header'){

      console.log(f_text[i].id+":"+f_text[i].value);
      d_table.push("data_header");
      d_var.push(f_text[i].id);
      d_val.push(f_text[i].value);
    }
    if(f_text[i].classList[1] == 'data_sites'){

      console.log(f_text[i].id+":"+f_text[i].value);
      ds_table.push("data_sites");
      ds_var.push(f_text[i].id);
      ds_val.push(f_text[i].value);
    }
    if(f_text[i].classList[1] == 'data_basin'){
      console.log(f_text[i].id+":"+f_text[i].value);
      db_table.push("data_basin");
      db_var.push(f_text[i].id);
      db_val.push(f_text[i].value);
    }
    if(f_text[i].classList[1] == 'data_basin_reservoir_data'){
      console.log(f_text[i].id+":"+f_text[i].value);
      rd_table.push("data_basin_reservoir_data");
      rd_var.push(f_text[i].id);
      rd_val.push(f_text[i].value);
    }
    if(f_text[i].classList[1] == 'drillingdata'){

      console.log(f_text[i].id+":"+f_text[i].value);
      dd_table.push("data_sites_drilling_data");
      dd_var.push(f_text[i].id);
      dd_val.push(f_text[i].value);
    }


    /* switch(f_text[i].classList[1]){
    case "data_header":
    //if(f_text[i].value){
    if(1){
    console.log(f_text[i].id+":"+f_text[i].value);
    d_table.push("data_header");
    d_var.push(f_text[i].id);
    d_val.push(f_text[i].value);
  }
  break;
  default:
  //Do nothing


}*/ //switch
} //for loop
}



function displayMessage(msg,type){
  $("#msg-box").show();
  $("#msg-response").text(msg);
  $("#msg-class").removeClass();
  $("#msg-class").addClass("col-md-6 alert alert-dismissible alert-"+ type);
}

function test(){
  console.log($("#month_year").text());
}
