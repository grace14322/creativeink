function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10<br>
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML="<b>Time: </b>" + formatAMPM(h+":"+m+":"+s);
//console.log();
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}

function formatAMPM(date) {
  var today=new Date();
  var hours = today.getHours();
  var minutes = today.getMinutes();
  var seconds = today.getSeconds();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  seconds = seconds < 10 ? '0'+seconds : seconds;
  var strTime = hours + ':' + minutes +':'+ seconds + ' ' + ampm;
  return strTime;
}

startTime();


$('#pass-label').click(function(){
    $('#pass').fadeToggle();
});

$('#general-label').click(function(){
    $('#gen').fadeToggle();
});

$('#npass').keyup(function(){

//    var npass = $('#npass').val().length;
//     var vpass = $('#vpass').val();
    if($('#npass').val().length > 20){

           $('#npass-notif').html('Your password is too long!');
    }else{
        $('#npass-notif').html('');
        if($('#vpass').val() === ''){
           $('#vpass-notif').html('');

        }else{
            console.log('true');
             if($('#vpass').val() != $('#npass').val()){

               $('#vpass-notif').html('Your password did not match!');
            }else{
                $('#vpass-notif').html('');
            }
        }
    }
})

$('#vpass').keyup(function(){
//    var vpass = $('#vpass').val();
//    var npass = $('#npass').val();

    if($('#vpass').val() == ''){
           $('#vpass-notif').html('');
    }else{
         if($('#vpass').val() != $('#npass').val()){

           $('#vpass-notif').html('Your password did not match!');
        }else{
            $('#vpass-notif').html('');
        }
    }
})

$('#productquantity').keypress(function (event) {
            return isInteger(event, this)
});
$('#quantityToAdd').keypress(function (event) {
            return isInteger(event, this)
});
$('#setQuantity').keypress(function (event) {
           return isInteger(event, this)
}).keydown(function(event){
  if ( event.keyCode == 46 || event.keyCode == 8 ) {
			return true;
		}
});
$('#productprice').keypress(function (event) {
            return isNumber(event, this)
}).blur(function(){
    var price = parseFloat($('#productprice').val()).toFixed(2);
     console.log(price);

    if(price != 'NaN'){
        $('#productprice').val(price);
    }
});
function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode
        if(charCode == 8){
          return true;
        }else{
          if (
              (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
              (charCode < 48 || charCode > 57))
              return false;
        }
        return true;
    }

function isInteger(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode
          console.log(charCode)

            if(charCode == 8){
              return true;
            }else{
              if (
                  (charCode < 48 || charCode > 57))
                  return false;
            }
        return true;
}
