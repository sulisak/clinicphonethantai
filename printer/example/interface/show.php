<html>
<head>
<script src="jquery.min.js"></script>
<script src="html2canvas.js"></script>
</head>
<body>
<div id="printarea" style="background-color: #F0F0F1; color: #00cc65; width: 550px;
        padding-left: 25px; padding-top: 10px;text-align: left">
      
<table width="100%">
  <tr>
  <td width="33%"></td>
  <td width="33%" style="text-align: left"><h1><b>ไทยครับ</b></h1></td>
  <td width="33%"></td>
</tr>
<tr>
  <td width="33%" style="text-align: left">ไข่เจียว</td>
  <td width="33%"></td>
  <td width="33%">30 บาท</td>
</tr>
<tr>
  <td width="33%" style="text-align: left">กะเพราหมูกรอบ</td>
  <td width="33%"></td>
  <td width="33%">45 บาท</td>
</tr>
</table>

        <hr/>
      
    </div>
    <input id="btn-Preview-Image" type="button" value="Preview"/>
    <a id="btn-Convert-Html2Image" href="#">Download</a>
    <br/>
    <h3>Preview :</h3>
    <div id="previewImage">
    </div>


</body>
</html>

<script type="text/javascript">
  
  $(document).ready(function(){

  
var element = $("#printarea"); // global variable
var getCanvas; // global variable
 
    
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                getCanvas = canvas;
             }
         });
   

  $("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");

    $.ajax({
      url: 'lan.php',
      data: {
             imgdata:newData
           },
      type: 'post',
      success: function (response) {   
               console.log(response);
         
      }
    });

    //$("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
  });

});
</script>