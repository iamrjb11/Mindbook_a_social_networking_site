$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});

// sandbox disable popups
if (window.self !== window.top && window.name!="view1") {;
  window.alert = function(){/*disable alert*/};
  window.confirm = function(){/*disable confirm*/};
  window.prompt = function(){/*disable prompt*/};
  window.open = function(){/*disable open*/};
}
            
// prevent href=# click jump
document.addEventListener("DOMContentLoaded", function() {
  var links = document.getElementsByTagName("A");
  for(var i=0; i < links.length; i++) {
    if(links[i].href.indexOf('#')!=-1) {
      links[i].addEventListener("click", function(e) {
      console.debug("prevent href=# click");
          if (this.hash) {
            if (this.hash=="#") {
              e.preventDefault();
              return false;
            }
            else {
              /*
              var el = document.getElementById(this.hash.replace(/#/, ""));
              if (el) {
                el.scrollIntoView(true);
              }
              */
            }
          }
          return false;
      })
    }
  }
}, false);

function SetAllCheckBoxes(FormName, FieldName, CheckValue)
{
  if(!document.forms[FormName])
    return;
  var objCheckBoxes = document.forms[FormName].elements[FieldName];
  if(!objCheckBoxes)
    return;
  var countCheckBoxes = objCheckBoxes.length;
  if(!countCheckBoxes)
    objCheckBoxes.checked = CheckValue;
  else
    // set the check value for all check boxes
    for(var i = 0; i < countCheckBoxes; i++)
      objCheckBoxes[i].checked = CheckValue;
}

/*
 *  onChange event handler
 * getting the url and parsing and rebuilding it with selection information and finally redirect
 */
function onChangeEventHandler(event,obj){
   if(event != null){
    var url = window.location.href;
    url = url.indexOf("?") ? url.substring(0,url.indexOf("?")): url;  
    window.location = url + '?edit='+obj.value;
   }  
}

function onChangeEvent(event,obj)
{
  // console.log("heet");
  if(event != null)
  {
    // alert('not null event');
   // document.getElementById('innerform').innerHTML = "";
    var form = document.getElementById('innerform');
    console.log("html = "+form);
    var toRemove = document.getElementsByClassName('form-group');
    console.log(toRemove.length);
    if(toRemove.length > 1)
    {
      for(var i =1;i<toRemove.length;++i)
      {
        console.log(i);
         toRemove[i].innerHTML = "";
         toRemove[i].style.display = 'none';
         // form.removeChild(toRemove[i]);

      }
    }
    // document.getElementById('innerform').innerHTML = "";
   //alert("selected = "+ obj.value);
    addFields(form,"University Identity","txtUniversityID","text");
    addFields(form,"First Name","txtFirstName","text");
    
    addFields(form,"Last Name","txtLastName","text");
    addFields(form,"Age","txtAge","text");
    addSelectOption(form,"Male","Female");
    addFields(form,"Email","txtEmail","text");
    addFields(form,"Password","txtPassword","text");
    if(obj.value=="Doctor"){
      addFields(form,"Degrees","txtDegrees","text");
      addFields(form,"Specialist","txtSpecialist","text");
      addFields(form,"Working Address","txtWorkAddress","text");
      addFields(form,"Day Shedule","txtDayShedule","text");
      addFields(form,"Time Shedule","txtTimeShedule","text");
    }

    addSubmitBtn(form,"request","Submit Request","submit");
  }
  else
  {
    alert('null event');
  }
}

