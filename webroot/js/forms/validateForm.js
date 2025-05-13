
/**
 * Função que valida o formulario antes do envio
 */
function validateForm(form_id){

    $(`#${form_id}`).on('submit', function(event){
        event.preventDefault()
        const form = $(`#${form_id}`)
        let has_errors = false
        //Limpa Todos os campos dos erros para serem validados Novamente
        $(form).find('.error_description').remove()
        $(form).find('.error_field').removeClass('error_field')
        // Validação de Campos Obrigatorios
        const required_fields = $(form).find('.form-control.required').toArray()
            .filter(field =>{
                return $(field).val().length == 0
            })
        required_fields.map(field => apply_error(field, "Este campo é obrigatorio"))

        const isnt_email = $(form).find('.form-control.email').toArray()
            .filter( field => {
                return !isEmail($(field).val())
            })
        isnt_email.map( field => apply_error(field, "Este campo precisa ser um Email Valido"))

        const referenced_fields = $(form).find('.form-control.same').toArray()
            .filter( field => {
                //Busca o ID do campo a ser Referenciado
                const reference = field.getAttribute('reference')
                if(!reference){
                    console.error('Campo SAME sem atributo REFERENCE')
                    return
                }
                //Busca o Campo a ser Referenciado
                const ref_field = $(`#${reference}`)
                if(!ref_field){
                    console.error('Nenhum Campo REF encontrado, atributo SAME necessita de uma referencia valida para funcionar corretamente')
                    return
                }

                // Caso exista, agora ele vai fazer a verificação se o campo encontrado bate com o campo referenciado
                const main_field_value = $(field).val()
                const ref_field_value = $(ref_field).val()
                return ref_field_value !== main_field_value
            })
        referenced_fields.map( field => apply_error(field, "Este campo não é igual o anterior!"))

        //Verifica se algum dos Erros existe nos arrays
        has_errors = ([...required_fields, ...isnt_email, ...referenced_fields].length !== 0)
        console.log([...required_fields, ...isnt_email, ...referenced_fields].length)
        if(!has_errors){
            form[0].submit()
        }

    })
}

function apply_error(field, error_message){
    //Criação de um span para exibir erro
    const span = document.createElement('span')
    $(span).text(error_message)
    $(span).addClass('error_description')
    $(field).addClass('error_field')
    $(field).parent().append(span)

}
