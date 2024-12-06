/* Trocar de tela Login para Cadastro */

const btnLogin = document.getElementById('btn1');
const btnRegister = document.getElementById('btn2');
const containerLogin = document.getElementById('login');
const containerRegister = document.getElementById('register');

btnLogin.addEventListener('click', () => {
  btnLogin.checked = true
  btnRegister.checked  = false

  containerLogin.style.display = 'block'
  containerRegister.style.marginLeft = '0px'

  setTimeout(() => {
    containerLogin.classList.remove("active");
  }, 10)
  
  setTimeout(() => {
    containerRegister.style.display = 'none'
  }, 200)
})

btnRegister.addEventListener('click', () => {
  btnRegister.checked = true
  btnLogin.checked  = false

  
  containerRegister.style.display = 'block'
  containerLogin.classList.add("active");

  setTimeout(() => {
    containerRegister.style.marginLeft = '270px'
    containerLogin.style.display = 'none'
  }, 200)
})