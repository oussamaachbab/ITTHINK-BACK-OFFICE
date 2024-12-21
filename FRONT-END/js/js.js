const dontHaveAccount = document.getElementById('dont-have-account');
const alreadyHaveAccount = document.getElementById('already-have-account');


dontHaveAccount.addEventListener('click', ()=> {
    document.getElementById('container').style.display = 'none';
    document.getElementById('container2').style.display = 'block';
});

alreadyHaveAccount.addEventListener('click', ()=> {
    document.getElementById('container2').style.display = 'none';
    document.getElementById('container').style.display = 'block';

})



