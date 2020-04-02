(function(){
    
    let style = {
      base: {
        color: '#32325d',
        lineHeight: '18px',
        fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };
    // Create an instance of the card Element
    let card = elements.create('card', {
        style: style,
        hidePostalCode: true
    });
    // Add an instance of the card Element into the `card-element` <div>
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
      let displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });
    // Handle form submission
    let form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        
      // Disable the submit button to prevent repeated clicks
      document.getElementById('complete-order').disabled = true;
      let options = {
        name: document.getElementById('name_on_card').value,
        address_1: document.getElementById('address_1').value,
        address_city: document.getElementById('city').value,
        address_state: document.getElementById('country').value,
        address_postalcode: document.getElementById('postalcode').value
      }
      stripe.createToken(card, options).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error
          let errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
          // Enable the submit button
          document.getElementById('complete-order').disabled = false;
        } else {
          // Send the token to your server
          stripeTokenHandler(result.token);
        }
      });
    });
    function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      let form = document.getElementById('payment-form');
      let hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);
      // Submit the form
      form.submit();
    }
})();

