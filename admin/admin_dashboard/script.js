<<<<<<< HEAD


// document.querySelectorAll('#delete').forEach(item => {item.addEventListener('click', event => {
    
//     window.alert('Do you want to delete this Product?');
//     document.querySelector('#last-row').style.display = "none";
    
// })});



rowsection = document.getElementById('row');

    

document.querySelectorAll('#delete1').forEach(item => {item.addEventListener('click', event => {
    const tablerow = rowsection.childElementCount;
    var i = document.querySelectorAll('#delete1').length;
    


    rowsection.removeChild(rowsection.children[i]);
    // window.alert('click');
    console.log('click');

    
=======


// document.querySelectorAll('#delete').forEach(item => {item.addEventListener('click', event => {
    
//     window.alert('Do you want to delete this Product?');
//     document.querySelector('#last-row').style.display = "none";
    
// })});



rowsection = document.getElementById('row');

    

document.querySelectorAll('#delete1').forEach(item => {item.addEventListener('click', event => {
    const tablerow = rowsection.childElementCount;
    var i = document.querySelectorAll('#delete1').length;
    


    rowsection.removeChild(rowsection.children[i]);
    // window.alert('click');
    console.log('click');

    
>>>>>>> commit
})});