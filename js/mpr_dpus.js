$(document).ready(function() {
	//  WELL DATA
	var ubhi="";
	var ubhi_added="";
	var total_volume="";
	var data_loaded_month="";
	var cumulative_data_load="";
	var cumulative_data_validated="";
	var data_gaps_identified="";
	var data_gaps_filled="";
	// use .change(function) for live table edit     (ignore this @.@)
	$(".edit_well_data").keyup(function() {
		var site_id=$(this).attr('id');
		ubhi=$("#ubhi_"+site_id).val();
		ubhi_added=$("#ubhi_added_"+site_id).val();
		total_volume=$("#total_volume_"+site_id).val();
		data_loaded_month=$("#data_loaded_month_"+site_id).val();
		cumulative_data_load=$("#cumulative_loaded_"+site_id).val();
		cumulative_data_validated=$("#cumulative_validated_"+site_id).val();
		data_gaps_identified=$("#data_identified_"+site_id).val();
		data_gaps_filled=$("#data_filled_"+site_id).val(); 
		var dataString='site_id='+site_id+'&ubhi='+ubhi+'&ubhi_added='+ubhi_added+'&total_volume='+total_volume+'&data_loaded_month='+data_loaded_month+'&cumulative_data_load='+cumulative_data_load+'&cumulative_data_validated='+cumulative_data_validated+'&data_gaps_identified='+data_gaps_identified+'&data_gaps_filled='+data_gaps_filled;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString 
			});
		});
		//  for live table edit
		//var dataString  = 'site_id=' + site_id + '&UBHI=' + UBHI + '&UBHI_added=' + UBHI_added + '&Total_volume=' + Total_volume + '&Data_loaded_month=' + Data_loaded_month + '&Cumulative_data_load=' + Cumulative_data_load + '&Cumulative_data_validated=' + Cumulative_data_validated + '&Data_gaps_identified=' + Data_gaps_identified + '&Data_gaps_filled=' + Data_gaps_filled ;
		//$.ajax({
			//type : "POST" ,
			//url : "db_save_well_data.php" ,
			//data : dataString ,
			//cache: false,
			//success: function(html)
			//{
			//}
		//});
	});
	// WELL DATA

	// LEASED OBJECTS
	var total_volume_lo="";
	var data_loaded_month_lo="";
	var cumulative_data_load_lo="";
	var cumulative_data_validated_lo="";
	var data_gaps_identified_lo="";
	var data_gaps_filled_lo="";
	$(".edit_leased_objects").keyup(function() {
		total_volume_lo=$("#total_volume_lo").val();
		data_loaded_month_lo=$("#data_loaded_month_lo").val();
		cumulative_data_load_lo=$("#cumulative_loaded_lo").val();
		cumulative_data_validated_lo=$("#cumulative_validated_lo").val();
		data_gaps_identified_lo=$("#data_identified_lo").val();
		data_gaps_filled_lo=$("#data_filled_lo").val(); 
		var dataString_lo='total_volume_lo='+total_volume_lo+'&data_loaded_month_lo='+data_loaded_month_lo+'&cumulative_data_load_lo='+cumulative_data_load_lo+'&cumulative_data_validated_lo='+cumulative_data_validated_lo+'&data_gaps_identified_lo='+data_gaps_identified_lo+'&data_gaps_filled_lo='+data_gaps_filled_lo;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_lo 
			});
		});
	});
	// LEASED OBJECTS
	
	// LOG DATA --> ORIGINAL LOGS IN PSL
	var total_volume_ld_olp="";
	var data_loaded_month_ld_olp="";
	var cumulative_data_load_ld_olp="";
	var cumulative_data_validated_ld_olp="";
	var data_gaps_identified_ld_olp="";
	var data_gaps_filled_ld_olp="";
	$(".original_logs_in_psl").keyup(function() {
		total_volume_ld_olp=$("#total_volume_ld_olp").val();
		data_loaded_month_ld_olp=$("#data_loaded_month_ld_olp").val();
		cumulative_data_load_ld_olp=$("#cumulative_loaded_ld_olp").val();
		cumulative_data_validated_ld_olp=$("#cumulative_validated_ld_olp").val();
		data_gaps_identified_ld_olp=$("#data_identified_ld_olp").val();
		data_gaps_filled_ld_olp=$("#data_filled_ld_olp").val(); 
		var dataString_ld_olp='total_volume_ld_olp='+total_volume_ld_olp+'&data_loaded_month_ld_olp='+data_loaded_month_ld_olp+'&cumulative_data_load_ld_olp='+cumulative_data_load_ld_olp+'&cumulative_data_validated_ld_olp='+cumulative_data_validated_ld_olp+'&data_gaps_identified_ld_olp='+data_gaps_identified_ld_olp+'&data_gaps_filled_ld_olp='+data_gaps_filled_ld_olp;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_ld_olp
			});
		});
	});
	// LOG DATA --> ORIGINAL LOGS IN PSL
	
	//LOG DATA --> COMPOSITE LOGS IN PSE
	var total_volume_ld_clp="";
	var data_loaded_month_ld_clp="";
	var cumulative_data_load_ld_clp="";
	var cumulative_data_validated_ld_clp="";
	var data_gaps_identified_ld_clp="";
	var data_gaps_filled_ld_clp="";
	$(".composite_logs_in_pse").keyup(function() {
		total_volume_ld_clp=$("#total_volume_ld_clp").val();
		data_loaded_month_ld_clp=$("#data_loaded_month_ld_clp").val();
		cumulative_data_load_ld_clp=$("#cumulative_loaded_ld_clp").val();
		cumulative_data_validated_ld_clp=$("#cumulative_validated_ld_clp").val();
		data_gaps_identified_ld_clp=$("#data_identified_ld_clp").val();
		data_gaps_filled_ld_clp=$("#data_filled_ld_clp").val(); 
		var dataString_ld_clp='total_volume_ld_clp='+total_volume_ld_clp+'&data_loaded_month_ld_clp='+data_loaded_month_ld_clp+'&cumulative_data_load_ld_clp='+cumulative_data_load_ld_clp+'&cumulative_data_validated_ld_clp='+cumulative_data_validated_ld_clp+'&data_gaps_identified_ld_clp='+data_gaps_identified_ld_clp+'&data_gaps_filled_ld_clp='+data_gaps_filled_ld_clp;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_ld_clp
			});
		});
	});
	//LOG DATA --> COMPOSITE LOGS IN PSE
	
	//LOG DATA --> PROCESSED LOGS IN PSE
	var total_volume_ld_plp="";
	var data_loaded_month_ld_plp="";
	var cumulative_data_load_ld_plp="";
	var cumulative_data_validated_ld_plp="";
	var data_gaps_identified_ld_plp="";
	var data_gaps_filled_ld_plp="";
	$(".processed_logs_in_pse").keyup(function() {
		total_volume_ld_plp=$("#total_volume_ld_plp").val();
		data_loaded_month_ld_plp=$("#data_loaded_month_ld_plp").val();
		cumulative_data_load_ld_plp=$("#cumulative_loaded_ld_plp").val();
		cumulative_data_validated_ld_plp=$("#cumulative_validated_ld_plp").val();
		data_gaps_identified_ld_plp=$("#data_identified_ld_plp").val();
		data_gaps_filled_ld_plp=$("#data_filled_ld_plp").val(); 
		var dataString_ld_plp='total_volume_ld_plp='+total_volume_ld_plp+'&data_loaded_month_ld_plp='+data_loaded_month_ld_plp+'&cumulative_data_load_ld_plp='+cumulative_data_load_ld_plp+'&cumulative_data_validated_ld_plp='+cumulative_data_validated_ld_plp+'&data_gaps_identified_ld_plp='+data_gaps_identified_ld_plp+'&data_gaps_filled_ld_plp='+data_gaps_filled_ld_plp;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_ld_plp
			});
		});
	});
	//LOG DATA --> PROCESSED LOGS IN PSE
	
	//SEISMIC DATA --> 2D NAVIGATION DATA
	var total_volume_sd_2dnd="";
	var data_loaded_month_sd_2dnd="";
	var cumulative_data_load_sd_2dnd="";
	var cumulative_data_validated_sd_2dnd="";
	var data_gaps_identified_sd_2dnd="";
	var data_gaps_filled_sd_2dnd="";
	$(".2d_navigation_data").keyup(function() {
		total_volume_sd_2dnd=$("#total_volume_sd_2dnd").val();
		data_loaded_month_sd_2dnd=$("#data_loaded_month_sd_2dnd").val();
		cumulative_data_load_sd_2dnd=$("#cumulative_loaded_sd_2dnd").val();
		cumulative_data_validated_sd_2dnd=$("#cumulative_validated_sd_2dnd").val();
		data_gaps_identified_sd_2dnd=$("#data_identified_sd_2dnd").val();
		data_gaps_filled_sd_2dnd=$("#data_filled_sd_2dnd").val(); 
		var dataString_sd_2dnd='total_volume_sd_2dnd='+total_volume_sd_2dnd+'&data_loaded_month_sd_2dnd='+data_loaded_month_sd_2dnd+'&cumulative_data_load_sd_2dnd='+cumulative_data_load_sd_2dnd+'&cumulative_data_validated_sd_2dnd='+cumulative_data_validated_sd_2dnd+'&data_gaps_identified_sd_2dnd='+data_gaps_identified_sd_2dnd+'&data_gaps_filled_sd_2dnd='+data_gaps_filled_sd_2dnd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_sd_2dnd
			});
		});
	});
	//SEISMIC DATA --> 2D NAVIGATION DATA
	
	//SEISMIC DATA --> 3D NAVIGATION DATA
	var total_volume_sd_3dnd="";
	var data_loaded_month_sd_3dnd="";
	var cumulative_data_load_sd_3dnd="";
	var cumulative_data_validated_sd_3dnd="";
	var data_gaps_identified_sd_3dnd="";
	var data_gaps_filled_sd_3dnd="";
	$(".3d_navigation_data").keyup(function() {
		total_volume_sd_3dnd=$("#total_volume_sd_3dnd").val();
		data_loaded_month_sd_3dnd=$("#data_loaded_month_sd_3dnd").val();
		cumulative_data_load_sd_3dnd=$("#cumulative_loaded_sd_3dnd").val();
		cumulative_data_validated_sd_3dnd=$("#cumulative_validated_sd_3dnd").val();
		data_gaps_identified_sd_3dnd=$("#data_identified_sd_3dnd").val();
		data_gaps_filled_sd_3dnd=$("#data_filled_sd_3dnd").val(); 
		var dataString_sd_3dnd='total_volume_sd_3dnd='+total_volume_sd_3dnd+'&data_loaded_month_sd_3dnd='+data_loaded_month_sd_3dnd+'&cumulative_data_load_sd_3dnd='+cumulative_data_load_sd_3dnd+'&cumulative_data_validated_sd_3dnd='+cumulative_data_validated_sd_3dnd+'&data_gaps_identified_sd_3dnd='+data_gaps_identified_sd_3dnd+'&data_gaps_filled_sd_3dnd='+data_gaps_filled_sd_3dnd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_sd_3dnd
			});
		});
	});
	//SEISMIC DATA --> 3D NAVIGATION DATA
	
	//SEISMIC DATA --> 2D SegY DATA
	var total_volume_sd_2dsd="";
	var data_loaded_month_sd_2dsd="";
	var cumulative_data_load_sd_2dsd="";
	var cumulative_data_validated_sd_2dsd="";
	var data_gaps_identified_sd_2dsd="";
	var data_gaps_filled_sd_2dsd="";
	$(".2d_segy_data").keyup(function() {
		total_volume_sd_2dsd=$("#total_volume_sd_2dsd").val();
		data_loaded_month_sd_2dsd=$("#data_loaded_month_sd_2dsd").val();
		cumulative_data_load_sd_2dsd=$("#cumulative_loaded_sd_2dsd").val();
		cumulative_data_validated_sd_2dsd=$("#cumulative_validated_sd_2dsd").val();
		data_gaps_identified_sd_2dsd=$("#data_identified_sd_2dsd").val();
		data_gaps_filled_sd_2dsd=$("#data_filled_sd_2dsd").val(); 
		var dataString_sd_2dsd='total_volume_sd_2dsd='+total_volume_sd_2dsd+'&data_loaded_month_sd_2dsd='+data_loaded_month_sd_2dsd+'&cumulative_data_load_sd_2dsd='+cumulative_data_load_sd_2dsd+'&cumulative_data_validated_sd_2dsd='+cumulative_data_validated_sd_2dsd+'&data_gaps_identified_sd_2dsd='+data_gaps_identified_sd_2dsd+'&data_gaps_filled_sd_2dsd='+data_gaps_filled_sd_2dsd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_sd_2dsd
			});
		});
	});
	//SEISMIC DATA --> 2D SegY DATA
	
	//SEISMIC DATA --> 3D SegY DATA
	var total_volume_sd_3dsd="";
	var data_loaded_month_sd_3dsd="";
	var cumulative_data_load_sd_3dsd="";
	var cumulative_data_validated_sd_3dsd="";
	var data_gaps_identified_sd_3dsd="";
	var data_gaps_filled_sd_3dsd="";
	$(".3d_segy_data").keyup(function() {
		total_volume_sd_3dsd=$("#total_volume_sd_3dsd").val();
		data_loaded_month_sd_3dsd=$("#data_loaded_month_sd_3dsd").val();
		cumulative_data_load_sd_3dsd=$("#cumulative_loaded_sd_3dsd").val();
		cumulative_data_validated_sd_3dsd=$("#cumulative_validated_sd_3dsd").val();
		data_gaps_identified_sd_3dsd=$("#data_identified_sd_3dsd").val();
		data_gaps_filled_sd_3dsd=$("#data_filled_sd_3dsd").val(); 
		var dataString_sd_3dsd='total_volume_sd_3dsd='+total_volume_sd_3dsd+'&data_loaded_month_sd_3dsd='+data_loaded_month_sd_3dsd+'&cumulative_data_load_sd_3dsd='+cumulative_data_load_sd_3dsd+'&cumulative_data_validated_sd_3dsd='+cumulative_data_validated_sd_3dsd+'&data_gaps_identified_sd_3dsd='+data_gaps_identified_sd_3dsd+'&data_gaps_filled_sd_3dsd='+data_gaps_filled_sd_3dsd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_sd_3dsd
			});
		});
	});
	//SEISMIC DATA --> 3D SegY DATA
	
	//SEISMIC DATA --> MERGED 3D DATA
	var total_volume_sd_m3dd="";
	var data_loaded_month_sd_m3dd="";
	var cumulative_data_load_sd_m3dd="";
	var cumulative_data_validated_sd_m3dd="";
	var data_gaps_identified_sd_m3dd="";
	var data_gaps_filled_sd_m3dd="";
	$(".merged_3d_data").keyup(function() {
		total_volume_sd_m3dd=$("#total_volume_sd_m3dd").val();
		data_loaded_month_sd_m3dd=$("#data_loaded_month_sd_m3dd").val();
		cumulative_data_load_sd_m3dd=$("#cumulative_loaded_sd_m3dd").val();
		cumulative_data_validated_sd_m3dd=$("#cumulative_validated_sd_m3dd").val();
		data_gaps_identified_sd_m3dd=$("#data_identified_sd_m3dd").val();
		data_gaps_filled_sd_m3dd=$("#data_filled_sd_m3dd").val(); 
		var dataString_sd_m3dd='total_volume_sd_m3dd='+total_volume_sd_m3dd+'&data_loaded_month_sd_m3dd='+data_loaded_month_sd_m3dd+'&cumulative_data_load_sd_m3dd='+cumulative_data_load_sd_m3dd+'&cumulative_data_validated_sd_m3dd='+cumulative_data_validated_sd_m3dd+'&data_gaps_identified_sd_m3dd='+data_gaps_identified_sd_m3dd+'&data_gaps_filled_sd_m3dd='+data_gaps_filled_sd_m3dd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_sd_m3dd
			});
		});
	});
	//SEISMIC DATA --> MERGED 3D DATA
	
	//SEISMIC DATA --> VSP TD CURVE
	var total_volume_sd_vtc="";
	var data_loaded_month_sd_vtc="";
	var cumulative_data_load_sd_vtc="";
	var cumulative_data_validated_sd_vtc="";
	var data_gaps_identified_sd_vtc="";
	var data_gaps_filled_sd_vtc="";
	$(".vsp_td_curve").keyup(function() {
		total_volume_sd_vtc=$("#total_volume_sd_vtc").val();
		data_loaded_month_sd_vtc=$("#data_loaded_month_sd_vtc").val();
		cumulative_data_load_sd_vtc=$("#cumulative_loaded_sd_vtc").val();
		cumulative_data_validated_sd_vtc=$("#cumulative_validated_sd_vtc").val();
		data_gaps_identified_sd_vtc=$("#data_identified_sd_vtc").val();
		data_gaps_filled_sd_vtc=$("#data_filled_sd_vtc").val(); 
		var dataString_sd_vtc='total_volume_sd_vtc='+total_volume_sd_vtc+'&data_loaded_month_sd_vtc='+data_loaded_month_sd_vtc+'&cumulative_data_load_sd_vtc='+cumulative_data_load_sd_vtc+'&cumulative_data_validated_sd_vtc='+cumulative_data_validated_sd_vtc+'&data_gaps_identified_sd_vtc='+data_gaps_identified_sd_vtc+'&data_gaps_filled_sd_vtc='+data_gaps_filled_sd_vtc;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_sd_vtc
			});
		});
	});
	//SEISMIC DATA --> VSP TD CURVE
	
	//SEISMIC DATA --> VSP SEGY DATA
	var total_volume_sd_vsd="";
	var data_loaded_month_sd_vsd="";
	var cumulative_data_load_sd_vsd="";
	var cumulative_data_validated_sd_vsd="";
	var data_gaps_identified_sd_vsd="";
	var data_gaps_filled_sd_vsd="";
	$(".vsp_segy_data").keyup(function() {
		total_volume_sd_vsd=$("#total_volume_sd_vsd").val();
		data_loaded_month_sd_vsd=$("#data_loaded_month_sd_vsd").val();
		cumulative_data_load_sd_vsd=$("#cumulative_loaded_sd_vsd").val();
		cumulative_data_validated_sd_vsd=$("#cumulative_validated_sd_vsd").val();
		data_gaps_identified_sd_vsd=$("#data_identified_sd_vsd").val();
		data_gaps_filled_sd_vsd=$("#data_filled_sd_vsd").val(); 
		var dataString_sd_vsd='total_volume_sd_vsd='+total_volume_sd_vsd+'&data_loaded_month_sd_vsd='+data_loaded_month_sd_vsd+'&cumulative_data_load_sd_vsd='+cumulative_data_load_sd_vsd+'&cumulative_data_validated_sd_vsd='+cumulative_data_validated_sd_vsd+'&data_gaps_identified_sd_vsd='+data_gaps_identified_sd_vsd+'&data_gaps_filled_sd_vsd='+data_gaps_filled_sd_vsd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_sd_vsd
			});
		});
	});
	//SEISMIC DATA --> VSP SEGY DATA
	
	//GEO-LAB DATA --> PALYNOLOGY
	var total_volume_gld_p="";
	var data_loaded_month_gld_p="";
	var cumulative_data_load_gld_p="";
	var cumulative_data_validated_gld_p="";
	var data_gaps_identified_gld_p="";
	var data_gaps_filled_gld_p="";
	$(".palynology").keyup(function() {
		total_volume_gld_p=$("#total_volume_gld_p").val();
		data_loaded_month_gld_p=$("#data_loaded_month_gld_p").val();
		cumulative_data_load_gld_p=$("#cumulative_loaded_gld_p").val();
		cumulative_data_validated_gld_p=$("#cumulative_validated_gld_p").val();
		data_gaps_identified_gld_p=$("#data_identified_gld_p").val();
		data_gaps_filled_gld_p=$("#data_filled_gld_p").val(); 
		var dataString_gld_p='total_volume_gld_p='+total_volume_gld_p+'&data_loaded_month_gld_p='+data_loaded_month_gld_p+'&cumulative_data_load_gld_p='+cumulative_data_load_gld_p+'&cumulative_data_validated_gld_p='+cumulative_data_validated_gld_p+'&data_gaps_identified_gld_p='+data_gaps_identified_gld_p+'&data_gaps_filled_gld_p='+data_gaps_filled_gld_p;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gld_p
			});
		});
	});
	//GEO-LAB DATA --> PALYNOLOGY
	
	//GEO-LAB DATA --> PALEONTOLOGY
	var total_volume_gld_pp="";
	var data_loaded_month_gld_pp="";
	var cumulative_data_load_gld_pp="";
	var cumulative_data_validated_gld_pp="";
	var data_gaps_identified_gld_pp="";
	var data_gaps_filled_gld_pp="";
	$(".paleontology").keyup(function() {
		total_volume_gld_pp=$("#total_volume_gld_pp").val();
		data_loaded_month_gld_pp=$("#data_loaded_month_gld_pp").val();
		cumulative_data_load_gld_pp=$("#cumulative_loaded_gld_pp").val();
		cumulative_data_validated_gld_pp=$("#cumulative_validated_gld_pp").val();
		data_gaps_identified_gld_pp=$("#data_identified_gld_pp").val();
		data_gaps_filled_gld_pp=$("#data_filled_gld_pp").val(); 
		var dataString_gld_pp='total_volume_gld_pp='+total_volume_gld_pp+'&data_loaded_month_gld_pp='+data_loaded_month_gld_pp+'&cumulative_data_load_gld_pp='+cumulative_data_load_gld_pp+'&cumulative_data_validated_gld_pp='+cumulative_data_validated_gld_pp+'&data_gaps_identified_gld_pp='+data_gaps_identified_gld_pp+'&data_gaps_filled_gld_pp='+data_gaps_filled_gld_pp;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gld_pp
			});
		});
	});
	//GEO-LAB DATA --> PALEONTOLOGY
	
	//GEO-LAB DATA --> SEDIMENTOLOGY
	var total_volume_gld_s="";
	var data_loaded_month_gld_s="";
	var cumulative_data_load_gld_s="";
	var cumulative_data_validated_gld_s="";
	var data_gaps_identified_gld_s="";
	var data_gaps_filled_gld_s="";
	$(".sedimentology").keyup(function() {
		total_volume_gld_s=$("#total_volume_gld_s").val();
		data_loaded_month_gld_s=$("#data_loaded_month_gld_s").val();
		cumulative_data_load_gld_s=$("#cumulative_loaded_gld_s").val();
		cumulative_data_validated_gld_s=$("#cumulative_validated_gld_s").val();
		data_gaps_identified_gld_s=$("#data_identified_gld_s").val();
		data_gaps_filled_gld_s=$("#data_filled_gld_s").val(); 
		var dataString_gld_s='total_volume_gld_s='+total_volume_gld_s+'&data_loaded_month_gld_s='+data_loaded_month_gld_s+'&cumulative_data_load_gld_s='+cumulative_data_load_gld_s+'&cumulative_data_validated_gld_s='+cumulative_data_validated_gld_s+'&data_gaps_identified_gld_s='+data_gaps_identified_gld_s+'&data_gaps_filled_gld_s='+data_gaps_filled_gld_s;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gld_s
			});
		});
	});
	//GEO-LAB DATA --> SEDIMENTOLOGY
	
	//GEO-CHEMICAL DATA --> SOURCE ROCK
	var total_volume_gcd_sr="";
	var data_loaded_month_gcd_sr="";
	var cumulative_data_load_gcd_sr="";
	var cumulative_data_validated_gcd_sr="";
	var data_gaps_identified_gcd_sr="";
	var data_gaps_filled_gcd_sr="";
	$(".source_rock").keyup(function() {
		total_volume_gcd_sr=$("#total_volume_gcd_sr").val();
		data_loaded_month_gcd_sr=$("#data_loaded_month_gcd_sr").val();
		cumulative_data_load_gcd_sr=$("#cumulative_loaded_gcd_sr").val();
		cumulative_data_validated_gcd_sr=$("#cumulative_validated_gcd_sr").val();
		data_gaps_identified_gcd_sr=$("#data_identified_gcd_sr").val();
		data_gaps_filled_gcd_sr=$("#data_filled_gcd_sr").val(); 
		var dataString_gcd_sr='total_volume_gcd_sr='+total_volume_gcd_sr+'&data_loaded_month_gcd_sr='+data_loaded_month_gcd_sr+'&cumulative_data_load_gcd_sr='+cumulative_data_load_gcd_sr+'&cumulative_data_validated_gcd_sr='+cumulative_data_validated_gcd_sr+'&data_gaps_identified_gcd_sr='+data_gaps_identified_gcd_sr+'&data_gaps_filled_gcd_sr='+data_gaps_filled_gcd_sr;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gcd_sr
			});
		});
	});
	//GEO-CHEMICAL DATA --> SOURCE ROCK
	
	//GEO-CHEMICAL DATA --> OIL
	var total_volume_gcd_o="";
	var data_loaded_month_gcd_o="";
	var cumulative_data_load_gcd_o="";
	var cumulative_data_validated_gcd_o="";
	var data_gaps_identified_gcd_o="";
	var data_gaps_filled_gcd_o="";
	$(".oil").keyup(function() {
		total_volume_gcd_o=$("#total_volume_gcd_o").val();
		data_loaded_month_gcd_o=$("#data_loaded_month_gcd_o").val();
		cumulative_data_load_gcd_o=$("#cumulative_loaded_gcd_o").val();
		cumulative_data_validated_gcd_o=$("#cumulative_validated_gcd_o").val();
		data_gaps_identified_gcd_o=$("#data_identified_gcd_o").val();
		data_gaps_filled_gcd_o=$("#data_filled_gcd_o").val(); 
		var dataString_gcd_o='total_volume_gcd_o='+total_volume_gcd_o+'&data_loaded_month_gcd_o='+data_loaded_month_gcd_o+'&cumulative_data_load_gcd_o='+cumulative_data_load_gcd_o+'&cumulative_data_validated_gcd_o='+cumulative_data_validated_gcd_o+'&data_gaps_identified_gcd_o='+data_gaps_identified_gcd_o+'&data_gaps_filled_gcd_o='+data_gaps_filled_gcd_o;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gcd_o
			});
		});
	});
	//GEO-CHEMICAL DATA --> OIL
	
	//GEO-CHEMICAL DATA --> WATER
	var total_volume_gcd_w="";
	var data_loaded_month_gcd_w="";
	var cumulative_data_load_gcd_w="";
	var cumulative_data_validated_gcd_w="";
	var data_gaps_identified_gcd_w="";
	var data_gaps_filled_gcd_w="";
	$(".water").keyup(function() {
		total_volume_gcd_w=$("#total_volume_gcd_w").val();
		data_loaded_month_gcd_w=$("#data_loaded_month_gcd_w").val();
		cumulative_data_load_gcd_w=$("#cumulative_loaded_gcd_w").val();
		cumulative_data_validated_gcd_w=$("#cumulative_validated_gcd_w").val();
		data_gaps_identified_gcd_w=$("#data_identified_gcd_w").val();
		data_gaps_filled_gcd_w=$("#data_filled_gcd_w").val(); 
		var dataString_gcd_w='total_volume_gcd_w='+total_volume_gcd_w+'&data_loaded_month_gcd_w='+data_loaded_month_gcd_w+'&cumulative_data_load_gcd_w='+cumulative_data_load_gcd_w+'&cumulative_data_validated_gcd_w='+cumulative_data_validated_gcd_w+'&data_gaps_identified_gcd_w='+data_gaps_identified_gcd_w+'&data_gaps_filled_gcd_w='+data_gaps_filled_gcd_w;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gcd_w
			});
		});
	});
	//GEO-CHEMICAL DATA --> WATER
	
	//GEO-CHEMICAL DATA --> GAS
	var total_volume_gcd_g="";
	var data_loaded_month_gcd_g="";
	var cumulative_data_load_gcd_g="";
	var cumulative_data_validated_gcd_g="";
	var data_gaps_identified_gcd_g="";
	var data_gaps_filled_gcd_g="";
	$(".gas").keyup(function() {
		total_volume_gcd_g=$("#total_volume_gcd_g").val();
		data_loaded_month_gcd_g=$("#data_loaded_month_gcd_g").val();
		cumulative_data_load_gcd_g=$("#cumulative_loaded_gcd_g").val();
		cumulative_data_validated_gcd_g=$("#cumulative_validated_gcd_g").val();
		data_gaps_identified_gcd_g=$("#data_identified_gcd_g").val();
		data_gaps_filled_gcd_g=$("#data_filled_gcd_g").val(); 
		var dataString_gcd_g='total_volume_gcd_g='+total_volume_gcd_g+'&data_loaded_month_gcd_g='+data_loaded_month_gcd_g+'&cumulative_data_load_gcd_g='+cumulative_data_load_gcd_g+'&cumulative_data_validated_gcd_g='+cumulative_data_validated_gcd_g+'&data_gaps_identified_gcd_g='+data_gaps_identified_gcd_g+'&data_gaps_filled_gcd_g='+data_gaps_filled_gcd_g;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gcd_g
			});
		});
	});
	//GEO-CHEMICAL DATA --> GAS
	
	//GEO-CHEMICAL DATA --> SURFACE SURVEYS
	var total_volume_gcd_ss="";
	var data_loaded_month_gcd_ss="";
	var cumulative_data_load_gcd_ss="";
	var cumulative_data_validated_gcd_ss="";
	var data_gaps_identified_gcd_ss="";
	var data_gaps_filled_gcd_ss="";
	$(".surface_surveys").keyup(function() {
		total_volume_gcd_ss=$("#total_volume_gcd_ss").val();
		data_loaded_month_gcd_ss=$("#data_loaded_month_gcd_ss").val();
		cumulative_data_load_gcd_ss=$("#cumulative_loaded_gcd_ss").val();
		cumulative_data_validated_gcd_ss=$("#cumulative_validated_gcd_ss").val();
		data_gaps_identified_gcd_ss=$("#data_identified_gcd_ss").val();
		data_gaps_filled_gcd_ss=$("#data_filled_gcd_ss").val(); 
		var dataString_gcd_ss='total_volume_gcd_ss='+total_volume_gcd_ss+'&data_loaded_month_gcd_ss='+data_loaded_month_gcd_ss+'&cumulative_data_load_gcd_ss='+cumulative_data_load_gcd_ss+'&cumulative_data_validated_gcd_ss='+cumulative_data_validated_gcd_ss+'&data_gaps_identified_gcd_ss='+data_gaps_identified_gcd_ss+'&data_gaps_filled_gcd_ss='+data_gaps_filled_gcd_ss;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gcd_ss
			});
		});
	});
	//GEO-CHEMICAL DATA --> SURFACE SURVEYS
	
	//GEO-CHEMICAL DATA --> CORE STUDIES
	var total_volume_gcd_cs="";
	var data_loaded_month_gcd_cs="";
	var cumulative_data_load_gcd_cs="";
	var cumulative_data_validated_gcd_cs="";
	var data_gaps_identified_gcd_cs="";
	var data_gaps_filled_gcd_cs="";
	$(".core_studies").keyup(function() {
		total_volume_gcd_cs=$("#total_volume_gcd_cs").val();
		data_loaded_month_gcd_cs=$("#data_loaded_month_gcd_cs").val();
		cumulative_data_load_gcd_cs=$("#cumulative_loaded_gcd_cs").val();
		cumulative_data_validated_gcd_cs=$("#cumulative_validated_gcd_cs").val();
		data_gaps_identified_gcd_cs=$("#data_identified_gcd_cs").val();
		data_gaps_filled_gcd_cs=$("#data_filled_gcd_cs").val(); 
		var dataString_gcd_cs='total_volume_gcd_cs='+total_volume_gcd_cs+'&data_loaded_month_gcd_cs='+data_loaded_month_gcd_cs+'&cumulative_data_load_gcd_cs='+cumulative_data_load_gcd_cs+'&cumulative_data_validated_gcd_cs='+cumulative_data_validated_gcd_cs+'&data_gaps_identified_gcd_cs='+data_gaps_identified_gcd_cs+'&data_gaps_filled_gcd_cs='+data_gaps_filled_gcd_cs;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gcd_cs
			});
		});
	});
	//GEO-CHEMICAL DATA --> CORE STUDIES
	
	//GEO-CHEMICAL DATA --> PVT ANALYSIS
	var total_volume_gcd_ps="";
	var data_loaded_month_gcd_ps="";
	var cumulative_data_load_gcd_ps="";
	var cumulative_data_validated_gcd_ps="";
	var data_gaps_identified_gcd_ps="";
	var data_gaps_filled_gcd_ps="";
	$(".pvt_analysis").keyup(function() {
		total_volume_gcd_ps=$("#total_volume_gcd_ps").val();
		data_loaded_month_gcd_ps=$("#data_loaded_month_gcd_ps").val();
		cumulative_data_load_gcd_ps=$("#cumulative_loaded_gcd_ps").val();
		cumulative_data_validated_gcd_ps=$("#cumulative_validated_gcd_ps").val();
		data_gaps_identified_gcd_ps=$("#data_identified_gcd_ps").val();
		data_gaps_filled_gcd_ps=$("#data_filled_gcd_ps").val(); 
		var dataString_gcd_ps='total_volume_gcd_ps='+total_volume_gcd_ps+'&data_loaded_month_gcd_ps='+data_loaded_month_gcd_ps+'&cumulative_data_load_gcd_ps='+cumulative_data_load_gcd_ps+'&cumulative_data_validated_gcd_ps='+cumulative_data_validated_gcd_ps+'&data_gaps_identified_gcd_ps='+data_gaps_identified_gcd_ps+'&data_gaps_filled_gcd_ps='+data_gaps_filled_gcd_ps;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_gcd_ps
			});
		});
	});
	//GEO-CHEMICAL DATA --> PVT ANALYSIS
	
	//PRODUCTION DATA --> FIELD PRODUCTION
	var total_volume_pd_fp="";
	var data_loaded_month_pd_fp="";
	var cumulative_data_load_pd_fp="";
	var cumulative_data_validated_pd_fp="";
	var data_gaps_identified_pd_fp="";
	var data_gaps_filled_pd_fp="";
	$(".field_production").keyup(function() {
		total_volume_pd_fp=$("#total_volume_pd_fp").val();
		data_loaded_month_pd_fp=$("#data_loaded_month_pd_fp").val();
		cumulative_data_load_pd_fp=$("#cumulative_loaded_pd_fp").val();
		cumulative_data_validated_pd_fp=$("#cumulative_validated_pd_fp").val();
		data_gaps_identified_pd_fp=$("#data_identified_pd_fp").val();
		data_gaps_filled_pd_fp=$("#data_filled_pd_fp").val(); 
		var dataString_pd_fp='total_volume_pd_fp='+total_volume_pd_fp+'&data_loaded_month_pd_fp='+data_loaded_month_pd_fp+'&cumulative_data_load_pd_fp='+cumulative_data_load_pd_fp+'&cumulative_data_validated_pd_fp='+cumulative_data_validated_pd_fp+'&data_gaps_identified_pd_fp='+data_gaps_identified_pd_fp+'&data_gaps_filled_pd_fp='+data_gaps_filled_pd_fp;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_pd_fp
			});
		});
	});
	//PRODUCTION DATA --> FIELD PRODUCTION
	
	//PRODUCTION DATA --> FIELD WATER INJECTION
	var total_volume_pd_fwi="";
	var data_loaded_month_pd_fwi="";
	var cumulative_data_load_pd_fwi="";
	var cumulative_data_validated_pd_fwi="";
	var data_gaps_identified_pd_fwi="";
	var data_gaps_filled_pd_fwi="";
	$(".field_water_injection").keyup(function() {
		total_volume_pd_fwi=$("#total_volume_pd_fwi").val();
		data_loaded_month_pd_fwi=$("#data_loaded_month_pd_fwi").val();
		cumulative_data_load_pd_fwi=$("#cumulative_loaded_pd_fwi").val();
		cumulative_data_validated_pd_fwi=$("#cumulative_validated_pd_fwi").val();
		data_gaps_identified_pd_fwi=$("#data_identified_pd_fwi").val();
		data_gaps_filled_pd_fwi=$("#data_filled_pd_fwi").val(); 
		var dataString_pd_fwi='total_volume_pd_fwi='+total_volume_pd_fwi+'&data_loaded_month_pd_fwi='+data_loaded_month_pd_fwi+'&cumulative_data_load_pd_fwi='+cumulative_data_load_pd_fwi+'&cumulative_data_validated_pd_fwi='+cumulative_data_validated_pd_fwi+'&data_gaps_identified_pd_fwi='+data_gaps_identified_pd_fwi+'&data_gaps_filled_pd_fwi='+data_gaps_filled_pd_fwi;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_pd_fwi
			});
		});
	});
	//PRODUCTION DATA --> FIELD WATER INJECTION
	
	//PRODUCTION DATA --> WORKOVER HISTORY
	var total_volume_pd_wh="";
	var data_loaded_month_pd_wh="";
	var cumulative_data_load_pd_wh="";
	var cumulative_data_validated_pd_wh="";
	var data_gaps_identified_pd_wh="";
	var data_gaps_filled_pd_wh="";
	$(".workover_history").keyup(function() {
		total_volume_pd_wh=$("#total_volume_pd_wh").val();
		data_loaded_month_pd_wh=$("#data_loaded_month_pd_wh").val();
		cumulative_data_load_pd_wh=$("#cumulative_loaded_pd_wh").val();
		cumulative_data_validated_pd_wh=$("#cumulative_validated_pd_wh").val();
		data_gaps_identified_pd_wh=$("#data_identified_pd_wh").val();
		data_gaps_filled_pd_wh=$("#data_filled_pd_wh").val(); 
		var dataString_pd_wh='total_volume_pd_wh='+total_volume_pd_wh+'&data_loaded_month_pd_wh='+data_loaded_month_pd_wh+'&cumulative_data_load_pd_wh='+cumulative_data_load_pd_wh+'&cumulative_data_validated_pd_wh='+cumulative_data_validated_pd_wh+'&data_gaps_identified_pd_wh='+data_gaps_identified_pd_wh+'&data_gaps_filled_pd_wh='+data_gaps_filled_pd_wh;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_pd_wh
			});
		});
	});
	//PRODUCTION DATA --> WORKOVER HISTORY
	
	//PRODUCTION DATA --> WSS
	var total_volume_pd_wss="";
	var data_loaded_month_pd_wss="";
	var cumulative_data_load_pd_wss="";
	var cumulative_data_validated_pd_wss="";
	var data_gaps_identified_pd_wss="";
	var data_gaps_filled_pd_wss="";
	$(".wss").keyup(function() {
		total_volume_pd_wss=$("#total_volume_pd_wss").val();
		data_loaded_month_pd_wss=$("#data_loaded_month_pd_wss").val();
		cumulative_data_load_pd_wss=$("#cumulative_loaded_pd_wss").val();
		cumulative_data_validated_pd_wss=$("#cumulative_validated_pd_wss").val();
		data_gaps_identified_pd_wss=$("#data_identified_pd_wss").val();
		data_gaps_filled_pd_wss=$("#data_filled_pd_wss").val(); 
		var dataString_pd_wss='total_volume_pd_wss='+total_volume_pd_wss+'&data_loaded_month_pd_wss='+data_loaded_month_pd_wss+'&cumulative_data_load_pd_wss='+cumulative_data_load_pd_wss+'&cumulative_data_validated_pd_wss='+cumulative_data_validated_pd_wss+'&data_gaps_identified_pd_wss='+data_gaps_identified_pd_wss+'&data_gaps_filled_pd_wss='+data_gaps_filled_pd_wss;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_pd_wss
			});
		});
	});
	//PRODUCTION DATA --> WSS
	
	//PRODUCTION DATA --> GAS UTILIZATION
	var total_volume_pd_gu="";
	var data_loaded_month_pd_gu="";
	var cumulative_data_load_pd_gu="";
	var cumulative_data_validated_pd_gu="";
	var data_gaps_identified_pd_gu="";
	var data_gaps_filled_pd_gu="";
	$(".gas_utilization").keyup(function() {
		total_volume_pd_gu=$("#total_volume_pd_gu").val();
		data_loaded_month_pd_gu=$("#data_loaded_month_pd_gu").val();
		cumulative_data_load_pd_gu=$("#cumulative_loaded_pd_gu").val();
		cumulative_data_validated_pd_gu=$("#cumulative_validated_pd_gu").val();
		data_gaps_identified_pd_gu=$("#data_identified_pd_gu").val();
		data_gaps_filled_pd_gu=$("#data_filled_pd_gu").val(); 
		var dataString_pd_gu='total_volume_pd_gu='+total_volume_pd_gu+'&data_loaded_month_pd_gu='+data_loaded_month_pd_gu+'&cumulative_data_load_pd_gu='+cumulative_data_load_pd_gu+'&cumulative_data_validated_pd_gu='+cumulative_data_validated_pd_gu+'&data_gaps_identified_pd_gu='+data_gaps_identified_pd_gu+'&data_gaps_filled_pd_gu='+data_gaps_filled_pd_gu;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_pd_gu
			});
		});
	});
	//PRODUCTION DATA --> GAS UTILIZATION
	
	//PRODUCTION DATA --> VALUE ADDED PRODUCT
	var total_volume_pd_vap="";
	var data_loaded_month_pd_vap="";
	var cumulative_data_load_pd_vap="";
	var cumulative_data_validated_pd_vap="";
	var data_gaps_identified_pd_vap="";
	var data_gaps_filled_pd_vap="";
	$(".value_added_product").keyup(function() {
		total_volume_pd_vap=$("#total_volume_pd_vap").val();
		data_loaded_month_pd_vap=$("#data_loaded_month_pd_vap").val();
		cumulative_data_load_pd_vap=$("#cumulative_loaded_pd_vap").val();
		cumulative_data_validated_pd_vap=$("#cumulative_validated_pd_vap").val();
		data_gaps_identified_pd_vap=$("#data_identified_pd_vap").val();
		data_gaps_filled_pd_vap=$("#data_filled_pd_vap").val(); 
		var dataString_pd_vap='total_volume_pd_vap='+total_volume_pd_vap+'&data_loaded_month_pd_vap='+data_loaded_month_pd_vap+'&cumulative_data_load_pd_vap='+cumulative_data_load_pd_vap+'&cumulative_data_validated_pd_vap='+cumulative_data_validated_pd_vap+'&data_gaps_identified_pd_vap='+data_gaps_identified_pd_vap+'&data_gaps_filled_pd_vap='+data_gaps_filled_pd_vap;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_pd_vap
			});
		});
	});
	//PRODUCTION DATA --> VALUE ADDED PRODUCT
	
	//PRODUCTION DATA --> PIPELINE DATA
	var total_volume_pd_pd="";
	var data_loaded_month_pd_pd="";
	var cumulative_data_load_pd_pd="";
	var cumulative_data_validated_pd_pd="";
	var data_gaps_identified_pd_pd="";
	var data_gaps_filled_pd_pd="";
	$(".pipeline_data").keyup(function() {
		total_volume_pd_pd=$("#total_volume_pd_pd").val();
		data_loaded_month_pd_pd=$("#data_loaded_month_pd_pd").val();
		cumulative_data_load_pd_pd=$("#cumulative_loaded_pd_pd").val();
		cumulative_data_validated_pd_pd=$("#cumulative_validated_pd_pd").val();
		data_gaps_identified_pd_pd=$("#data_identified_pd_pd").val();
		data_gaps_filled_pd_pd=$("#data_filled_pd_pd").val(); 
		var dataString_pd_pd='total_volume_pd_pd='+total_volume_pd_pd+'&data_loaded_month_pd_pd='+data_loaded_month_pd_pd+'&cumulative_data_load_pd_pd='+cumulative_data_load_pd_pd+'&cumulative_data_validated_pd_pd='+cumulative_data_validated_pd_pd+'&data_gaps_identified_pd_pd='+data_gaps_identified_pd_pd+'&data_gaps_filled_pd_pd='+data_gaps_filled_pd_pd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_pd_pd
			});
		});
	});
	//PRODUCTION DATA --> PIPELINE DATA

	//PRODUCTION DATA --> ARTIFICIAL LIFT
	var total_volume_pd_al="";
	var data_loaded_month_pd_al="";
	var cumulative_data_load_pd_al="";
	var cumulative_data_validated_pd_al="";
	var data_gaps_identified_pd_al="";
	var data_gaps_filled_pd_al="";
	$(".artificial_lift").keyup(function() {
		total_volume_pd_al=$("#total_volume_pd_al").val();
		data_loaded_month_pd_al=$("#data_loaded_month_pd_al").val();
		cumulative_data_load_pd_al=$("#cumulative_loaded_pd_al").val();
		cumulative_data_validated_pd_al=$("#cumulative_validated_pd_al").val();
		data_gaps_identified_pd_al=$("#data_identified_pd_al").val();
		data_gaps_filled_pd_al=$("#data_filled_pd_al").val(); 
		var dataString_pd_al='total_volume_pd_al='+total_volume_pd_al+'&data_loaded_month_pd_al='+data_loaded_month_pd_al+'&cumulative_data_load_pd_al='+cumulative_data_load_pd_al+'&cumulative_data_validated_pd_al='+cumulative_data_validated_pd_al+'&data_gaps_identified_pd_al='+data_gaps_identified_pd_al+'&data_gaps_filled_pd_al='+data_gaps_filled_pd_al;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_pd_al
			});
		});
	});
	//PRODUCTION DATA --> ARTIFICIAL LIFT
	
	//PRODUCTION DATA --> PRODUCTION TESTING
	var total_volume_pd_pt="";
	var data_loaded_month_pd_pt="";
	var cumulative_data_load_pd_pt="";
	var cumulative_data_validated_pd_pt="";
	var data_gaps_identified_pd_pt="";
	var data_gaps_filled_pd_pt="";
	$(".production_testing").keyup(function() {
		total_volume_pd_pt=$("#total_volume_pd_pt").val();
		data_loaded_month_pd_pt=$("#data_loaded_month_pd_pt").val();
		cumulative_data_load_pd_pt=$("#cumulative_loaded_pd_pt").val();
		cumulative_data_validated_pd_pt=$("#cumulative_validated_pd_pt").val();
		data_gaps_identified_pd_pt=$("#data_identified_pd_pt").val();
		data_gaps_filled_pd_pt=$("#data_filled_pd_pt").val(); 
		var dataString_pd_pt='total_volume_pd_pt='+total_volume_pd_pt+'&data_loaded_month_pd_pt='+data_loaded_month_pd_pt+'&cumulative_data_load_pd_pt='+cumulative_data_load_pd_pt+'&cumulative_data_validated_pd_pt='+cumulative_data_validated_pd_pt+'&data_gaps_identified_pd_pt='+data_gaps_identified_pd_pt+'&data_gaps_filled_pd_pt='+data_gaps_filled_pd_pt;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_pd_pt
			});
		});
	});
	//PRODUCTION DATA --> GAS UTILIZATION
	
	//RESERVOIR DATA --> PRESSURE DATA
	var total_volume_rd_pd="";
	var data_loaded_month_wells_rd_pd="";
	var data_loaded_month_records_rd_pd="";
	var cumulative_data_load_wells_rd_pd="";
	var cumulative_data_load_records_rd_pd="";
	var cumulative_data_validated_wells_rd_pd="";
	var data_gaps_identified_wells_rd_pd="";
	var data_gaps_filled_wells_rd_pd="";
	$(".pressure_data").keyup(function() {
		total_volume_rd_pd=$("#total_volume_rd_pd").val();
		data_loaded_month_wells_rd_pd=$("#data_loaded_month_wells_rd_pd").val();
		data_loaded_month_records_rd_pd=$("#data_loaded_month_records_rd_pd").val();
		cumulative_data_load_wells_rd_pd=$("#cumulative_loaded_wells_rd_pd").val();
		cumulative_data_load_records_rd_pd=$("#cumulative_loaded_records_rd_pd").val();
		cumulative_data_validated_wells_rd_pd=$("#cumulative_validated_wells_rd_pd").val();
		data_gaps_identified_wells_rd_pd=$("#data_identified_welss_rd_pd").val();
		data_gaps_filled_wells_rd_pd=$("#data_filled_wells_rd_pd").val(); 
		var dataString_rd_pd='total_volume_rd_pd='+total_volume_rd_pd+'&data_loaded_month__wells_rd_pd='+data_loaded_month_wells_rd_pd+'&data_loaded_month__records_rd_pd='+data_loaded_month_records_rd_pd+'&cumulative_data_load_wells_rd_pd='+cumulative_data_load_wells_rd_pd+'&cumulative_data_load_records_rd_pd='+cumulative_data_load_records_rd_pd+'&cumulative_data_validated_wells_rd_pd='+cumulative_data_validated_wells_rd_pd+'&data_gaps_identified_wells_rd_pd='+data_gaps_identified_wells_rd_pd+'&data_gaps_filled_wells_rd_pd='+data_gaps_filled_wells_rd_pd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_rd_pd
			});
		});
	});
	//RESERVOIR DATA --> PRESSURE DATA
	
	//RESERVOIR DATA --> BEAN STUDY
	var total_volume_rd_bs="";
	var data_loaded_month_wells_rd_bs="";
	var data_loaded_month_records_rd_bs="";
	var cumulative_data_load_wells_rd_bs="";
	var cumulative_data_load_records_rd_bs="";
	var cumulative_data_validated_wells_rd_bs="";
	var data_gaps_identified_wells_rd_bs="";
	var data_gaps_filled_wells_rd_bs="";
	$(".bean_study").keyup(function() {
		total_volume_rd_bs=$("#total_volume_rd_bs").val();
		data_loaded_month_wells_rd_bs=$("#data_loaded_month_wells_rd_bs").val();
		data_loaded_month_records_rd_bs=$("#data_loaded_month_records_rd_bs").val();
		cumulative_data_load_wells_rd_bs=$("#cumulative_loaded_wells_rd_bs").val();
		cumulative_data_load_records_rd_bs=$("#cumulative_loaded_records_rd_bs").val();
		cumulative_data_validated_wells_rd_bs=$("#cumulative_validated_wells_rd_bs").val();
		data_gaps_identified_wells_rd_bs=$("#data_identified_welss_rd_bs").val();
		data_gaps_filled_wells_rd_bs=$("#data_filled_wells_rd_bs").val(); 
		var dataString_rd_bs='total_volume_rd_bs='+total_volume_rd_bs+'&data_loaded_month__wells_rd_bs='+data_loaded_month_wells_rd_bs+'&data_loaded_month__records_rd_bs='+data_loaded_month_records_rd_bs+'&cumulative_data_load_wells_rd_bs='+cumulative_data_load_wells_rd_bs+'&cumulative_data_load_records_rd_bs='+cumulative_data_load_records_rd_bs+'&cumulative_data_validated_wells_rd_bs='+cumulative_data_validated_wells_rd_bs+'&data_gaps_identified_wells_rd_bs='+data_gaps_identified_wells_rd_bs+'&data_gaps_filled_wells_rd_bs='+data_gaps_filled_wells_rd_bs;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_rd_bs
			});
		});
	});
	//RESERVOIR DATA --> BEAN STUDY

	//RESERVOIR DATA --> BHS INTERPRETATION DATA
	var total_volume_rd_bid="";
	var data_loaded_month_wells_rd_bid="";
	var data_loaded_month_records_rd_bid="";
	var cumulative_data_load_wells_rd_bid="";
	var cumulative_data_load_records_rd_bid="";
	var cumulative_data_validated_wells_rd_bid="";
	var data_gaps_identified_wells_rd_bid="";
	var data_gaps_filled_wells_rd_bid="";
	$(".bhs_interpretation_data").keyup(function() {
		total_volume_rd_bid=$("#total_volume_rd_bid").val();
		data_loaded_month_wells_rd_bid=$("#data_loaded_month_wells_rd_bid").val();
		data_loaded_month_records_rd_bid=$("#data_loaded_month_records_rd_bid").val();
		cumulative_data_load_wells_rd_bid=$("#cumulative_loaded_wells_rd_bid").val();
		cumulative_data_load_records_rd_bid=$("#cumulative_loaded_records_rd_bid").val();
		cumulative_data_validated_wells_rd_bid=$("#cumulative_validated_wells_rd_bid").val();
		data_gaps_identified_wells_rd_bid=$("#data_identified_welss_rd_bid").val();
		data_gaps_filled_wells_rd_bid=$("#data_filled_wells_rd_bid").val(); 
		var dataString_rd_bid='total_volume_rd_bid='+total_volume_rd_bid+'&data_loaded_month__wells_rd_bid='+data_loaded_month_wells_rd_bid+'&data_loaded_month__records_rd_bid='+data_loaded_month_records_rd_bid+'&cumulative_data_load_wells_rd_bid='+cumulative_data_load_wells_rd_bid+'&cumulative_data_load_records_rd_bid='+cumulative_data_load_records_rd_bid+'&cumulative_data_validated_wells_rd_bid='+cumulative_data_validated_wells_rd_bid+'&data_gaps_identified_wells_rd_bid='+data_gaps_identified_wells_rd_bid+'&data_gaps_filled_wells_rd_bid='+data_gaps_filled_wells_rd_bid;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_rd_bid
			});
		});
	});
	//RESERVOIR DATA --> BHS INTERPRETATION DATA
	
	//RESERVOIR DATA --> BHS SAMPLING DATA
	var total_volume_rd_bsd="";
	var data_loaded_month_wells_rd_bsd="";
	var data_loaded_month_records_rd_bsd="";
	var cumulative_data_load_wells_rd_bsd="";
	var cumulative_data_load_records_rd_bsd="";
	var cumulative_data_validated_wells_rd_bsd="";
	var data_gaps_identified_wells_rd_bsd="";
	var data_gaps_filled_wells_rd_bsd="";
	$(".bhs_sampling_data").keyup(function() {
		total_volume_rd_bsd=$("#total_volume_rd_bsd").val();
		data_loaded_month_wells_rd_bsd=$("#data_loaded_month_wells_rd_bsd").val();
		data_loaded_month_records_rd_bsd=$("#data_loaded_month_records_rd_bsd").val();
		cumulative_data_load_wells_rd_bsd=$("#cumulative_loaded_wells_rd_bsd").val();
		cumulative_data_load_records_rd_bsd=$("#cumulative_loaded_records_rd_bsd").val();
		cumulative_data_validated_wells_rd_bsd=$("#cumulative_validated_wells_rd_bsd").val();
		data_gaps_identified_wells_rd_bsd=$("#data_identified_welss_rd_bsd").val();
		data_gaps_filled_wells_rd_bsd=$("#data_filled_wells_rd_bsd").val(); 
		var dataString_rd_bsd='total_volume_rd_bsd='+total_volume_rd_bsd+'&data_loaded_month__wells_rd_bsd='+data_loaded_month_wells_rd_bsd+'&data_loaded_month__records_rd_bsd='+data_loaded_month_records_rd_bsd+'&cumulative_data_load_wells_rd_bsd='+cumulative_data_load_wells_rd_bsd+'&cumulative_data_load_records_rd_bsd='+cumulative_data_load_records_rd_bsd+'&cumulative_data_validated_wells_rd_bsd='+cumulative_data_validated_wells_rd_bsd+'&data_gaps_identified_wells_rd_bsd='+data_gaps_identified_wells_rd_bsd+'&data_gaps_filled_wells_rd_bsd='+data_gaps_filled_wells_rd_bsd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_rd_bsd
			});
		});
	});
	//RESERVOIR DATA --> BHS SAMPLING DATA
	
	//RESERVOIR DATA --> GAS LIFT SURVEY
	var total_volume_rd_gls="";
	var data_loaded_month_wells_rd_gls="";
	var data_loaded_month_records_rd_gls="";
	var cumulative_data_load_wells_rd_gls="";
	var cumulative_data_load_records_rd_gls="";
	var cumulative_data_validated_wells_rd_gls="";
	var data_gaps_identified_wells_rd_gls="";
	var data_gaps_filled_wells_rd_gls="";
	$(".gas_lift_survey").keyup(function() {
		total_volume_rd_gls=$("#total_volume_rd_gls").val();
		data_loaded_month_wells_rd_gls=$("#data_loaded_month_wells_rd_gls").val();
		data_loaded_month_records_rd_gls=$("#data_loaded_month_records_rd_gls").val();
		cumulative_data_load_wells_rd_gls=$("#cumulative_loaded_wells_rd_gls").val();
		cumulative_data_load_records_rd_gls=$("#cumulative_loaded_records_rd_gls").val();
		cumulative_data_validated_wells_rd_gls=$("#cumulative_validated_wells_rd_gls").val();
		data_gaps_identified_wells_rd_gls=$("#data_identified_welss_rd_gls").val();
		data_gaps_filled_wells_rd_gls=$("#data_filled_wells_rd_gls").val(); 
		var dataString_rd_gls='total_volume_rd_gls='+total_volume_rd_gls+'&data_loaded_month__wells_rd_gls='+data_loaded_month_wells_rd_gls+'&data_loaded_month__records_rd_gls='+data_loaded_month_records_rd_gls+'&cumulative_data_load_wells_rd_gls='+cumulative_data_load_wells_rd_gls+'&cumulative_data_load_records_rd_gls='+cumulative_data_load_records_rd_gls+'&cumulative_data_validated_wells_rd_gls='+cumulative_data_validated_wells_rd_gls+'&data_gaps_identified_wells_rd_gls='+data_gaps_identified_wells_rd_gls+'&data_gaps_filled_wells_rd_gls='+data_gaps_filled_wells_rd_gls;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_rd_gls
			});
		});
	});
	//RESERVOIR DATA --> GAS LIFT SURVEY
	
	//RESERVOIR DATA --> ECHOMETER SURVEY
	var total_volume_rd_es="";
	var data_loaded_month_wells_rd_es="";
	var data_loaded_month_records_rd_es="";
	var cumulative_data_load_wells_rd_es="";
	var cumulative_data_load_records_rd_es="";
	var cumulative_data_validated_wells_rd_es="";
	var data_gaps_identified_wells_rd_es="";
	var data_gaps_filled_wells_rd_es="";
	$(".echometer_survey").keyup(function() {
		total_volume_rd_es=$("#total_volume_rd_es").val();
		data_loaded_month_wells_rd_es=$("#data_loaded_month_wells_rd_es").val();
		data_loaded_month_records_rd_es=$("#data_loaded_month_records_rd_es").val();
		cumulative_data_load_wells_rd_es=$("#cumulative_loaded_wells_rd_es").val();
		cumulative_data_load_records_rd_es=$("#cumulative_loaded_records_rd_es").val();
		cumulative_data_validated_wells_rd_es=$("#cumulative_validated_wells_rd_es").val();
		data_gaps_identified_wells_rd_es=$("#data_identified_welss_rd_es").val();
		data_gaps_filled_wells_rd_es=$("#data_filled_wells_rd_es").val(); 
		var dataString_rd_es='total_volume_rd_es='+total_volume_rd_es+'&data_loaded_month__wells_rd_es='+data_loaded_month_wells_rd_es+'&data_loaded_month__records_rd_es='+data_loaded_month_records_rd_es+'&cumulative_data_load_wells_rd_es='+cumulative_data_load_wells_rd_es+'&cumulative_data_load_records_rd_es='+cumulative_data_load_records_rd_es+'&cumulative_data_validated_wells_rd_es='+cumulative_data_validated_wells_rd_es+'&data_gaps_identified_wells_rd_es='+data_gaps_identified_wells_rd_es+'&data_gaps_filled_wells_rd_es='+data_gaps_filled_wells_rd_es;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_rd_es
			});
		});
	});
	//RESERVOIR DATA --> ECHOMETER SURVEY
	
	//RESERVOIR DATA --> PVT STUDIES
	var total_volume_rd_ps="";
	var data_loaded_month_wells_rd_ps="";
	var data_loaded_month_records_rd_ps="";
	var cumulative_data_load_wells_rd_ps="";
	var cumulative_data_load_records_rd_ps="";
	var cumulative_data_validated_wells_rd_ps="";
	var data_gaps_identified_wells_rd_ps="";
	var data_gaps_filled_wells_rd_ps="";
	$(".pvt_studies").keyup(function() {
		total_volume_rd_ps=$("#total_volume_rd_ps").val();
		data_loaded_month_wells_rd_ps=$("#data_loaded_month_wells_rd_ps").val();
		data_loaded_month_records_rd_ps=$("#data_loaded_month_records_rd_ps").val();
		cumulative_data_load_wells_rd_ps=$("#cumulative_loaded_wells_rd_ps").val();
		cumulative_data_load_records_rd_ps=$("#cumulative_loaded_records_rd_ps").val();
		cumulative_data_validated_wells_rd_ps=$("#cumulative_validated_wells_rd_ps").val();
		data_gaps_identified_wells_rd_ps=$("#data_identified_welss_rd_ps").val();
		data_gaps_filled_wells_rd_ps=$("#data_filled_wells_rd_ps").val(); 
		var dataString_rd_ps='total_volume_rd_ps='+total_volume_rd_ps+'&data_loaded_month__wells_rd_ps='+data_loaded_month_wells_rd_ps+'&data_loaded_month__records_rd_ps='+data_loaded_month_records_rd_ps+'&cumulative_data_load_wells_rd_ps='+cumulative_data_load_wells_rd_ps+'&cumulative_data_load_records_rd_ps='+cumulative_data_load_records_rd_ps+'&cumulative_data_validated_wells_rd_ps='+cumulative_data_validated_wells_rd_ps+'&data_gaps_identified_wells_rd_ps='+data_gaps_identified_wells_rd_ps+'&data_gaps_filled_wells_rd_ps='+data_gaps_filled_wells_rd_ps;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString_rd_ps
			});
		});
	});
	//RESERVOIR DATA --> PVT STUDIES
	
	//DRILLING DATA
	var total_volume_dd="";
	var data_loaded_month_dd="";
	var cumulative_data_load_dd="";
	var cumulative_data_validated_dd="";
	var data_gaps_identified_dd="";
	var data_gaps_filled_dd="";
	$(".edit_drilling_data").keyup(function() {
		var site_id_dd=$(this).attr('id');
		total_volume_dd=$("#total_volume_dd_"+site_id_dd).val();
		data_loaded_month_dd=$("#data_loaded_month_dd_"+site_id_dd).val();
		cumulative_data_load_dd=$("#cumulative_loaded_dd_"+site_id_dd).val();
		cumulative_data_validated_dd=$("#cumulative_validated_dd_"+site_id_dd).val();
		data_gaps_identified_dd=$("#data_identified_dd_"+site_id_dd).val();
		data_gaps_filled_dd=$("#data_filled_dd_"+site_id_dd).val(); 
		var dataString_dd='site_id_dd='+site_id_dd+'&total_volume_dd='+total_volume_dd+'&data_loaded_month_dd='+data_loaded_month_dd+'&cumulative_data_load_dd='+cumulative_data_load_dd+'&cumulative_data_validated_dd='+cumulative_data_validated_dd+'&data_gaps_identified_dd='+data_gaps_identified_dd+'&data_gaps_filled_dd='+data_gaps_filled_dd;
		$('[id^=b]').click(function(){
			$.ajax({
				type : "POST" ,
				url : "db_save_well_data.php" ,
				data : dataString 
			});
		});
	});
	//DRILLING DATA
});  // End of ready function

