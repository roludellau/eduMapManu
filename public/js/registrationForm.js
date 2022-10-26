let errorList = []
let regexEmail = new RegExp('^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$')
let regexPassword = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[À-ÖØ-öø-ÿ@$!%*#?:&µ£~§\/\\~|\-]).{8,100}$/)
let errorEmail = 'L\'adresse email entrée n\'est pas valide'
let errorPassword = 'Le mot de passe doit contenir au moins: 8 caractères, dont une majuscule, un chiffre, et un caractère spécial'
let errorPasswordMatch = 'Les mots de passe ne correspondent pas'


window.addEventListener('keydown', () => {
        if (email.value){
            if (!regexEmail.test(email.value)){
                errorList['errorEmail'] = errorEmail
            } else {
                errorList['errorEmail'] = null
            }
        }
        if (password.value){
            if (!regexPassword.test(password.value)){
                errorList['errorPassword'] = errorPassword
            } else {
                errorList['errorPassword'] = null
            }
        }
        if (password2.value && password2.value !== password.value){
            errorList['passwordMatch'] = errorPasswordMatch
        } else {
            errorList['passwordMatch'] = null
        }

    }
)


window.addEventListener('click', (e) => {

    let mailMessage = document.getElementById("mailMessage")
    let passwordMessage = document.getElementById("passwordMessage")
    let passwordMessage2= document.getElementById("passwordMessage2")

    if (!e.target.classList.contains('inputToCheck')){
        console.log(mailMessage)
        console.log(errorList)

        if (errorList['errorEmail'] && !mailMessage){
            mailDiv.insertAdjacentHTML('afterend', '<p id="mailMessage" class="text-danger">' + errorList['errorEmail'] + '</p>')
        }
        if (errorList['errorPassword'] && !passwordMessage){
            passwordDiv.insertAdjacentHTML('afterend', '<p id="passwordMessage" class="text-danger">' + errorList['errorPassword'] + '</p>')
        }
        if (errorList['passwordMatch'] && !passwordMessage2){
            passwordDiv2.insertAdjacentHTML('afterend', '<p id="passwordMessage2" class="text-danger">' + errorList['passwordMatch'] + '</p>')
        }
    }

    if (errorList.length == 0 && email.value && password.value && password2.value){
        submitButton.removeAttribute('disabled');
    } else {
        submitButton.setAttribute('disabled');
    }
})



