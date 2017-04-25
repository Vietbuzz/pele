<div class="row">
    <script>
        var originText = "This is the first time i do it";
        var wordList = originText.split(" ");
        //wordList.push("");
        var typeList = [];
        var truePoint =0;
        var i=0;
        var key;

        //=====================================
        function myFunction(event) {

            var typeContent = document.getElementById("typingText").value;
            KeyCheck(event, typeContent);
            //document.getElementById("demo").innerHTML = "The Unicode value is: " + i+ temp + "   "+ typeList.join(" ");
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
    </script>
    <div class="col-lg-3">
        <div class="list-group">
            <a href="#" class="list-group-item disabled">
                Same Level
            </a>
            <a href="#" class="list-group-item">Informal Greeting</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>
    </div>
    <div class="col-lg-6 center">
        <?php echo $this->Html->media($playlist["Playlist"]["name"]."/".$playlist["Playlist"]["audio"][0], array( 'controls', 'loop', 'id'=>'audio'))?>
        <br>
        <input class="form-control" id="typingText" type="text" size="40" onkeydown="myFunction(event)">

        <p id="demo"></p>
        <br>
        <table class="table">
            <tr id="originrow">
                <td><div>True Text: </div></td>
<!--                <td><div class="origin"></div></td>-->
            </tr>
            <tr id="yourrow">
                <td><div>Your Text: </div></td>
<!--                <td><div class="your"></div></td>-->
            </tr>
        </table>
        <div id="testtext"></div>
        <div id="testchar"></div>
    </div>
    <div class="col-lg-3">
        <div class="list-group">
            <a href="#" class="list-group-item disabled">
                Same Level
            </a>
            <?php foreach($playlist["Playlist"]["text"] as $key=>$text): ?>
                <?php if(!empty($playlist["Playlist"]["audio"][$key])):?>
                <a href="#" class="list-group-item ducatipart" id="<?php echo $key?>">
                    part <?php echo $key+1?>
                    <input type="checkbox" disabled>
                </a>
                <?php endif;?>
            <?php endforeach;?>

<!--            <a href="#" class="list-group-item">Informal Greeting</a>-->
<!--            <a href="#" class="list-group-item">Morbi leo risus</a>-->
<!--            <a href="#" class="list-group-item">Porta ac consectetur ac</a>-->
<!--            <a href="#" class="list-group-item">Vestibulum at eros</a>-->
        </div>
    </div>


</div>