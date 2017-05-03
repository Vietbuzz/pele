var originText = "This is the first time i do it";
var wordList = originText.split(" ");
//wordList.push("");
var typeList = [];
var truePoint =0;
var i=0;
var key;
var idPlaylist = document.getElementById("idPlaylist").value;
var baseUrl = document.getElementById("baseUrl").value;

//=====================================
function myFunction(event) {

    var typeContent = document.getElementById("typingText").value;
    KeyCheck(event, typeContent);
    if(i>0){
        document.getElementsByClassName("origin")[i-1].innerHTML =  wordList[i-1];
        document.getElementsByClassName("your")[i-1].innerHTML =  typeList[i-1];
    }
}

//====================================
function KeyCheck(event, typeContent)
{
    var KeyID = event.keyCode;
    switch(KeyID)
    {
        case 8:
            if(typeContent.charAt(typeContent.length -1)==' '){
                event.preventDefault();
            } else{
                //temp = temp.slice(0, -2);
            }
            break;
        case 46:
            event.preventDefault();
            break;
        case 32:
            var inputValue = document.getElementsByTagName("input")[0].value;
            var typeArray = inputValue.split(" ");
            if(typeContent.charAt(typeContent.length -1)==' ' || typeContent.length==0){
                event.preventDefault();
            } else if(i< wordList.length-1){
                //i=i+1;
                //document.getElementsById("iindex").innerHtml= i + " " + wordList.length;
                if(typeArray[typeArray.length-1].toLowerCase() == wordList[i].toLowerCase()){
                    typeList.push(typeArray[typeArray.length-1]);
                    truePoint += 1;
                } else {
                    typeList.push("<strong>"+typeArray[typeArray.length-1]+"</strong>");
                }
                console.log(typeList);
                i++;
                console.log(i+" "+wordList.length);
            } else{
                if(typeArray[typeArray.length-1].toLowerCase() == wordList[i].toLowerCase()){
                    typeList.push(typeArray[typeArray.length-1]);
                    truePoint += 1;
                } else {
                    typeList.push("<strong>"+typeArray[typeArray.length-1]+"</strong>");
                }
                console.log(typeArray[typeArray.length-1]);
                document.getElementsByTagName("input")[0].disabled = true;
                document.getElementsByTagName("audio")[0].pause();
                addHistory(truePoint+'/'+wordList.length);
                console.log(typeList);
                i++;
            }
            break;
        default:
            break;
    }
}

//==================jQuery============================
$(document).ready(function() {
    $('#media, #media2').carousel({
        pause: true,
        interval: false,
    });
    //maybe conflig
    $(".ducatipart").click(function(){
        $(this).children("input").attr("checked", true);
        key = $(this).attr("id");
        //var idplaylist =$(this).attr("idPlaylist");
        $.post(baseUrl+'/playlists/returnText/', {'keyid': key,'idplaylist': idPlaylist }, function(data){
            $("#testtext").html($.parseJSON(data)[0]);
            $("#originrow").empty();
            $("#yourrow").empty();
            inittext($.parseJSON(data)[0]);
            $("#audio").attr("src","/pele/files/"+$.parseJSON(data)[1]);
            $("#audio").attr("autoplay", true);
            $("#typingText").val("");
            $("#typingText").attr('disabled', false);
            $("#typingText").focus();
        });
    });
});

/**
 *
 * @param textstr
 * set up the origin text from database
 */
function inittext(textstr){
    originText = textstr;
    wordList = originText.split(" ");
    //wordList.push("");
    typeList = [];
    i=0;
    truePoint=0;
    for( var count=0; count<wordList.length; count++){
        $("#originrow").append('<td><div class="origin"></div></td>');
        $("#yourrow").append('<td><div class="your"></div></td>');
    }
}

/**
 *
 * @param point
 * Save user's point after listening and typing
 */
function addHistory(point){
    //var idplaylist='<?php echo (isset($idplaylist))? $idplaylist: ""?>';
    $.post(baseUrl+"/users/history/", {'partid': key, 'idplaylist': idPlaylist, 'point': point}, function(data){
            var user = $.parseJSON(data);
            $(".lastPoint").each(function(index, value){
                $(this).text(user[index]);
            });
        }
    );
}

