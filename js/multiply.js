$('.te-adult').on('change', function(){
    let price = $(this).data('price');
    let quantity = $(this).find('option:selected').val();
    let adultTotal = price * quantity;
    total(price, quantity, adultTotal);
});

$('.te-child').on('change', function(){
    let price = $(this).data('price');
    let quantity = $(this).find('option:selected').val();
    let childTotal = price * quantity;
    total(price, quantity, childTotal);
});

$('.te-concession').on('change', function(){
    let price = $(this).data('price');
    let quantity = $(this).find('option:selected').val();
    let concessionTotal = price * quantity;
    total(price, quantity, concessionTotal);
});

function total(price, quantity, itemTotal) {
    if(price == 8.00) {
       $('#te-concession-item').html('Concession x'+quantity+'@'+itemTotal);

    } else {

    }
}