function addFields(form,labels,names,types)
{
    var newForm = document.createElement('div');
    newForm.className = 'form-group';

    var label = document.createElement('label');
    label.className = "control-label col-sm-4";
    label.innerHTML = labels+" : ";
    label.setAttribute('for',names);  
    var inDiv = document.createElement('div');
    inDiv.className = "col-sm-6";
    var i1 = document.createElement('input');
    i1.type = types;
    i1.name = names;
    i1.className = "form-control";
    i1.setAttribute("placeholder",labels);
    i1.id = names;
    inDiv.appendChild(i1);
    newForm.appendChild(label);
    newForm.appendChild(inDiv);
    form.appendChild(newForm);
}
function addSelectOption(form,op1,op2){
    var newForm = document.createElement('div');
    newForm.className = 'form-group';
    var label = document.createElement('label');
    label.className = "control-label col-sm-4";
    label.innerHTML = "Sex : ";
    var inDiv = document.createElement('div');
    inDiv.className = "col-sm-6";

    var createSelect = document.createElement('select');
    
    createSelect.name= "selectSex";
    createSelect.className= "form-control";

    var createOption1 = document.createElement('option');
    createOption1.innerHTML="-- Select --";
    createOption1.selected= "disabled";
    var createOption2 = document.createElement('option');
    createOption2.value=op1;
    createOption2.innerHTML=op1;
    var createOption3 = document.createElement('option');
    createOption3.value=op2;
    createOption3.innerHTML=op2;

    newForm.appendChild(label);
    createSelect.appendChild(createOption1);

    createSelect.appendChild(createOption2);

    createSelect.appendChild(createOption3);
    inDiv.appendChild(createSelect);
    newForm.appendChild(inDiv);
    form.appendChild(newForm);

}
function addSubmitBtn(form,names,value,types){
  var newForm = document.createElement('div');
    newForm.className = 'form-group';
    var inDiv = document.createElement('div');
    inDiv.className = "col-sm-offset-2 col-sm-10";
    var i1 = document.createElement('input');
    i1.type = types;
    i1.name = names;
    i1.value = value;
    inDiv.appendChild(i1);
    newForm.appendChild(inDiv);
    form.appendChild(newForm);

}

var loaded = 0;

if(loaded === 0)
{
  //console.log('if endif');
  loadForm();
}

function loadForm()
{
  //alert('Loaded');
  loaded = 1;

}

//Medical Service
var medicineSrlN=1,check;

document.cookie = "medicineSrlN = " + medicineSrlN;

function createMedicineInfo(){
  medicineSrlN=medicineSrlN+1;
  document.cookie = "medicineSrlN = " + medicineSrlN;

  check=0;
  var table = document.getElementById('tbl');
  table.className = "table";
  var newTR = document.createElement('tr');
  newTR.className="info";
  addTR_label(table,newTR,medicineSrlN);
  addTD_Medicine(table,newTR,"medicineN"+medicineSrlN,"text");

   addTD_Medicine(table,newTR,"beforeEat"+medicineSrlN,"text");
   addTD_Medicine(table,newTR,"afterEat"+medicineSrlN,"text");
  // addTD_Medicine(table,newTR,"beforeNoon"+medicineSrlN,"text");
  // addTD_Medicine(table,newTR,"afterNoon"+medicineSrlN,"text");
  // addTD_Medicine(table,newTR,"beforeNight"+medicineSrlN,"text");
  // addTD_Medicine(table,newTR,"afterNight"+medicineSrlN,"text");
  //addTR_CheckBox();

  addTD_Medicine(table,newTR,"quantity"+medicineSrlN,"text");
  //window.alert(srlN);

}

var testSrlN=1;
document.cookie = "testSrlN = " + testSrlN;

function createTestInfo(){

  testSrlN=testSrlN+1;
  document.cookie = "testSrlN = " + testSrlN;
  var table = document.getElementById('tbl2');
  table.className = "table";
  var newTR = document.createElement('tr');
  newTR.className= "info";
  addTR_label(table,newTR,testSrlN);
  addTD_Test(table,newTR,"testN"+testSrlN,"text");

}

function addSelect()
{
  // var x = "<select name="be" id="be">+
  //           <option value="0-0-0">0-0-0</option>+
  //           <option value="1-1-1">1-1-1</option>+
  //           <option value="1-0-1">1-0-1</option>+
  //           <option value="1-1-0">1-1-0</option>+
  //           <option value="0-1-1">0-1-1</option>+
  //           <option value="1-0-0">1-0-0</option>+
  //           <option value="0-1-0">0-1-0</option>+
  //           <option value="0-0-1">0-0-1</option>+
  //         </select>";
}

function addTR_label(tables,newtr,srlN){

    var newTD = document.createElement('td');
    var label = document.createElement('label');
    label.innerHTML=srlN;
    
    newTD.appendChild(label);
    newtr.appendChild(newTD);
    tables.appendChild(newtr);
}
function addTD_Medicine(tables,newtr,names,types){

    var newTD = document.createElement('td');
    var i1 = document.createElement('input');
    i1.type = types;
    i1.name = names;
    i1.className="form-control";

    newTD.appendChild(i1);
    newtr.appendChild(newTD);
    tables.appendChild(newtr);
    check=1;
}
function addTD_Test(tables,newtr,names,types){

    var newTD = document.createElement('td');
    var i1 = document.createElement('input');
    i1.type = types;
    i1.name = names;
    
    i1.className="form-control";
    i1.setAttribute('required','required');
    newTD.appendChild(i1);
    newtr.appendChild(newTD);
    tables.appendChild(newtr);
}
