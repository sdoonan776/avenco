(function(){

    const classname = document.querySelectorAll('.quantity');

    Array.from(classname).forEach(function(element) {
        classname.addEventListener('change', function() {
            let id = classname.getAttribute('data-id');
            console.log(id);
            let productQuantity = classname.getAttribute('data-productQuantity');

            axios.patch(`/cart/${id}`, {
                quantity: this.value,
                productQuantity: productQuantity
            })
            .then(function (response) {
                // console.log(response);
                window.location.href = "cart";
            })
            .catch(function (error) {
                // console.log(error);
                window.location.href = "cart";
            });
        })
    })
})();