var btnContainer = document.getElementById("menu");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("li");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

// function update(key){
//   var form = document.createElement("form");
//   form.method = "POST";

//   btnSend = document.createElement("button");
//   btnSend.method = "submit";

  
//   input = document.createElement("input");
//   input.className = "pen";

//   i = document.createElement("i");

//   i.innerHTML = "<i class='fa-solid fa-pen"+key+"'></i>"


//   form.appendChild(input);
//   form.appendChild(btnSend);


// }




$(function(){


    $(".deleteblue").click(function(){
        $(".crashblue").toggle(500);
        $(".desc").toggle(500);
    })

    $(".deletered").click(function(){
        $(".crashred").toggle(500);
        $(".desc").toggle(500);
    })

    $("#add").click(function (){
      $("#formNew").toggle(500);
      $(".desc").toggle(500);
    })

    
})

