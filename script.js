// Terry James CS396 Project2

// function used to hide choice boxes
function hideSomething(){
    document.getElementById('pollButton').style.display = "none";
    document.getElementById('choice1').style.display = "none";
    document.getElementById('choice2').style.display = "none";
    document.getElementById('choice3').style.display = "none";
    document.getElementById('choice4').style.display = "none";
    document.getElementById('choice5').style.display = "none";
    document.getElementById('choice6').style.display = "none";
}

/* removes the button for choice number and shows the poll submit button 
along with the correct number of choice boxes.*/
function removeText(){
    var numChoice = document.getElementById('numOf').value;
    
    document.getElementById('numOf').style.display = "none";
    document.getElementById('abutton').style.display = "none";
    document.getElementById('pollButton').style.display = "block";

    if(numChoice == 1){
        document.getElementById('choice1').style.display = "block";
    }
    else if(numChoice == 2){
        document.getElementById('choice1').style.display = "block";
        document.getElementById('choice2').style.display = "block";
    }
    else if(numChoice == 3){
        document.getElementById('choice1').style.display = "block";
        document.getElementById('choice2').style.display = "block";
        document.getElementById('choice3').style.display = "block";
    }
    else if (numChoice == 4){
        document.getElementById('choice1').style.display = "block";
        document.getElementById('choice2').style.display = "block";
        document.getElementById('choice3').style.display = "block";
        document.getElementById('choice4').style.display = "block";
    }
    else if (numChoice == 5){
        document.getElementById('choice1').style.display = "block";
        document.getElementById('choice2').style.display = "block";
        document.getElementById('choice3').style.display = "block";
        document.getElementById('choice4').style.display = "block";
        document.getElementById('choice5').style.display = "block";
    }
    else{
        document.getElementById('choice1').style.display = "block";
        document.getElementById('choice2').style.display = "block";
        document.getElementById('choice3').style.display = "block";
        document.getElementById('choice4').style.display = "block";
        document.getElementById('choice5').style.display = "block";
        document.getElementById('choice6').style.display = "block";
    }
}