const form = document.getElementById('pay');
const paid_at = new Date();
let metadata = document.getElementById('metadata');


function fetchMetaValues() {
    let fullname = document.getElementById('full_name').value;
    let phone_number = document.getElementById('phone_number').value;
    let email = document.getElementById('email').value;
    let address = document.getElementById('address').value;
    let address_2 = document.getElementById('address_2').value;
    let city = document.getElementById('city').value;
    let country = document.getElementById('country').value;
    let state = document.getElementById('state').value;
    let zipcode = document.getElementById('zipcode').value;
    let reference = document.getElementById('reference').value;
    let amount = document.getElementById('amount').value;
    let paid_at = paid_at.getFullYear();

    let custom_fields = {
        'name':fullname,
        'phone': phone_number,
        'email': email,
        'address': address,
        'address2': address_2,
        'city': city,
        'country': country,
        'state': state,
        'zipcode': zipcode,
        'reference': reference,
        'amount': amount,
        'paid_at': paid_at
    };
    metadata.setAttribute('value') = encodeURIComponent(JSON.stringify(custom_fields));
}

form.addEventListener('submit', fetchMetaValues)

