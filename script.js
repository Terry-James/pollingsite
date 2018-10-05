/* function removeText(){
    var result = document.getElementById('thisForm');
    var res = document.getElementById('numOf');

    result.removeChild(res);
} */

function hideSomething(){
    document.getElementById('pollButton').style.display = "none";
    document.getElementById('choice1').style.display = "none";
    document.getElementById('choice2').style.display = "none";
    document.getElementById('choice3').style.display = "none";
    document.getElementById('choice4').style.display = "none";
    document.getElementById('choice5').style.display = "none";
    document.getElementById('choice6').style.display = "none";
}

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

function hideAnswers(number){
    if(number == 1){
        document.getElementsByName('ans2').style.display = "none";
        document.getElementsByName('ans3').style.display = "none";
        document.getElementsByName('ans4').style.display = "none";
        document.getElementsByName('ans5').style.display = "none";
        document.getElementsByName('ans6').style.display = "none";
    }
    else if(number == 2){
        document.getElementsByName('ans3').style.display = "none";
        document.getElementsByName('ans4').style.display = "none";
        document.getElementsByName('ans5').style.display = "none";
        document.getElementsByName('ans6').style.display = "none";
    }
    else if(number == 3){
        document.getElementsByName('ans4').style.display = "none";
        document.getElementsByName('ans5').style.display = "none";
        document.getElementsByName('ans6').style.display = "none";
    }
    else if(number == 4){
        document.getElementsByName('ans5').style.display = "none";
        document.getElementsByName('ans6').style.display = "none";
    }
    else if(number == 5){
        document.getElementsByName('ans6').style.display = "none";
    }
}