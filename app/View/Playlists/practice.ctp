<div class="row">
    <script>
        var originText = "This is the first time i do it";
        var wordList = originText.split(" ");
        //wordList.push("");
        var typeList = [];
        var i=0;
        var temp = "";

        //=====================================
        function myFunction(event) {

            var typeContent = document.getElementById("typingText").value;
            var x = event.which || event.keyCode;
            var regex = new RegExp("^[a-zA-Z0-9]+$");
            temp += String.fromCharCode(x).toLowerCase();
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
                        temp = temp.slice(0, -2);
                    }
                    break;
                case 46:
                    event.preventDefault();
                    break;
                case 32:
                    if(typeContent.charAt(typeContent.length -1)==' ' || typeContent.length==0){
                        event.preventDefault();
                    } else if(i< wordList.length-1){
                        //i=i+1;
                        //document.getElementsById("iindex").innerHtml= i + " " + wordList.length;
                        temp = temp.split(' ').join('');
                        console.log('w'+temp+'w');
                        temp= temp.trim();
                        if(temp == wordList[i].toLowerCase()){
                            typeList.push(temp);
                        } else {
                            typeList.push("<strong>"+temp+"</strong>");
                        }
                        console.log(typeList);
                        temp = "";
                        i++;
                        console.log(i+" "+wordList.length);
                    } else{
                        temp = temp.slice(0, -1);
                        if(temp == wordList[i].toLowerCase()){
                            typeList.push(temp);
                        } else {
                            typeList.push("<strong>"+temp+"</strong>");
                        }
                        console.log(temp);
                        document.getElementsByTagName("input")[0].disabled = true;
                        document.getElementsByTagName("audio")[0].pause();
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