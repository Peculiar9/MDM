<<<<<<< HEAD


document.querySelector('.regbtn').addEventListener('click', function(){
    if (document.querySelector('#password1').value !== document.querySelector('#password2').value){
        document.querySelector('#alert').textContent = "Password must match each other";
        document.querySelector('#alert').style.color = "red";
    }else{
        document.querySelector('#alert').style.display = "none";
    }


});
=======


document.querySelector('.regbtn').addEventListener('click', function(){
    if (document.querySelector('#password1').value !== document.querySelector('#password2').value){
        document.querySelector('#alert').textContent = "Password must match each other";
        document.querySelector('#alert').style.color = "red";
    }else{
        document.querySelector('#alert').style.display = "none";
    }


});
>>>>>>> commit
