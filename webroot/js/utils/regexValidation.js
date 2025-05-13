/**Esta função verifica via Regex se o valor passado é um Email Valido */
function isEmail(email){
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    return regex.test(email)
}
