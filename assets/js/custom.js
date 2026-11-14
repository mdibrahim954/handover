

$(document).ready(function(){

    setActiveMenu();
    setTimeout("setDatePicker()",2000);
});

function setActiveMenu(){
    var url = document.location.href;
    if(url.indexOf('order')>-1) {
        $('#liOrder').addClass('active');
        $('#Order').removeClass('collapse');
    }
    else if(url.indexOf('user')>-1) {
        $('#liUser').addClass('active');
        $('#User').removeClass('collapse');
    }
}

function setDatePicker()
{
    if($('#datePicker2').length>0) $('#datePicker2').datepicker();
    if($('#datePicker').length>0) $('#datePicker').datepicker();

    $('.datePicker').datepicker({});
}


function printContent(divID) {
    try
    {
        var data = document.getElementById(divID).innerHTML;
        var popupWindow = window.open('', 'printwin', 'width=900,height=700');
        popupWindow.document.write('<HTML>\n<HEAD>\n');
        popupWindow.document.write('<TITLE>Order</TITLE>\n');
        popupWindow.document.write('<URL></URL>\n');
        popupWindow.document.write("<link href='/assets/css/print.css' media='screen' rel='stylesheet' type='text/css' />\n");
        popupWindow.document.write("<link href='/assets/css/print.css' media='print' rel='stylesheet' type='text/css' />\n");
        popupWindow.document.write('<script>\n');
        popupWindow.document.write('function print_win(){\n');
        popupWindow.document.write('\nwindow.print();\n');
        popupWindow.document.write('\nwindow.close();\n');
        popupWindow.document.write('}\n');
        popupWindow.document.write('<\/script>\n');
        popupWindow.document.write('</HEAD>\n');
        popupWindow.document.write('<BODY onload="print_win()">\n');
        popupWindow.document.write(data);
        popupWindow.document.write('</BODY>\n');
        popupWindow.document.write('</HTML>\n');
        popupWindow.document.close();
    }
    catch (e)
    {
        alert(e.message);
    }
}


function printReport(divID,title) {
    try
    {
        var scH = document.documentElement.clientHeight+100;
        var scW = document.documentElement.clientWidth;

        var data = document.getElementById(divID).innerHTML;
        var popupWindow = window.open('', 'printwin',
              'left=' + (document.documentElement.clientWidth/2)-(scW/2) + ',top=0,width=' + scW + ',height=' + scH + ',toolbar=0,scrollbars=0,status=0');
        popupWindow.document.write('<HTML>\n<HEAD>\n');
        popupWindow.document.write('<TITLE>'+ title +'</TITLE>\n');
        popupWindow.document.write('<URL></URL>\n');
        popupWindow.document.write("<link href='/assets/css/print/print.css' media='screen' rel='stylesheet' type='text/css' />\n");
        popupWindow.document.write("<link href='/assets/css/print/print.css' media='print' rel='stylesheet' type='text/css' />\n");
        popupWindow.document.write('<script>\n');
        popupWindow.document.write('function print_win(){\n');
        popupWindow.document.write('\nwindow.print();\n');
        popupWindow.document.write('\nwindow.close();\n');
        popupWindow.document.write('}\n');
        popupWindow.document.write('<\/script>\n');
        popupWindow.document.write('</HEAD>\n');
        popupWindow.document.write('<BODY  style="page-break-after:always;height:1300px;width:1200px;"  onload="print_win()">\n');
        popupWindow.document.write(data);
        popupWindow.document.write('</BODY>\n');
        popupWindow.document.write('</HTML>\n');
        popupWindow.document.close();
    }
    catch (e)
    {
        alert(e.message);
    }
}


function printQRCode(url){
    document.getElementById('qrcode').innerHTML="";
    var qrcode = new QRCode("qrcode");
    qrcode.makeCode(url);
}


function printBarCode(text){
    //var text = $('#divBarcodeValue').text();
    JsBarcode("#qrcode", text, {
        lineColor: "#000",
        width: 2,
        height: 30,
        displayValue: false
    });
}


function showProgress(){
    $('#divProgressLine').show();
}
function hideProgress(){
    $('#divProgressLine').hide();
}