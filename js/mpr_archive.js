$(function(){

  $.ajax({
    url: "db_fetch_mprs.php",
    method: "POST",
    dataType: "json"
  })
  .done(function(data) {

    //console.log(data);

    $.each(data,function(index,value){
      //console.log(value.month_year_format);
      $("#mprtable > tbody:last-child").append("<tr><td>"+(index+1)+"</td><td>"+value.month_year_format+"</td><td>"+value.submission_date_format+"</td><td>"+(value.draft==1?'Draft':'Submitted')+"</td><td><a href='mpr_view.php?my="+value.record_id+"'>View</a></td><td><a href='mpr_download.php?my="+value.record_id+"'>Download</a></td></tr>");
    });

    //Initialize datatable
    $("#mprtable").DataTable({
      ordering:  false
    });


  }); //End of .done

  //$("#mprtable > tbody:last-child").append("<tr><td>6</td><td></td><td></td><td></td><td></td><td></td></tr>");


})
