console.log("all ok");
var fdate="none";
var selectedDate = null;
$(function() {
	console.log("here");
   $( ".datepicker" ).datepicker();
  });

$(".datepicker").change(function() {
	//console.log("");
    fdate = $(this).datepicker("getDate");
    // $("#placeholder").text(date);
    var sd = fdate.toString();
	//console.log(sd);
	var drr = sd.split(" ");
	selectedDate = drr[2] + " " + drr[1] + " " + drr[3];
	//console.log(selectedDate);
});
//
//<a href="<?php echo $actual_link; ?>&testName=<?php echo $TestDetails->getTestName(); ?>&fileID=<?php echo $i+1; ?>">Upload</a>

// $("#uploadimage").on('submit',(function(e) {
// 	console.log('Uploading...');
// 	$.ajax({
//                 url: 'http://localhost/medical/upload.php', 
          
//                 cache: false,
//                 contentType: false,
//                 processData: false,
//                 data: new FormData(this),                         
//                 type: 'post',
//                 success: function(php_script_response){
//                     //alert(php_script_response);
//                     console.log(php_script_response);	
//                 }
//      });
// }));

function uploadFile(gid)
{
	console.log('Uploading...');
	var rid = "rep"+gid;
	var rid = "#"+rid;
	var file_data = $(rid).prop('files')[0];  
	//var gid = elm.id;
	var fname = file_data.name;
	var ext = fname.lastIndexOf('.');
	var ex ="";
	for(var i=ext;i<fname.length;++i)
	{
		ex += fname[i];
	}
	console.log(ex);



	var eld = document.getElementById("tst"+gid).value; 
	var elt = document.getElementById("pat"+gid).value;


	var newf = elt+"+"+eld+"+"+"1"+ex;

	var flink = "http://localhost/medical/uploadFiles/" + newf;

	console.log(flink);


	console.log(eld);
	console.log(elt);
	var status = document.getElementById('stat'+gid);
	status.innerHTML = 'Uploading...';
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('patientid', elt);
    form_data.append('testname', eld);
    form_data.append('seq', gid);

    var downlink = document.getElementById('innerlink'+gid);
    //var fname = elt+"+"+"eld1"
	// var el = document.getElementById("report");
	// var ufile = el.files[0];
	// var fdata = new FormData();
	// fdata.append('report',ufile);
	var link = status.parentNode.parentNode.nextSibling;
	$.ajax({
                url: 'http://localhost/medical/upload.php', 
                //dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    //alert(php_script_response);
                    //console.log(php_script_response);	
                    status.innerHTML = 'Upload Successfull!';
                    status.style.color = "green";
                    downlink.href = flink;
                    downlink.setAttribute('href',flink);
                    //console.log(downlink);
                }
     });
	 
}

function check(el)
{
	var did = el.parentNode.id;
	var sdate=fdate.toString();
	var darr = sdate.split(" ");
	// console.log(darr);
	console.log("id retrieved = :D"+did);
	console.log("selected doctor = "+doctors[did]);
	// console.log("date = "+sdate);
	///format = day month year
	//hrf += "?did="+doctors[did]+"&day="+darr[0]+"&date="+fdate;
	hrf += "?did="+doctors[did]+"&day="+darr[0]+"&date="+getMon(darr[1])+"/"+darr[2]+"/"+darr[3];
	console.log(hrf);
	window.location.href = hrf;
}

function getMon(mon)
{
	if(mon=="Jan") return 1;
	if(mon=="Feb") return 2;
	if(mon=="Mar") return 3;
	if(mon=="Apr") return 4;
	if(mon=="May") return 5;
	if(mon=="Jun") return 6;
	if(mon=="Jul") return 7;
	if(mon=="Aug") return 8;
	if(mon=="Sep") return 9;
	if(mon=="Oct") return 10;
	if(mon=="Nov") return 11;
	if(mon=="Dec") return 12;
}

