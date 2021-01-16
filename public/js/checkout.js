var $form = $('#checkout-form');

$form.submit(function (event) {
    $form.append()
});



// var $form = $('#checkout-form');
// function setOutcome(result) {
//     // var successElement = document.querySelector('.success');
//     var errorElement = document.querySelector('.error');
//     //successElement.classList.remove('visible');
//     errorElement.classList.remove('visible');
//
//     if (result.token) {
//         // Use the token to create a charge or a customer
//         // https://stripe.com/docs/charges
//         // successElement.querySelector('.token').textContent = result.token.id;
//         // successElement.classList.add('visible');
//
//         //this hidden will be rendered to product controller
//         $form.append($('<input type="hidden" name="stripeToken" />').val(result.token.id));
//         // Submit the form:
//         $form.get(0).submit();
//
//
//     } else if (result.error) {
//         errorElement.textContent = result.error.message;
//         errorElement.classList.add('visible');
//     }
// }
//
//
// document.querySelector('#checkout-form').addEventListener('submit', function(e) {
//     e.preventDefault();
//     var form = document.querySelector('#checkout-form');
//     var extraDetails = {
//         name: form.querySelector('input[name=name]').value,
//         // address: form.querySelector('input[name=address]').value,
//         // address_zip: form.querySelector('input[name=address-zip]').value
//     };
//
// });

